<?php
$basePath = '/mini-commerce';
require_once __DIR__ . '/header.php';
?>

<div class="container">
	<div class="p-5 mb-4 bg-light rounded-3 text-center">
		<div class="container-fluid py-5">
			<h1 class="display-5 fw-bold">Bienvenue au Souk Online</h1>
			<p class="fs-4">Découvrez les meilleurs produits, directement chez vous.</p>
		</div>
	</div>

	<h2 class="mb-4">Nos Produits</h2>

	<form method="get" action="index.php" class="row g-3 mb-4 align-items-center">
		<div class="col-md-4">
			<label class="visually-hidden" for="category">Catégorie</label>
			<select name="category" class="form-select" onchange="this.form.submit()">
				<option value="">Toutes les catégories</option>
				<?php foreach ($categories as $cat): ?>
					<option value="<?= $cat['id'] ?>" <?= (isset($selectedCategory) && $selectedCategory == $cat['id']) ? 'selected' : '' ?>>
						<?= htmlspecialchars($cat['name']) ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php if (!empty($selectedCategory)): ?>
			<div class="col-auto">
				<a class="btn btn-outline-secondary" href="index.php">Réinitialiser</a>
			</div>
		<?php endif; ?>
	</form>

	<div class="row">
		<?php if (empty($products)): ?>
			<div class="col-12">
				<div class="alert alert-info">Aucun produit trouvé.</div>
			</div>
		<?php else: ?>
			<?php foreach ($products as $product): ?>
			<div class="col-md-4 col-lg-3 mb-4">
				<div class="card h-100 shadow-sm">
					<a href="index.php?action=show&id=<?= $product['id'] ?>">
						<img src="<?= $basePath ?>/public/images/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
					</a>
					<div class="card-body d-flex flex-column">
						<h5 class="card-title">
							<a href="index.php?action=show&id=<?= $product['id'] ?>" class="text-decoration-none text-dark">
								<?= htmlspecialchars($product['name']) ?>
							</a>
						</h5>
						<p class="card-text text-muted flex-grow-1"><?= htmlspecialchars(substr($product['description'], 0, 50)) ?>...</p>
						<p class="card-text fs-5 fw-bold text-end"><?= number_format($product['price'], 2, ',', ' ') ?> DHS</p>
						<a href="index.php?action=addToCart&id=<?= $product['id'] ?>" class="btn btn-primary mt-auto">Ajouter au panier</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>


