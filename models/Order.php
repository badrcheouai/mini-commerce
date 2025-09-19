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

	public function getOrdersByEmail(string $email) {
		$stmt = $this->pdo->prepare("SELECT * FROM orders WHERE customer_email = :email ORDER BY order_date DESC");
		$stmt->execute([':email' => $email]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOrderItems(int $orderId) {
		$stmt = $this->pdo->prepare("SELECT oi.*, p.name, p.image FROM order_items oi INNER JOIN products p ON p.id = oi.product_id WHERE oi.order_id = :oid");
		$stmt->execute([':oid' => $orderId]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}


