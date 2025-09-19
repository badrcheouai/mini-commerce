<?php
require_once __DIR__ . '/../models/Product.php';

class HomeController {
	public function index() {
		global $pdo;

		$productModel = new Product($pdo);
		$categories = $productModel->getAllCategories();

		$selectedCategory = null;
		if (isset($_GET['category']) && $_GET['category'] !== '') {
			$selectedCategory = (int) $_GET['category'];
			$products = $productModel->getProductsByCategory($selectedCategory);
		} else {
			$products = $productModel->getAllProducts();
		}

		require __DIR__ . '/../views/home.php';
	}
}


