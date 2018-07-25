<?php
namespace Together;

use Monolog\Logger;
use Monolog\Handler\SyslogHandler;

class Log
{
    protected $logger;
    protected $appName;

    public function __construct($appName)
    {
        $this->appName = $appName;
        $this->logger = new Logger($this->appName);
    }

    protected function handle($tag)
    {
        $this->logger->pushHandler(new SyslogHandler($this->appName.'/'.$tag, 'local7', 100));
    }

    // public function info($tag, $log)
    // {
    //     $this->handle($tag);
    //
    //     $this->logger->addInfo($log);
    // }

    public static function getLogger()
    {
        return self::$logger ?: self::$logger = self::createDefaultLogger();
    }

    /**
     * Set logger.
     *
     * @param LoggerInterface $logger
     */
    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }

    /**
     * Tests if logger exists.
     *
     * @return bool
     */
    public static function hasLogger(): bool
    {
        return self::$logger ? true : false;
    }

    /**
     * Make a default log instance.
     *
     * @return \Monolog\Logger
     */
    protected static function createDefaultLogger()
    {
        $handler = new RotatingFileHandler(getenv('LOGGER_PATH'));
        $handler->setFormatter(new LineFormatter());

        $logger = new Logger(getenv('APP_NAME'));
        $logger->pushHandler($handler);

        return $logger;
    }

    /**
     * Forward call.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        return forward_static_call_array([self::getLogger(), $method], $args);
    }

    /**
     * Forward call.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        $this->handle($args[0]);

        unset($args[0]);

        return call_user_func_array([self::getLogger(), $method], $args);
    }
}

