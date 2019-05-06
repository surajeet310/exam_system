<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'exam';

$connnection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connnection){
  die("Could not connect :".mysqli_error());
}

$db = mysqli_select_db($connnection, $dbname);
if(!$db)
{
  die ("Can not use test_db : " . mysqli_error());
}

 ?>
