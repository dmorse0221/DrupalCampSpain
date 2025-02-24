<?php

/**
 * This file is included very early. See autoload.files in composer.json and
 * https://getcomposer.org/doc/04-schema.md#files
 */

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;

/**
 * Load any .env file. See /.env.example.
 */
if (class_exists('Dotenv\Dotenv')) {
    $dotenv = Dotenv::createImmutable(__DIR__);
    try {
        $dotenv->safeLoad();
    }
    catch (InvalidPathException $e) {
        // Do nothing. Production environments rarely use .env files.
    }
}
