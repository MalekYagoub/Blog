<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Modifier un Billet</title>
	<meta charset="utf-8">
</head>
<body>

	
	<?php include_once('nav.html.php'); ?>

	<div class="container">
		<h1>Modifier un billet</h1>

		<a href="../controleur/billet2.php?action=admin">Retour</a> <br /><br />


		<form method="post" action="../controleur/billet2.php?id_billet=<?php echo $_GET['id_billet']; ?>&amp;action=modifier"">
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Titre</span>
				<p><input type="text" name="titre" class="form-control" aria-describedby="basic-addon1" value="<?php echo htmlspecialchars($titre['titre']); ?>"></p>
			</div>
			<br />
			
				<span class="input-group-addon" id="basic-addon1">Contenu</span>
				<p><textarea name="contenu" class="form-control" aria-describedby="basic-addon1"><?php echo htmlspecialchars($contenu['contenu']); ?></textarea></p>
			
			<br />
			<input type="hidden" name="idBillet" value="<?php echo $idBillet; ?>">
			<p><button type="submit" class="btn btn-success dropdown-toggle" name="valider">Valider</button></p>
		</form>
	</div>

</body>
</html>
