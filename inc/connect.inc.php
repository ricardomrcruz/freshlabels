<?php

$host= 'mysql:host=localhost;dbname=foodlabels'; //server n database
$login= 'root';
$password= '';
$options= array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // to manage errors
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //to force utf8
);

$pdo = new PDO( $host, $login, $password, $options);

// variable to display user messages (empty by default)

$msg = '';

//the session start is positioned in the connect file so it can access all the pages via include
session_start();

