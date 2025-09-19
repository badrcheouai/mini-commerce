<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$cartItemCount = !empty($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $_SESSION['user_name'] ?? '';
$basePath = '/mini-commerce';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Souk Online</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body { display: flex; flex-direction: column; min-height: 100vh; }
		.main-content { flex: 1; }
		.card-img-top { height: 200px; object-fit: cover; }
	</style>
</head>
<body>

<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="<?= $basePath ?>/index.php">🇲🇦 Souk Online</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a class="nav-link" href="<?= $basePath ?>/index.php">Accueil</a></li>
					<li class="nav-item">
						<a class="nav-link" href="<?= $basePath ?>/index.php?action=showCart">
							Panier <span class="badge bg-primary rounded-pill"><?= $cartItemCount ?></span>
						</a>
					</li>
					<?php if ($isLoggedIn): ?>
						<li class="nav-item"><span class="navbar-text me-3">Bienvenue, <?= htmlspecialchars($userName) ?></span></li>
						<li class="nav-item"><a class="nav-link" href="<?= $basePath ?>/index.php?action=logout">Déconnexion</a></li>
					<?php else: ?>
						<li class="nav-item"><a class="nav-link" href="<?= $basePath ?>/index.php?action=login">Connexion</a></li>
						<li class="nav-item"><a class="nav-link" href="<?= $basePath ?>/index.php?action=register">Inscription</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>
</header>

<main class="main-content py-5">


