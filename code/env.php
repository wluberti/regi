<?php
$envFile = __DIR__ . '/.env';
$env = [];
$debug = false;

if (file_exists($envFile) && is_readable($envFile)) {
    $env = @parse_ini_file($envFile);
    if ($env && isset($env['DEBUG'])) {
        $debug = filter_var($env['DEBUG'], FILTER_VALIDATE_BOOLEAN);
    }
}

if ($debug) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    ini_set('xdebug.var_display_max_depth', '-1');
    ini_set('xdebug.var_display_max_children', '-1');
    ini_set('xdebug.var_display_max_data', '-1');
    error_reporting(E_ALL);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 0);
    set_error_handler(function() {
        echo "Oops, check the logs";
        return true;
    });
    set_exception_handler(function() {
        echo "Oops, check the logs";
    });
}
?>
