<?php
namespace Zrp;

use Monolog\Logger;
use Monolog\Handler\SyslogHandler;

class PLog
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

    public function info($tag, $log)
    {
        $this->handle($tag);

        $this->logger->addInfo($log);
    }

    public function warn()
    {

    }

    public function error()
    {

    }

    public function notice()
    {

    }

    public function fatal()
    {

    }
}
