
	<?php if(!isset($_SESSION['pseudo'])){ session_start(); } ?>
	<?php if(isset($_SESSION['statut']) && $_SESSION['statut'] == -1){ header('Location: ../controleur/membre.php?action=connexion'); } ?>


	<nav class="navbar navbar-inverse navbar-fixed-top" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Basculer la navigation></span>
					<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Bienvenue <?php echo $_SESSION['pseudo']; ?></os-p></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo isset($menu) && $menu == 'blog' ? 'active' : '' ?>"><a href="../controleur/billet2.php?action=liste">Blog</a></li>
					<li class="<?php echo isset($menu) && $menu == 'profil' ? 'active' : '' ?>"><a href="../controleur/membre.php?action=profil	">Profil</a></li>
					<?php if(isset($_SESSION['statut']) && $_SESSION['statut'] == 1):?>
						<li class="<?php echo isset($menu) && $menu == 'admin_billets' ? 'active' : '' ?>"><a href="../controleur/billet2.php?action=admin">Rédiger/Gérer les billets</a></li>
					<?php endif; ?>
					<?php if(isset($_SESSION['statut']) && $_SESSION['statut'] == 1):?>
						<li class="<?php echo isset($menu) && $menu == 'admin_membres' ? 'active' : '' ?>"><a href="../controleur/membre.php?action=adminMembres">Gérer les membres</a></li>
					<?php endif; ?>
					<li><a href="../controleur/membre.php?action=deco"">Déconnexion</a></os-p></a></li>		
				</ul>
			</div>		
		</div>
	</nav>