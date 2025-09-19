<?php $basePath = '/mini-commerce'; require_once __DIR__ . '/header.php'; ?>

<div class="container mt-5">
	<h1 class="mb-4">Mon Panier 🛒</h1>

    <?php if (empty($cartItems)): ?>
        <div class="alert alert-info d-flex justify-content-between align-items-center">
            <div>
                Votre panier est vide.
            </div>
            <a href="index.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Continuer mes achats</a>
        </div>
    <?php else: ?>
        <table class="table table-hover align-middle">
			<thead>
				<tr>
                    <th class="w-50">Produit</th>
                    <th class="text-center">Prix</th>
                    <th class="text-center">Quantité</th>
                    <th class="text-end">Sous-total</th>
                    <th class="text-end">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($cartItems as $item): ?>
					<tr>
						<td>
                            <div class="d-flex align-items-center">
                                <img src="<?= $basePath ?>/public/images/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="rounded me-3" style="width: 56px; height: 56px; object-fit: cover;">
                                <div>
                                    <div class="fw-semibold"><?= htmlspecialchars($item['name']) ?></div>
                                    <small class="text-muted">ID: <?= $item['id'] ?></small>
                                </div>
                            </div>
						</td>
                        <td class="text-center align-middle"><?= number_format($item['price'], 2, ',', ' ') ?> DHS</td>
                        <td class="text-center">
                            <form action="index.php?action=updateCart" method="post" class="d-inline-flex align-items-center justify-content-center">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" class="form-control form-control-sm text-center" style="width: 80px;" min="1">
                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2"><i class="bi bi-check-lg"></i></button>
                            </form>
                        </td>
                        <td class="text-end"><strong><?= number_format($item['subtotal'], 2, ',', ' ') ?> DHS</strong></td>
                        <td class="text-end">
                            <a href="index.php?action=removeCart&id=<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="bi bi-trash3"></i></a>
                        </td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

        <div class="d-flex justify-content-between align-items-center">
            <a href="index.php" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Continuer mes achats</a>
            <div class="text-end">
                <div class="fs-4 fw-bold">Total : <?= number_format($total, 2, ',', ' ') ?> DHS</div>
                <a href="index.php?action=checkout" class="btn btn-primary btn-lg mt-2"><i class="bi bi-credit-card-2-front-fill"></i> Passer la commande</a>
            </div>
		</div>
	<?php endif; ?>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>


