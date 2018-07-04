<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Command\GenerateReportCommand;

$application = new Application();

$application->add(new GenerateReportCommand());

$application->run();
