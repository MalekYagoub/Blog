<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Profil</title>
	<meta charset="utf-8">
</head>
<body>

	<?php include_once('nav.html.php'); ?>

	<h1>Profil<?php if(isset($_GET['auteur'])){ echo ' de ' . $profil['pseudo'] ; } ?></h1>

	<div class="container">

		<p><a href="../controleur/billet2.php?action=liste">Retour</a></p>

		<p>
			<?php echo "Date d'inscritpion : " . date('d/m/Y', strtotime($profil['date_inscription'])) ; ?>
		</p>

		<p>
			Date de naissance : <?php if(!empty($profil['date_naissance'])){ echo date('d/m/Y', strtotime($profil['date_naissance'])) ; } else{ echo 'Non renseigné'; }?> 
		</p>
		<p>
			Passions : <?php if(!empty($profil['passions'])){ echo $profil['passions'] ; } else{ echo 'Non renseigné'; }?>
		 </p>
		<p>
			Ville : <?php if(!empty($profil['nom_ville'])){ echo $profil['nom_ville'] ; } else{ echo 'Non renseigné'; }?>
		</p>
		<?php if(!isset($_GET['auteur'])):?><a href="../controleur/membre.php?action=changerProfilForm">Modifier son profil</a><?php endif; ?>

	</div>

	<?php if(!isset($_GET['auteur'])):?>

		<div class="container">
			<h1>Modifier son mot de passe</h1>

			

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
	<?php endif; ?>

</body>
</html>