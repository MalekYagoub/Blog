<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Gérer les membres</title>
	<meta charset="utf-8">
</head>
<body>

	<?php $menu='admin_membres' ; ?>
	<?php include_once('nav.html.php'); ?>

	<h1>Rechercher un membre</h1>

	<?php if(isset($vide) && $vide == 1):?><div class="container"><p class="alert alert-danger" role="alert">La recherche est vide</p></div><?php endif;?>

	<div class="container">
		<p><a href="../controleur/billet2.php?action=liste">Retour</a></p>

		<form method="post" action="../controleur/membre.php?action=adminMembres">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Rechercher</span>
				<p><input type="text" name="recherche" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
			<p><button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button></p>		
		</form>

		<?php if(isset($recherche)):?>
			<h1>Resultat de la recherche</h1>
			<?php foreach($recherche as $membre):?>			
					<p>
						<?php echo $membre['pseudo']; ?> 
						| inscription : <?php echo date('d/m/Y', strtotime($membre['date_inscription']))?>
						| statut : <?php if($membre['statut'] == 1){ echo 'Admin'; } elseif($membre['statut'] == 0){ echo 'Membre'; } else{ echo 'Banni'; } ?>
					 	<form method="post" action="../controleur/membre.php?action=changerStatut&amp;idMembre=<?php echo $membre['id']; ?>">
					 		<select name="statut" id="statut">
					 			<option value="membre">Membre</option>
					 			<option value="admin">Admin</option>
					 			<option value="bannir">Bannir</option>
					 		</select>
					 		<input type="submit" name="Valider">
					 	</form>
					</p>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if(!isset($recherche)):?>
			<h1>Liste des membres</h1>

			<?php if(isset($_GET['ok'])):?> <p class="alert alert-success" role="alert">Le changement a bien été effectué</p> <?php endif; ?>

			<?php foreach($membres as $membre):?>
				<p>
					<?php echo $membre['pseudo']; ?> 
					| inscription : <?php echo date('d/m/Y', strtotime($membre['date_inscription']))?>
					| statut : <?php if($membre['statut'] == 1){ echo 'Admin'; } elseif($membre['statut'] == 0){ echo 'Membre'; } else{ echo 'Banni'; } ?>
				 	<form method="post" action="../controleur/membre.php?action=changerStatut&amp;idMembre=<?php echo $membre['id']; ?>">
					 	<select name="statut" id="statut">
					 		<option value="membre">Membre</option>
					 		<option value="admin">Admin</option>
					 		<option value="bannir">Bannir</option>
					 	</select>
					 	<input type="submit" name="Valider">
					</form>
				</p>
			<?php endforeach; ?>
		<?php endif; ?>

	</div>

</body>
</html>