<?php
require_once __DIR__ . '/../models/Product.php';

class CartController {
	public function add() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		$productId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($productId <= 0) {
			header('Location: index.php');
			exit();
		}

		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'] = [];
		}

		if (isset($_SESSION['cart'][$productId])) {
			$_SESSION['cart'][$productId]++;
		} else {
			$_SESSION['cart'][$productId] = 1;
		}

		header('Location: index.php?action=showCart');
		exit();
	}

	public function show() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		global $pdo;
		$productModel = new Product($pdo);

		$cartItems = [];
		$total = 0;

		if (!empty($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $productId => $quantity) {
				$product = $productModel->getProductById((int) $productId);
				if ($product) {
					$subtotal = ((float) $product['price']) * (int) $quantity;
					$cartItems[] = [
						'id' => (int) $productId,
						'name' => $product['name'],
						'price' => (float) $product['price'],
						'image' => $product['image'],
						'quantity' => (int) $quantity,
						'subtotal' => $subtotal,
					];
					$total += $subtotal;
				}
			}
		}

		require_once __DIR__ . '/../views/cart.php';
	}

	// Update item quantity
	public function update() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		$productId = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
		$quantity = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 0;

		if ($productId > 0) {
			if ($quantity > 0) {
				$_SESSION['cart'][$productId] = $quantity;
			} else {
				unset($_SESSION['cart'][$productId]);
			}
		}

		header('Location: index.php?action=showCart');
		exit();
	}

	// Remove an item from the cart
	public function remove() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		$productId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
		if ($productId > 0 && isset($_SESSION['cart'][$productId])) {
			unset($_SESSION['cart'][$productId]);
		}

		header('Location: index.php?action=showCart');
		exit();
	}
}


