<?php

function curl_request($url, $method="GET", $headers=[], $body=null){
//die('111');
    $ch = curl_init();

    $log = [];

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $body,
        CURLOPT_HEADER => true,
        CURLOPT_VERBOSE => true
    ]);

    // capture verbose output
    $verbose = fopen('php://temp', 'w+');
    curl_setopt($ch, CURLOPT_STDERR, $verbose);

    $response = curl_exec($ch);

    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    rewind($verbose);
    $verboseLog = stream_get_contents($verbose);

    curl_close($ch);

    // split headers and body
    $header_size = strpos($response, "\r\n\r\n");
    $headers_raw = substr($response, 0, $header_size);
    $body_raw = substr($response, $header_size + 4);

    $log['url'] = $url;
    $log['status'] = $status;
    $log['headers'] = $headers_raw;
    $log['body'] = $body_raw;
    $log['curl_verbose'] = $verboseLog;

    file_put_contents("curl_debug.log", print_r($response, true)."\n\n", FILE_APPEND);

    return $response;
}