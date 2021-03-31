<?php

// create DB variables to connect to the DB
$server_name = "localhost";
$user_name = "admin";
$user_pass = "admin12345";
$db_name = "traitors";

// create DB connection object
$mysqli = new mysqli($server_name, $user_name, $user_pass, $db_name);

?>