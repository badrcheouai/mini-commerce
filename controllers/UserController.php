<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
	public function register() {
		require_once __DIR__ . '/../views/register.php';
	}

	public function storeUser() {
		global $pdo;
		$name = trim($_POST['name'] ?? '');
		$email = trim($_POST['email'] ?? '');
		$password = $_POST['password'] ?? '';

		if ($name === '' || $email === '' || $password === '') {
			die('Champs requis manquants.');
		}

		$userModel = new User($pdo);
		$existing = $userModel->findByEmail($email);
		if ($existing) {
			die('Email déjà utilisé.');
		}

		$hash = password_hash($password, PASSWORD_DEFAULT);
		$userModel->create($name, $email, $hash);

		header('Location: index.php?action=login');
		exit();
	}

	public function login() {
		require_once __DIR__ . '/../views/login.php';
	}

	public function authenticate() {
		if (session_status() == PHP_SESSION_NONE) { session_start(); }
		global $pdo;
		$email = trim($_POST['email'] ?? '');
		$password = $_POST['password'] ?? '';

		$userModel = new User($pdo);
		$user = $userModel->findByEmail($email);
		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['user_id'] = (int) $user['id'];
			$_SESSION['user_name'] = $user['name'];
			header('Location: index.php');
			exit();
		}

		die('Identifiants invalides.');
	}

	public function logout() {
		if (session_status() == PHP_SESSION_NONE) { session_start(); }
		session_destroy();
		header('Location: index.php');
		exit();
	}
}


