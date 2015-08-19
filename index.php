<?php

require_once('lib/SnapSearch-Client-PHP/src/SnapSearchClientPHP/Bootstrap.php');
\SnapSearchClientPHP\Bootstrap::register();

$client = new \SnapSearchClientPHP\Client('email', 'key');
$detector = new \SnapSearchClientPHP\Detector;
$interceptor = new \SnapSearchClientPHP\Interceptor($client, $detector);

// //exceptions should be ignored in production, but during development you can check it for validation errors
try{

    $response = $interceptor->intercept();

}catch(SnapSearchClientPHP\SnapSearchException $e){}

if($response){

    header(' ', true, $response['status']); //as of PHP 5.4, you can use http_response_code($response['status']);

    if(!empty($response['headers'])){
        foreach($response['headers'] as $header){
            if($header['name'] == 'Location'){
                header($header['name'] . ': ' . $header['value']);
            }
        }
    }

    echo $response['html'];

}else{

?>

    <html>
        <head><title>Your Website</title></head>
        <body><p>HELLO!</p></body>
    </html>

<?php
}
?>
