<?php


namespace Bws\Dispatch;

use Hanson\Foundation\Foundation;

 
class BwsDispatch extends Foundation
{

    private $clients;

    protected $providers = [
        ClientsServiceProvider::class
    ];

    public function __construct($config)
    {
        parent::__construct($config);
        $this->clients = new Clients($config['merchant_no'], $config['api_key'], $config['gateway_address'], $config['callUrl']);
    }

    public function __call($name, $arguments)
    {
        return $this->clients->{$name}(...$arguments);
    }
}