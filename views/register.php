<?php require_once __DIR__ . '/header.php'; ?>
<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-5">
			<div class="card shadow-sm border-0">
				<div class="card-body p-4 p-md-5">
					<h3 class="mb-4 text-center"><i class="bi bi-person-plus-fill"></i> Inscription</h3>
					<form action="index.php?action=storeUser" method="post">
						<div class="mb-3">
							<label class="form-label">Nom</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-person-fill"></i></span>
								<input type="text" name="name" class="form-control" placeholder="Votre nom" required>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Email</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
								<input type="email" name="email" class="form-control" placeholder="vous@example.com" required>
							</div>
						</div>
						<div class="mb-3">
							<label class="form-label">Mot de passe</label>
							<div class="input-group">
								<span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
								<input type="password" name="password" class="form-control" placeholder="••••••••" required>
							</div>
						</div>
						<button type="submit" class="btn btn-primary w-100 fw-bold"><i class="bi bi-person-check-fill"></i> Créer mon compte</button>
					</form>
					<div class="text-center mt-3">
						<small class="text-muted">Vous avez déjà un compte ? <a href="index.php?action=login">Se connecter</a></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


