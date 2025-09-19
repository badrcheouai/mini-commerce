<?php $basePath = '/mini-commerce'; require_once __DIR__ . '/header.php'; ?>

<div class="container mt-5">
	<h1 class="mb-4">Mon Panier 🛒</h1>

	<?php if (empty($cartItems)): ?>
		<div class="alert alert-info">
			Votre panier est vide. <a href="index.php">Continuez vos achats</a>.
		</div>
	<?php else: ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Produit</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Sous-total</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cartItems as $item): ?>
					<tr>
						<td>
							<img src="<?= $basePath ?>/public/images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 50px; height: 50px; object-fit: cover;">
							<?= htmlspecialchars($item['name']) ?>
						</td>
						<td><?= number_format($item['price'], 2, ',', ' ') ?> DHS</td>
						<td>
							<form action="index.php?action=updateCart" method="post" class="d-flex">
								<input type="hidden" name="product_id" value="<?= $item['id'] ?>">
								<input type="number" name="quantity" value="<?= $item['quantity'] ?>" class="form-control" style="width: 70px;" min="1">
								<button type="submit" class="btn btn-sm btn-outline-primary ms-2">OK</button>
							</form>
						</td>
						<td><strong><?= number_format($item['subtotal'], 2, ',', ' ') ?> DHS</strong></td>
						<td>
							<a href="index.php?action=removeCart&id=<?= $item['id'] ?>" class="btn btn-sm btn-danger">🗑️</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<div class="text-end">
			<h3>Total : <?= number_format($total, 2, ',', ' ') ?> DHS</h3>
			<a href="index.php" class="btn btn-secondary">Continuer mes achats</a>
			<a href="index.php?action=checkout" class="btn btn-primary">Passer la commande</a>
		</div>
	<?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>


