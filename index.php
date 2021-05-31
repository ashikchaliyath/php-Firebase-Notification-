<?php

function sendPushNotification($fields = array())
{
    $API_ACCESS_KEY = 'Your API Key';
    $headers = array
    (
        'Authorization: key=' . $API_ACCESS_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    echo $result;
}

$title = "Test";
$message = "Hello World";

$fields = array
(
    'to'  => '/topics/Your topic name',
    'priority' => 'high',
    'notification' => array(
        'body' => $message,
        'title' => $title,
        'sound' => 'default',
        'icon' => '',
       	'image'=> ''
    ),
    'data' => array(
        'message' => $message,
        'title' => $title,
        'sound' => 'default',
        'icon' => '',
        'image'=> ''
    )


);

sendPushNotification($fields);