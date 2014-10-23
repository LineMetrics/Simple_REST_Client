<?php

define(INPUT, "0000");                                            // your API-Device Input ID
define(ACCESS_TOKEN, "000000-62e0-00000-b13e-lkjasdoiuouoiuwe");  // your UUSEC

// build url
$url= 'http://bapi.linemetrics.com:8002/v1/'.ACCESS_TOKEN.'/store_value/'.INPUT.'?val=1';

// Get cURL resource
$curl = curl_init();

// Set some options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
));

// Send the request & save response to $ret
$ret = curl_exec($curl);

if (!$ret) {
    // some kind of an error happened
    echo $url.'<br>';
    curl_close($curl); // close cURL handler
    die(curl_error($curl));
    
} else {

    $info = curl_getinfo($curl);
    echo 'API Request took ' . $info['total_time'] . ' secs | Status:  ' . curl_getinfo($curl, CURLINFO_HTTP_CODE);
}

print curl_error($curl);

// Close request to clear up some resources
curl_close($curl);
// done
exit;

?>
