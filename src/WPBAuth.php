<?php

namespace AhmedAsh95\WPBAuth;

use GuzzleHttp\Client;

class WPBAuth{

    private $client;

    private $endPoint;

    private $username;

    private $password;

    public function __construct($config)
    {
        $this->username = $config['wp_username'];
        $this->password = $config['wp_password'];
        $this->endPoint = $config['end_point'];

        $this->client = new Client([
            'base_uri' => $this->endPoint,
            'auth' => [$this->username,$this->password]
        ]);
    }

    public function post($uri,$params)
    {
        return $this->client->post($uri,['form_params' => $params])->getBody();
    }

    public function media($path){
        $body = fopen($path,'r');
        return $this->client->post('media',[
            'body' => $body,
            'headers' => [
                'Content-Disposition' => 'attachment; filename="acme.png"',
            ],
        ])->getBody();
    }
}
