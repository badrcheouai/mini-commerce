<?php require_once __DIR__ . '/header.php'; ?>

<div class="container mt-5">
	<h1 class="mb-4">Finaliser ma commande 💳</h1>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Vos informations</h5>
					<form action="index.php?action=placeOrder" method="post">
						<div class="mb-3">
							<label for="name" class="form-label">Nom complet</label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Adresse e-mail</label>
							<input type="email" class="form-control" id="email" name="email" required>
						</div>
						<div class="mb-3">
							<label for="address" class="form-label">Adresse de livraison</label>
							<textarea class="form-control" id="address" name="address" rows="3" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary w-100">Valider et Payer</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

 </body>
 </html>


