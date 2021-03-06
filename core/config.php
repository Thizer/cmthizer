<?php
session_start();

// Sao Paulo Timezone (Brazil - Choose yours)
date_default_timezone_set('America/Sao_Paulo');

// Constants configs setted in VirtualHost (we will get there)
define('DEVELOPMENT', (bool) getenv("DEVELOPMENT"));
define('SHOW_ERRORS', (bool) getenv("SHOW_ERRORS"));
if (SHOW_ERRORS) {
  error_reporting(E_ALL);
  ini_set('display_errors', true);
}

// Root path
// Everything is related to the root path
chdir(dirname(__DIR__));

$loader = null;
$root = realpath(getenv('DOCUMENT_ROOT'));

if (file_exists($root.'/vendor/autoload.php')) {
  $loader = include $root.'/vendor/autoload.php';
} else if (file_exists('vendor/autoload.php')) {
  $loader = include 'vendor/autoload.php';
} else {
  exit("Project dependencies not found, execute 'php composer.phar install' in the root of project");
}

// If you want, can add your libraries here with composer
// $loader->add('System', 'library/.');

include_once 'functions.php';
