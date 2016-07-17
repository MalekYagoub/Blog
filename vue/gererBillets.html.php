<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Gérer Billets</title>
	<meta charset="utf-8">
</head>
<body>

	<?php $menu = 'admin_billets'; ?>
	<?php include_once('nav.html.php'); ?>

	<div class="container">

		<h1>Ajouter un billet</h1>

		<p><a href="../controleur/billet2.php?action=liste">Retour</a></p>

		<?php if(isset($_GET['billetmodif'])):?><div class="container"><p class="alert alert-success" role="alert">Le billet a bien été modifié</p></div><?php endif;?>
		<?php if(isset($_GET['vide'])):?><div class="container"><p class="alert alert-danger" role="alert">Un des champs est vide</p></div><?php endif;?>

		<form method="post" action="../controleur/billet2.php?action=post">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Titre</span>
				<p><input type="text" name="titre" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
				<span class="input-group-addon" id="basic-addon1">Contenu</span>
				<p><textarea name="contenu" class="form-control" aria-describedby="basic-addon1"></textarea></p>
			<p><button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button></p>		
		</form>

		<h1>Liste des billets</h1> <br />

		<?php foreach($billets as $key => $billet): ?>
		
			<div class="panel panel-primary">
				<p class="panel-heading"> <?php echo $billet['titre']; ?>
				<?php echo 'le ' . date('d/m/Y à H:i:s', strtotime($billet['date_creation'])); ?> </p>
				<p class="panel-body"> <?php echo $billet['contenu']; ?> </p> 
				<p class="panel-body"><a href="../controleur/billet2.php?id_billet=<?php echo $billet['id']; ?>&amp;action=supprimer">Supprimer</a>
				&emsp;
				<a href="../controleur/billet2.php?id_billet=<?php echo $billet['id']; ?>&amp;action=modifierForm">Modifier</a></p><br />
			</div>

		<?php endforeach; ?>
	</div>


</body>
</html>

<!-- <form method="post" action="../controleur/ajouterBillet.php">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Titre</span>
				<p><input type="text" name="titre" class="form-control" aria-describedby="basic-addon1"></p>
			</div>
			<br />
				<span class="input-group-addon" id="basic-addon1">Contenu</span>
				<p><textarea name="contenu" class="form-control" aria-describedby="basic-addon1"></textarea></p>
			<p><button type="submit" class="btn btn-default" name="valider">Valider</button></p>		
		</form> -->