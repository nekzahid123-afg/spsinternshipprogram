<?php
$root = realpath(__DIR__ . '/..');
$path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = realpath($root . $path);

if ($file && is_dir($file)) {
    $file = realpath($file . '/index.php');
}

if ($file && strpos($file, $root) === 0 && substr($file, -4) === '.php' && strpos($file, $root . DIRECTORY_SEPARATOR . 'api') !== 0) {
    chdir(dirname($file));
    require $file;
} else {
    chdir($root);
    require $root . '/index.php';
}