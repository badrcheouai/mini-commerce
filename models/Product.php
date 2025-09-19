<?php
class Product {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function getAllProducts() {
		$stmt = $this->pdo->query("SELECT * FROM products ORDER BY id DESC");
		return $stmt->fetchAll();
	}

	public function getProductsByCategory(int $categoryId) {
		$stmt = $this->pdo->prepare("SELECT * FROM products WHERE category_id = :cid ORDER BY id DESC");
		$stmt->execute([':cid' => $categoryId]);
		return $stmt->fetchAll();
	}

	public function getAllCategories() {
		$stmt = $this->pdo->query("SELECT * FROM categories ORDER BY name ASC");
		return $stmt->fetchAll();
	}

	public function getProductById(int $id) {
		$stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
		$stmt->execute([':id' => $id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}


