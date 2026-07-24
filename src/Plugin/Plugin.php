<?php
declare(strict_types=1);

namespace Telix\Plugin;

interface Plugin
{
    public function configure(PluginConfigurator $plugin): void;
}
