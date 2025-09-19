<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Product.php';

class OrderController {
	public function checkout() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if (empty($_SESSION['cart'])) {
			header('Location: index.php?action=showCart');
			exit();
		}

		global $pdo;
		$productModel = new Product($pdo);
		$cartItems = [];
		$total = 0;
		foreach ($_SESSION['cart'] as $productId => $quantity) {
			$product = $productModel->getProductById((int) $productId);
			if ($product) {
				$cartItems[] = [
					'name' => $product['name'],
					'price' => (float) $product['price'],
					'quantity' => (int) $quantity,
					'subtotal' => ((float) $product['price']) * (int) $quantity,
				];
				$total += ((float) $product['price']) * (int) $quantity;
			}
		}

		require_once __DIR__ . '/../views/checkout.php';
	}

	public function placeOrder() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		global $pdo;

		$customerDetails = [
			'name' => $_POST['name'] ?? '',
			'email' => $_POST['email'] ?? '',
			'address' => $_POST['address'] ?? '',
		];

		// If the user is logged in, prefer the session email (so orders appear in "Mes commandes")
		if (!empty($_SESSION['user_email'])) {
			$customerDetails['email'] = $_SESSION['user_email'];
			if (!empty($_SESSION['user_name'])) {
				$customerDetails['name'] = $_SESSION['user_name'];
			}
		}

		$productModel = new Product($pdo);
		$cartItems = [];
		$total = 0;
		if (!empty($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $productId => $quantity) {
				$product = $productModel->getProductById((int) $productId);
				if ($product) {
					$cartItems[] = [
						'id' => (int) $productId,
						'price' => (float) $product['price'],
						'quantity' => (int) $quantity,
					];
					$total += ((float) $product['price']) * (int) $quantity;
				}
			}
		}

		$orderModel = new Order($pdo);
		$success = $orderModel->create($customerDetails, $cartItems, (float) $total);

		if ($success) {
			unset($_SESSION['cart']);
			require_once __DIR__ . '/../views/order_success.php';
			return;
		}

		die('Une erreur est survenue lors de la création de la commande.');
	}

	public function myOrders() {
		if (session_status() == PHP_SESSION_NONE) { session_start(); }
		if (empty($_SESSION['user_email'])) {
			header('Location: index.php?action=login&next=' . urlencode('index.php?action=myOrders'));
			exit();
		}

		global $pdo;
		$orderModel = new Order($pdo);
		$orders = $orderModel->getOrdersByEmail($_SESSION['user_email']);
		$orderItemsMap = [];
		foreach ($orders as $o) {
			$orderItemsMap[$o['id']] = $orderModel->getOrderItems((int) $o['id']);
		}

		require_once __DIR__ . '/../views/my_orders.php';
	}
}


