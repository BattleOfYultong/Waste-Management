<?php

$localhost = 'localhost';
$root = 'root';
$password = '';
$database = 'waste_management';

$connections = mysqli_connect($localhost, $root, $password, $database);

if($connections->connect_errno){
    echo "Error Connetions" .$connections->errno;
}
