<?php
class User {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function findByEmail(string $email) {
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
		$stmt->execute([':email' => $email]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function create(string $name, string $email, string $passwordHash): bool {
		$stmt = $this->pdo->prepare(
			"INSERT INTO users (name, email, password) VALUES (:name, :email, :password)"
		);
		return $stmt->execute([
			':name' => $name,
			':email' => $email,
			':password' => $passwordHash,
		]);
	}
}


