<?php
var_dump($_REQUEST);


$hashSecretWord = 'tango'; //2Checkout Secret Word
$hashSid = 901376469; //2Checkout account number
$hashTotal = $_REQUEST['total']; //Sale total to validate against
$hashOrder = $_REQUEST['order_number']; //2Checkout Order Number
$StringToHash = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));

if ($StringToHash != $_REQUEST['key']) {
	$result = 'Fail - Hash Mismatch '; 
	} else { 
	$result = 'Success - Hash Matched ';
}

echo $result;

echo $_REQUEST['li_0_name'];