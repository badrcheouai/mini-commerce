<?php
// Database configuration constants
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mini_commerce');
define('DB_USER', 'root');
define('DB_PASS', 'Badr2025');

try {
	$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	die("ERROR: Could not connect. " . $e->getMessage());
}


