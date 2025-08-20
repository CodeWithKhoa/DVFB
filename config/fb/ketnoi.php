<?php
$servername = getenv('DB_HOST') ?: 'localhost';
$username   = getenv('DB_USERNAME') ?: 'your_db_user';
$password   = getenv('DB_PASSWORD') ?: 'your_db_password';
$dbname     = getenv('DB_NAME') ?: 'your_db_name';

// Create connection
$ketnoi = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($ketnoi, 'utf8');
