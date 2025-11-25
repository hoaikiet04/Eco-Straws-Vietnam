<?php 
    // Kết nối MySQL
    $host = '127.0.0.1';   // dùng 127.0.0.1 ổn định hơn 'localhost'
    $user = 'root';
    $password = '';
    $dbname = 'eco';
    $port = 3307; // đúng port MySQL của bạn trong XAMPP

    $conn = new mysqli($host, $user, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
