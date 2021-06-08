<?php

namespace GenPushSDK;
class Client{
    public $config = [];

    public function __construct($data = [
        'host' => 'http://localhost',
        'port' => 80,
        'key' => null,
    ]){
        $this->config = $data;
        return $this;
    }

    public function push($event,$data = []){
        return $this->send($event,$data);
    }

    public function send($event,$data = []){
            $config = (object) $this->config;
            $url = $config->host.':'.$config->port;
            $fields = array(
                'event'=> 'broadcast',
                'data' => [
                    'event' => $event,
                    'data'  => $data,
                    'key'   => $config->key
                ],
            );

            $uri = $url.'/send?';
            $fields_string = http_build_query($fields);
            
            $result = file_get_contents($uri.$fields_string);
            // $ch = curl_init($uri);
            // curl_setopt($ch,CURLOPT_POST, 1);
            // curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
            // $result = curl_exec($ch);
            // curl_close ($ch);
             return $result;
    }
}