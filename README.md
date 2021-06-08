<?php
 require __DIR__.'./vendor/autoload.php';

 use GenPushSDK\Client;

 $client = new Client([
     'host' => 'http://localhost',
     'port' => 3000,
     'key'  => 'xkejhkakjgags'
 ]);

 echo $client->push('chat message',[
     'from' => 'rohim', 
     'to'   => 'yusuf',
     'message' => 'hello'
]);