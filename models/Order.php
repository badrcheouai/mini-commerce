<?php
class Order {
	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function create(array $customerDetails, array $cartItems, float $total) {
		try {
			$this->pdo->beginTransaction();

			$stmt = $this->pdo->prepare(
				"INSERT INTO orders (customer_name, customer_email, customer_address, total_amount) VALUES (:name, :email, :address, :total)"
			);
			$stmt->execute([
				':name' => $customerDetails['name'],
				':email' => $customerDetails['email'],
				':address' => $customerDetails['address'],
				':total' => $total
			]);

			$orderId = $this->pdo->lastInsertId();

			$stmt = $this->pdo->prepare(
				"INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)"
			);
			foreach ($cartItems as $item) {
				$stmt->execute([
					':order_id' => $orderId,
					':product_id' => $item['id'],
					':quantity' => $item['quantity'],
					':price' => $item['price']
				]);
			}

			$this->pdo->commit();
			return true;

		} catch (Exception $e) {
			$this->pdo->rollBack();
			return false;
		}
	}
}


