<?php
$host = 'localhost';
$dbname = 'penggemar_burung_bontang';
$username = 'root';
$password = '';
try {
    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

$nama_web = 'UAS - Komunitas Burung Bontang';
$path = '/uas';
$base_url = 'http://localhost:8080' . $path;