#!/usr/bin/php
<?php

require __DIR__.'/../vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__.'/../')->safeLoad();

echo "example-cmd!" . PHP_EOL;