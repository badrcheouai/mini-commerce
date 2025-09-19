<?php
require_once __DIR__ . '/config/database.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {
	case 'show':
		require_once __DIR__ . '/controllers/ProductController.php';
		$controller = new ProductController();
		$controller->show();
		break;

	case 'addToCart':
		require_once __DIR__ . '/controllers/CartController.php';
		$controller = new CartController();
		$controller->add();
		break;

	case 'showCart':
		require_once __DIR__ . '/controllers/CartController.php';
		$controller = new CartController();
		$controller->show();
		break;

	case 'updateCart':
		require_once __DIR__ . '/controllers/CartController.php';
		$controller = new CartController();
		$controller->update();
		break;

	case 'removeCart':
		require_once __DIR__ . '/controllers/CartController.php';
		$controller = new CartController();
		$controller->remove();
		break;

	case 'checkout':
		require_once __DIR__ . '/controllers/OrderController.php';
		$controller = new OrderController();
		$controller->checkout();
		break;

	case 'placeOrder':
		require_once __DIR__ . '/controllers/OrderController.php';
		$controller = new OrderController();
		$controller->placeOrder();
		break;

	case 'myOrders':
		require_once __DIR__ . '/controllers/OrderController.php';
		$controller = new OrderController();
		$controller->myOrders();
		break;

	case 'register':
		require_once __DIR__ . '/controllers/UserController.php';
		$controller = new UserController();
		$controller->register();
		break;

	case 'storeUser':
		require_once __DIR__ . '/controllers/UserController.php';
		$controller = new UserController();
		$controller->storeUser();
		break;

	case 'login':
		require_once __DIR__ . '/controllers/UserController.php';
		$controller = new UserController();
		$controller->login();
		break;

	case 'authenticate':
		require_once __DIR__ . '/controllers/UserController.php';
		$controller = new UserController();
		$controller->authenticate();
		break;

	case 'logout':
		require_once __DIR__ . '/controllers/UserController.php';
		$controller = new UserController();
		$controller->logout();
		break;

	case 'home':
	default:
		require_once __DIR__ . '/controllers/HomeController.php';
		$controller = new HomeController();
		$controller->index();
		break;
}


