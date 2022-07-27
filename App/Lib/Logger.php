<?php namespace App\Lib;

use Monolog\ErrorHandler;
use Monolog\Handler\StreamHandler;

class Logger extends \Monolog\Logger
{
    private static $loggers = [];

    public function __construct($key = "app", $config = null)
    {
        parent::__construct($key);

        if(!isset($config['logFile'])) {
            $LOG_PATH = Config::get('LOG_PATH', __DIR__ . '/../../logs');
            $config['logFile'] = "{$LOG_PATH}/{$key}.log";
        }

        if(!isset($config['logLevel'])) {
            $config['logLevel'] = \Monolog\Logger::DEBUG;
        }

        $this->pushHandler(new StreamHandler($config['logFile'], $config['logLevel']));
    }

    public static function getInstance($key = "app", $config = null) // ???????
    {
        if (empty(self::$loggers[$key])) {
            self::$loggers[$key] = new Logger($key, $config);
        }

        return self::$loggers[$key];
    }

    public static function enableSystemLogs()
    {
        // Error Log
        self::$loggers['error'] = new Logger('errors');
        ErrorHandler::register(self::$loggers['error']);

        // Request Log
        $data = [
            $_SERVER,
            $_REQUEST,
            trim(file_get_contents("php://input"))
        ];
        self::$loggers['request'] = new Logger('request');
        self::$loggers['request']->info("REQUEST", $data);
    }
}
