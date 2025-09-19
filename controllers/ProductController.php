<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
	public function show() {
		if (!isset($_GET['id'])) {
			die('Product ID is missing.');
		}

		$productId = (int) $_GET['id'];
		global $pdo;
		$productModel = new Product($pdo);
		$product = $productModel->getProductById($productId);

		if (!$product) {
			die('Product not found.');
		}

		require_once __DIR__ . '/../views/product_details.php';
	}
}


