<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "yummy";

// Buat koneksi awal untuk memeriksa/membuat database
$mysqli = new mysqli($host, $username, $password);

// Periksa koneksi awal
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Periksa apakah database ada
$db_check_query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database'";
$db_check_result = $mysqli->query($db_check_query);

if ($db_check_result->num_rows == 0) {
    // Database tidak ada, buat database
    $create_db_query = "CREATE DATABASE $database";
    if ($mysqli->query($create_db_query) === TRUE) {
        echo "Database $database created successfully.\n";
    } else {
        die("Error creating database: " . $mysqli->error);
    }
}

// Tutup koneksi awal dan buka koneksi baru ke database yang baru dibuat
$mysqli->close();
$mysqli = new mysqli($host, $username, $password, $database);

// Periksa koneksi baru
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Buat tabel jika belum ada
$user_table_query = "CREATE TABLE IF NOT EXISTS user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$mysqli->query($user_table_query);
$booking_table_query = "CREATE TABLE IF NOT EXISTS booking_table (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    date VARCHAR(50) NOT NULL,
    time VARCHAR(50) NOT NULL,
    people INT NOT NULL,
    message VARCHAR(255),
    status TINYINT NOT NULL
)";
$mysqli->query($booking_table_query);
?>
