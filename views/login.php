<?php require_once __DIR__ . '/header.php'; ?>
<div class="container mt-5">
	<h1>Connexion</h1>
	<form action="index.php?action=authenticate" method="post" class="mt-3" style="max-width: 420px;">
		<div class="mb-3">
			<label class="form-label">Email</label>
			<input type="email" name="email" class="form-control" required>
		</div>
		<div class="mb-3">
			<label class="form-label">Mot de passe</label>
			<input type="password" name="password" class="form-control" required>
		</div>
		<button type="submit" class="btn btn-primary w-100">Se connecter</button>
	</form>
</div>


