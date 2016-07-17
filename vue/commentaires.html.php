<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

	<title>Commentaires</title>
</head>
<body>

	<?php $menu='blog' ; ?>
	<?php include_once('nav.html.php'); ?>

	<div class="container">
		<div class="starter-template">

		<br /><br /><br /><br />

			<h1>Détails</h1>

			<p><a href="../controleur/billet2.php?action=liste">Retour</a></p>
		
			<div class="panel panel-primary">
				<p class="panel-heading"> <?php echo $billet['titre']; ?>
				<?php echo 'le ' . date('d/m/Y à H:i:s', strtotime($billet['date_creation'])); ?> </p>
				<p class="panel-body"> <?php echo $billet['contenu']; ?> </p>
			</div>

			

			<h1>Rédiger un commentaire</h1> <br />

			<form method="post" action="../controleur/commentaire.php?action=post">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Commentaire</span>
					<p><input type="text" name="commentaire" class="form-control" aria-describedby="basic-addon1"></p>
				</div>
				<br />
				<input type="hidden" name="idBillet" value="<?php echo $idBillet; ?>">
				<button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button>
			</form>

			<h1>Commentaires</h1>

			<?php foreach($commentaires as $key => $commentaire): ?>
				<p> <?php echo $commentaire['auteur']; ?>
					<?php echo 'le ' . date('d/m/Y à H:i:s', strtotime($commentaire['date_commentaire'])); ?> 
					<?php if(isset($_SESSION['statut']) && $_SESSION['statut'] == 1):?>
						<a href="../controleur/commentaire.php?idCommentaire=<?php echo $commentaire['id']; ?>&amp;action=supprimer&amp;idBillet=<?php echo $idBillet ?>">Supprimer</a>
					<?php endif; ?>
				</p>
				<p> <?php echo $commentaire['commentaire']; ?> </p> <br />
			<?php endforeach; ?>
		</div>
	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
</body>
</html>