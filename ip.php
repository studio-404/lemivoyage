<?php
$ch = curl_init("http://icanhazip.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
echo curl_exec($ch);
?>