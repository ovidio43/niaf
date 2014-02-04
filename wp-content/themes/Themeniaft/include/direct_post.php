<?php

//require_once 'anet_php_sdk/AuthorizeNet.php'; // The SDK
$url = "http://www.iconicweb.com/aldo/authorize/thankyou.php";
$api_login_id = '3yzLVa8H8CN';
$transaction_key = '5tTJWc776FE7vj6d';
$md5_setting = '3yzLVa8H8CN'; // Your MD5 Setting
$amount = "5.99";
AuthorizeNetDPM::directPostDemo($url, $api_login_id, $transaction_key, $amount, $md5_setting);
?>