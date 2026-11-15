<?php
// Inkluderar klassfilen
spl_autoload_register(function ($class_name) {
    include_once("includes/classes/" . $class_name . ".class.php");
});

function initConfig(): void
{
    $envPath = __DIR__ . '/../.env';
    if (file_exists($envPath)) {
        $env = parse_ini_file($envPath);
        foreach ($env as $key => $value) {
            $_ENV[$key] = $value;
        }
    }

    /*error_reporting(-1);
    ini_set('display_errors', '1');*/

    // Databasinställningar från .env-fil
    define("DB_HOST", $_ENV["DB_HOST"]);
    define("DB_USER", $_ENV["DB_USER"]);
    define("DB_PASSWORD", $_ENV["DB_PASSWORD"]);
    define("DB_NAME", $_ENV["DB_NAME"]);
}
