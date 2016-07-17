<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Changer son mot de passe</title>
	<meta charset="utf-8">
</head>
<body>

	<?php include_once('nav.html.php'); ?>

	<div class="container">
		<h1>Modification du mot de passe</h1>

		<p><a href="../controleur/billet2.php?action=liste">Retour</a></p>

		<?php if(isset($_GET['mmdp'])):?> <p class="alert alert-danger" role="alert">Mauvais mot de passe</p> <?php endif;?>
		<?php if(isset($_GET['mmdpverif'])):?> <p class="alert alert-danger" role="alert">Mauvais nouveau mot de passe</p> <?php endif;?>

		<form method="post" action="../controleur/membre.php?action=changementMdp">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Mot de passe</span>
				<p><input type="password" name="mdp" class="form-control" aria-describedby="basic-addon1"></p> 
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Nouveau mot de passe</span>
				<p><input type="password" name="nouveaumdp" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Retapez le nouveau mot de passe</span>
				<p><input type="password" name="nouveaumdpVerif" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<p><button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button></p>
		</form>
	</div>

</body>
</html>