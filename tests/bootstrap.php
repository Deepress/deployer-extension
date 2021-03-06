<?php

/**
 * Test bootstrap.
 */
if (@!include __DIR__ . '/../vendor/autoload.php') {
    echo 'Install Nette Tester using `composer update --dev`';
    exit(1);
}

// Configure environment
Tester\Environment::setup();
date_default_timezone_set('Europe/Prague');

// Create temporary directory
define('TEMP_DIR', __DIR__ . '/tmp/' . getmypid());
define('FIXTURES_DIR', __DIR__ . '/fixtures');
@mkdir(dirname(TEMP_DIR)); // @ - directory may already exist
Tester\Helpers::purge(TEMP_DIR);

function test(\Closure $function)
{
    $function();
}
