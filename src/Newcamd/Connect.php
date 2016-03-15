<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 2016-03-09
 * Time: 00:34
 */

namespace Newcamd;



use Newcamd\Socket\Socket;

class Connect
{
    protected $config;
    protected $socket;

    /**
     * Connect constructor.
     * @param $config
     */
    public function __construct(Config $config)
    {
        $this->setConfig($config)
            ->setSocket(new Socket())
            ->connect();
    }

    public function connect()
    {
        $this->getSocket()->connect($this->getConfig()->getHost(), $this->getConfig()->getPort());

        return $this;
    }

    public function receive()
    {
        return ServerMessageFactory::create($this->getSocket()->receive());
    }

    public function send($message)
    {
        return $this->getSocket()->send($message);
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param Config $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return Socket
     */
    public function getSocket()
    {
        return $this->socket;
    }

    /**
     * @param Socket $socket
     */
    public function setSocket($socket)
    {
        $this->socket = $socket;

        return $this;
    }

}