<?php
namespace Together;

use Monolog\Logger;
use Monolog\Handler\SyslogHandler;

class Log
{
    protected $logger;

    public function __construct()
    {
        $this->logger = new Logger(getenv('APP_NAME'));
    }

    protected function handle($tag)
    {
        $this->logger->pushHandler(new SyslogHandler(getenv('APP_NAME').'/'.$tag, 'local7', 100));
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
        return forward_static_call_array([$this->logger, $method], $args);
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
        $tag = reset($args);

        $log = [
            end($args)
        ];

        $this->handle($tag);

        return call_user_func_array([$this->logger, $method], $log);
    }
}

