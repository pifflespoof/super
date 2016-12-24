<?php 
header("Access-Control-Allow-Origin: *");

$mail = "admin";
$pass = "admin";

$mail1=$_GET["mail"];
$pass2=$_GET["password"];

if ($mail1==$mail && $pass2==$pass){
  echo "ok";
}
else


?>
