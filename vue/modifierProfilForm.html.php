<!DOCTYPE html>
<html>
<head>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Modifier son profil</title>
	<meta charset="utf-8">
</head>
<body>

	<?php $menu = 'profil'; ?>

	<?php include_once('nav.html.php'); ?>

	<h1>Modifier son Profil</h1> <br />

	<div class="container">

		<p><a href="../controleur/membre.php?action=profil">Retour</a></p>

		<form action="../controleur/membre.php?action=changerProfil" method="post">
			<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Date de naissance</span>
					<p>
						<input type="date" name="dateNaissance" class="form-control" aria-describedby="basic-addon1" value="<?php echo $profil['date_naissance']; ?>">
					</p> 
			</div>
			<br />
			<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Passions</span>
					<p>
						<input type="input" name="passions" class="form-control" aria-describedby="basic-addon1" value="<?php echo $profil['passions']; ?>">
					</p> 
			</div>
			<br />
			<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Ville</span>
					<p>
						<input type="input" name="ville" class="form-control" aria-describedby="basic-addon1" value="<?php echo $profil['nom_ville']; ?>">
					</p> 
			</div>
			<br />
			<button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button></p>
		</form>
	</div>

</body>
</html>