<?php require_once __DIR__ . '/header.php'; ?>

<div class="container">
	<h1 class="mb-4">Finaliser ma commande 💳</h1>
	<div class="row g-5">
		<div class="col-md-5 col-lg-4 order-md-last">
			<h4 class="d-flex justify-content-between align-items-center mb-3">
				<span class="text-primary">Votre Panier</span>
				<span class="badge bg-primary rounded-pill"><?= count($cartItems) ?></span>
			</h4>
			<ul class="list-group mb-3">
				<?php foreach ($cartItems as $item): ?>
					<li class="list-group-item d-flex justify-content-between lh-sm">
						<div>
							<h6 class="my-0"><?= htmlspecialchars($item['name']) ?></h6>
							<small class="text-muted">Quantité: <?= $item['quantity'] ?></small>
						</div>
						<span class="text-muted"><?= number_format($item['subtotal'], 2, ',', ' ') ?> DHS</span>
					</li>
				<?php endforeach; ?>
				<li class="list-group-item d-flex justify-content-between">
					<span>Total (DHS)</span>
					<strong><?= number_format($total, 2, ',', ' ') ?> DHS</strong>
				</li>
			</ul>
		</div>

		<div class="col-md-7 col-lg-8">
			<h4 class="mb-3">Adresse de facturation</h4>
			<form action="index.php?action=placeOrder" method="post">
				<div class="row g-3">
					<div class="col-12">
						<label for="name" class="form-label">Nom complet</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="col-12">
						<label for="email" class="form-label">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
					</div>
					<div class="col-12">
						<label for="address" class="form-label">Adresse de livraison</label>
						<textarea class="form-control" id="address" name="address" rows="3" required></textarea>
					</div>
				</div>
				<hr class="my-4">
				<button class="w-100 btn btn-primary btn-lg" type="submit">Valider et Payer</button>
			</form>
		</div>
	</div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>


