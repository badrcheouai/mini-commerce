<?php $basePath = '/mini-commerce'; require_once __DIR__ . '/header.php'; ?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<img src="<?= $basePath ?>/public/images/<?= htmlspecialchars($product['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($product['name']) ?>">
		</div>
		<div class="col-md-6">
			<h1><?= htmlspecialchars($product['name']) ?></h1>
			<p class="lead">&nbsp;<?= htmlspecialchars($product['description']) ?></p>
			<h2 class="text-primary"><?= number_format($product['price'], 2, ',', ' ') ?> DHS</h2>
			<hr>
			<a href="index.php?action=addToCart&id=<?= $product['id'] ?>" class="btn btn-success btn-lg">Ajouter au panier</a>
			<a href="<?= $basePath ?>/index.php" class="btn btn-secondary btn-lg">Retour</a>
		</div>
	</div>
</div>

 </body>
 </html>


