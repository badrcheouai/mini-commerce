<?php require_once __DIR__ . '/header.php'; ?>
<div class="container py-5">
	<h1 class="mb-4"><i class="bi bi-receipt"></i> Mes commandes</h1>
	<?php if (empty($orders)): ?>
		<div class="alert alert-info">Vous n'avez pas encore passé de commande.</div>
	<?php else: ?>
		<?php foreach ($orders as $order): ?>
			<div class="card mb-4 shadow-sm border-0">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center mb-2">
						<h5 class="mb-0">Commande #<?= $order['id'] ?></h5>
						<span class="text-muted small">Le <?= date('d/m/Y H:i', strtotime($order['order_date'])) ?></span>
					</div>
					<p class="mb-2">Total: <strong><?= number_format($order['total_amount'], 2, ',', ' ') ?> DHS</strong></p>
					<div class="table-responsive">
						<table class="table table-sm align-middle">
							<thead>
								<tr>
									<th>Produit</th>
									<th class="text-center">Qté</th>
									<th class="text-end">Prix</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($orderItemsMap[$order['id']] as $it): ?>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<img src="<?= '/mini-commerce/public/images/' . htmlspecialchars($it['image']) ?>" alt="<?= htmlspecialchars($it['name']) ?>" class="rounded me-2" style="width:40px;height:40px;object-fit:cover;">
											<div><?= htmlspecialchars($it['name']) ?></div>
										</div>
									</td>
									<td class="text-center"><?= (int) $it['quantity'] ?></td>
									<td class="text-end"><?= number_format($it['price'], 2, ',', ' ') ?> DHS</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
<?php require_once __DIR__ . '/footer.php'; ?>


