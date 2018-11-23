<?php
session_start();

$ip = $_SERVER['REMOTE_ADDR']; 
$_SESSION['current_user'] = $ip;


if(isset($_SESSION['current_user']))
{
    $count = file_get_contents("counter.txt");
    $count = trim($count);
    $fl = fopen("counter.txt","w+");
    fwrite($fl,$count);
    fclose($fl);


}

else
{
    $count = file_get_contents("counter.txt");
    $count = trim($count);
    $count = $count + 1;
    $fl = fopen("counter.txt","w+");
    fwrite($fl,$count);
    fclose($fl);

}
?>