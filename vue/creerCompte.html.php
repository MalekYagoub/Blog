<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Créer un compte</title>
	<meta charset="utf-8">
</head>
<body>

	<div class="container">
		<h1 class="form-signin-heading">Création du compte</h1>

		<br />

		<?php if(isset($_GET['mp'])):?> <p class="alert alert-danger" role="alert">Pseudo indisponible ou inccorect</p> <?php endif;?>
		<?php if(isset($_GET['mmdp'])):?> <p class="alert alert-danger" role="alert">Les deux mots de passe ne sont pas identiques ou sont incorrect</p> <?php endif;?> 
		<?php if(isset($_GET['memail'])):?> <p class="alert alert-danger" role="alert">l'email est inccorect</p> <?php endif;?>

		<form method="post" action="../controleur/membre.php?action=verifCompte">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Pseudo</span>
				<p><input type="text" name="pseudo" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Mot de passe</span>
				<p><input type="password" name="mdp" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Retapez votre mot de passe</span>
				<p><input type="password" name="mdp2" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Adresse email</span>
				<p><input type="text" name="email" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<p><button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button></p>
		</form>

		<a href="../controleur/membre.php?action=connexion">Retour</a>
	</div>

</body>
</html>