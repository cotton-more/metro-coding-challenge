#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

/** @var \DI\Container $container */
$container = require __DIR__.'/container.php';

use Ivann\MetroCoding\Command;
use Symfony\Component\Console\Application;

$application = new Application();

$application->addCommands([
    $container->get(Command\CountByPriceRange::class),
    $container->get(Command\CountByVendorID::class),
]);

$application->run();