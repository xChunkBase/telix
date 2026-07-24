<?php
declare(strict_types=1);

namespace Telix\Routing;

use Telix\Attribute\OnText;
use Telix\Attribute\OnUpdate;
use Telix\Bot\Filter\Command;
use Telix\Attribute\OnCommand;
use Telix\Bot\Filter\UpdateIs;
use Telix\Attribute\OnCallback;
use Telix\Attribute\HandlerGroup;
use Telix\Bot\Filter\TextMatches;
use Telix\Bot\Filter\CallbackData;

final class AttributeScanner
{
    public function scan(string $directory): array
    {
        if (!is_dir($directory)) {
            throw new \InvalidArgumentException("Handler directory not found: {$directory}");
        }

        $routes   = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (!$file instanceof \SplFileInfo || $file->getExtension() !== 'php') {
                continue;
            }

            foreach ($this->classesIn($file->getPathname()) as $class) {
                array_push($routes, ...$this->routesFor($class));
            }
        }

        return $routes;
    }

    private function routesFor(string $class): array
    {
        if (!class_exists($class)) {
            return [];
        }

        $reflection = new \ReflectionClass($class);

        if ($reflection->isAbstract() || $reflection->isInterface()) {
            return [];
        }

        $group = null;

        foreach ($reflection->getAttributes(HandlerGroup::class) as $attribute) {
            $group = $attribute->newInstance();
        }

        $routes = [];

        foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            foreach ($method->getAttributes() as $attribute) {
                $route = $this->route($attribute->newInstance(), $group);

                if ($route === null) {
                    continue;
                }

                [$filter, $priority, $command] = $route;
                $routes[]                      = [
                    'filter'     => $filter,
                    'handler'    => [$class, $method->getName()],
                    'priority'   => $priority,
                    'middleware' => $group?->middleware ?? [],
                    'command'    => $command,
                ];
            }
        }

        return $routes;
    }

    private function route(object $attribute, ?HandlerGroup $group): ?array
    {
        if ($attribute instanceof OnCommand) {
            return [
                Command::named($attribute->command),
                $attribute->priority,
                $attribute->description !== '' ? [$attribute->command, $attribute->description] : null,
            ];
        }

        if ($attribute instanceof OnCallback) {
            $pattern = $group !== null && $group->callbackPrefix !== null
                ? "{$group->callbackPrefix}:{$attribute->pattern}"
                : $attribute->pattern;

            return [CallbackData::pattern($pattern), $attribute->priority, null];
        }

        if ($attribute instanceof OnText) {
            $filter = match (true) {
                $attribute->regex !== null    => TextMatches::regex($attribute->regex),
                $attribute->exact !== null    => TextMatches::exact($attribute->exact),
                $attribute->contains !== null => TextMatches::contains($attribute->contains),
                default                       => TextMatches::any(),
            };

            return [$filter, $attribute->priority, null];
        }

        if ($attribute instanceof OnUpdate) {
            return [new UpdateIs($attribute->type), $attribute->priority, null];
        }

        return null;
    }

    private function classesIn(string $path): array
    {
        $source = (string) file_get_contents($path);
        $tokens = \PhpToken::tokenize($source);

        $namespace = '';
        $classes   = [];
        $count     = \count($tokens);

        for ($i = 0; $i < $count; ++$i) {
            $token = $tokens[$i];

            if ($token->is(\T_NAMESPACE)) {
                $namespace = '';

                for ($j = $i + 1; $j < $count; ++$j) {
                    if ($tokens[$j]->is([\T_NAME_QUALIFIED, \T_STRING])) {
                        $namespace = $tokens[$j]->text;
                        break;
                    }

                    if (!$tokens[$j]->is([\T_WHITESPACE, \T_COMMENT])) {
                        break;
                    }
                }

                continue;
            }

            if (!$token->is(\T_CLASS)) {
                continue;
            }

            $previous = $i > 0 ? $tokens[$i - 1] : null;

            if ($previous !== null && $previous->is(\T_DOUBLE_COLON)) {
                continue;
            }

            for ($j = $i + 1; $j < $count; ++$j) {
                if ($tokens[$j]->is([\T_WHITESPACE, \T_COMMENT])) {
                    continue;
                }

                if ($tokens[$j]->is(\T_STRING)) {
                    $classes[] = ($namespace !== '' ? $namespace . '\\' : '') . $tokens[$j]->text;
                }

                break;
            }
        }

        if ($classes !== []) {
            /** @psalm-suppress UnresolvableInclude */
            require_once $path;
        }

        return array_values(array_filter($classes, class_exists(...)));
    }
}
