<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$cartItemCount = !empty($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $_SESSION['user_name'] ?? '';
$userInitial = strtoupper(mb_substr($userName, 0, 1));
$basePath = '/mini-commerce';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Badr Market</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<style>
		:root {
			--bs-primary: #005A9C;
			--bs-secondary: #6c757d;
			--bs-dark: #222;
			--bs-light: #f8f9fa;
			--bs-font-sans-serif: 'Poppins', sans-serif;
		}
		body { display: flex; flex-direction: column; min-height: 100vh; background-color: #f4f7f6; }
		.main-content { flex: 1; }
		.card-img-top { height: 220px; object-fit: cover; }
		.card:hover { transform: translateY(-5px); box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15) !important; transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out; }
		.hero {
			background: linear-gradient(135deg, rgba(0,90,156,0.9), rgba(34,34,34,0.9)), url('<?= $basePath ?>/public/images/hero.jpg') center/cover no-repeat;
			border-radius: 1rem;
			color: #fff;
		}
		.hero .lead { opacity: 0.95; }
		.btn-cta { font-weight: 700; letter-spacing: .3px; }
	</style>
</head>
<body>

<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= $basePath ?>/index.php">🛒 Badr Market</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto align-items-lg-center">
					<li class="nav-item me-lg-2"><a class="nav-link" href="<?= $basePath ?>/index.php"><i class="bi bi-house-door-fill"></i> Accueil</a></li>
					<li class="nav-item me-lg-3">
						<a class="btn btn-outline-primary position-relative" href="<?= $basePath ?>/index.php?action=showCart">
							<i class="bi bi-cart3"></i> Mon Panier
							<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
								<?= $cartItemCount ?>
								<span class="visually-hidden">articles dans le panier</span>
							</span>
						</a>
					</li>
					<?php if ($isLoggedIn): ?>
						<li class="nav-item me-lg-2"><a class="nav-link" href="<?= $basePath ?>/index.php?action=myOrders"><i class="bi bi-receipt"></i> Mes commandes</a></li>
					<?php endif; ?>
					<?php if ($isLoggedIn): ?>
						<style>
							.avatar-circle { width: 36px; height: 36px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #005A9C, #0d6efd); color: #fff; font-weight: 700; }
						</style>
						<li class="nav-item d-flex align-items-center">
							<span class="avatar-circle me-2"><?= htmlspecialchars($userInitial) ?></span>
							<span class="navbar-text">Bienvenue, <?= htmlspecialchars($userName) ?></span>
						</li>
						<li class="nav-item ms-2"><a class="nav-link" href="<?= $basePath ?>/index.php?action=logout">Déconnexion</a></li>
					<?php else: ?>
					<li class="nav-item me-lg-2"><a class="nav-link" href="<?= $basePath ?>/index.php?action=login"><i class="bi bi-box-arrow-in-right"></i> Connexion</a></li>
					<li class="nav-item"><a class="btn btn-primary" href="<?= $basePath ?>/index.php?action=register"><i class="bi bi-person-plus-fill"></i> Créer un compte</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
</header>

<?php if ($isLoggedIn): ?>
<div class="bg-primary bg-gradient text-white py-2">
	<div class="container d-flex align-items-center justify-content-center small">
		<span><i class="bi bi-stars"></i> Heureux de vous revoir, <strong><?= htmlspecialchars($userName) ?></strong> !</span>
	</div>
</div>
<?php endif; ?>

<main class="main-content py-5">


