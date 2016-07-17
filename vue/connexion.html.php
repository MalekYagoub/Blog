<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../espace.css">	

	<title>Connexion</title>
	<meta charset="utf-8">
</head>

<body>

	<?php if(isset($_GET['err'])):?> <div class="container"><p class="alert alert-danger" role="alert">Vous êtes banni</p></div> <?php die();  endif; ?>

	<div class="container">
		<h1 class="form-signin-heading">Connexion</h1> <br />

		<?php if(isset($_GET['mi'])):?> <p class="alert alert-danger" role="alert">Mauvais identifiants</p> 
		<?php elseif(isset($_GET['inscrit'])):?> <p class="alert alert-success" role="alert">Vous avez bien été inscrit</p> <?php endif; ?>
		<?php if(isset($_COOKIE['sac']) && $_COOKIE['sac'] == 1){ header('Location: ../controleur/index.php');} ?>

		<form method="post" action="../controleur/membre.php?action=verifCo">
			<p><input class="form-control" placeholder="Pseudo" type="text" name="pseudo"></p>
			<p><input class="form-control" placeholder="Mot de passe" type="password" name="mdp"></p>
			<p><label>Connexion automatique </label>  <input  type="checkbox" name="autoco"></p>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="autoco">Se connecter</os-p></button>

		</form>

		<br /><p><a href="../controleur/membre.php?action=creerCompte">Créer un compte</a></p>
	</div>

</body>
</html>