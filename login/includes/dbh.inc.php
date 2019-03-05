<?php

define('DB_HOST', "localhost");
define("DB_USER", "root");
define("DB_PWD", "123a456");
define("DB_DATABASE", "loginsystem");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DATABASE);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}