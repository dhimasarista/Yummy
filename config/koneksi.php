<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "yummy";

$mysqli = new mysqli($host, $username, $password, $database);

// Table user
// create table user(id int primary key auto_increment, username varchar(50));

// Table booking_order
// create table booking_table(id int primary key auto_increment, name varchar(255), email varchar(255), phone varchar(50), date varchar(50), time varchar(50), people int, message varchar(255));