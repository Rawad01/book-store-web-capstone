<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webdb";

    $cnnx = new mysqli($server, $username, $password, $dbname);

    if($cnnx->connect_error){
	    die("connection failed." . $cnnx->connect_error);
    }
?>