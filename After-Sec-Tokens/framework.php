<?php
function get_client_ip()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}

function getBrowser(){

    $agent = $_SERVER['HTTP_USER_AGENT'];
    $name = 'NA';
    
    
    if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) {
        $name = 'Internet Explorer';
    } elseif (preg_match('/Firefox/i', $agent)) {
        $name = 'Mozilla Firefox';
    } elseif (preg_match('/Chrome/i', $agent)) {
        $name = 'Google Chrome';
    } elseif (preg_match('/Safari/i', $agent)) {
        $name = 'Apple Safari';
    } elseif (preg_match('/Opera/i', $agent)) {
        $name = 'Opera';
    } elseif (preg_match('/Netscape/i', $agent)) {
        $name = 'Netscape';
    }
    return $name;
}