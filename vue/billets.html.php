<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">

	<title>Page principale</title>

</head>
<body>

	<?php $menu='blog' ; ?>
	<?php include_once('nav.html.php'); ?>

	<p> <?php if(isset($_GET['nmdpok'])):?><div class="container"><p class="alert alert-success" role="alert">Votre mot de passe a été modifié </p></div><?php endif;?>

	<h1>Liste des billets</h1> <br />
	
	<?php foreach($billets as $key => $billet): ?>
		<div class="container">
			<div class="panel panel-primary">
				<p class="panel-heading"> <?php echo $billet['titre']; ?>
				<?php echo 'le ' . date('d/m/Y à H:i:s', strtotime($billet['date_creation'])); ?> </p>
				<p class="panel-body"> <?php echo $billet['contenu']; ?> </p> 
				<p class="panel-body"><a href="../controleur/billet2.php?id_billet=<?php echo $billet['id']; ?>&amp;action=detail">Commentaires</a></p> <br />
			</div>
		</div>
	<?php endforeach; ?>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>


