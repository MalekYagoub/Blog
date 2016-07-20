<?php

	include_once('../modele/membres.php');
	include_once('../modele/billet.php');

	session_start();

	$actions = array(
	'deco',
	'connexion',
	'profil',
	'changementMdp',
	'verifCo',
	'verifCompte',
	'creerCompte',
	'adminMembres',
	'changerStatut'
	);

	$requete = explode('&', $_SERVER['QUERY_STRING']);

	foreach($requete as $param) {
		$params = explode('=', $param);
		if ($params[0] == 'action' && in_array($params[1], $actions)) {
			$action = $params[1] . 'Action';
			$action();
			return;
		}
	}

	function decoAction()
	{

		$_SESSION = array();
		session_destroy();

		setcookie('sac', 0, time() -60, '/', null, false, true);

		header('Location: membre.php?action=connexion');

	}

	function connexionAction()
	{
		include_once('../vue/connexion.html.php');
	}

	function profilAction()
	{
		$menu = 'profil';

		if(isset($_GET['auteur'])){
			$idTab = getId($_GET['auteur']);
			$idMembre = $idTab['id'];
		}
		else{
			$idMembre = $_SESSION['id'];
		}

		$profil = voirProfil($idMembre);

		include_once('../vue/profil.html.php'); 
	}

	function changementMdpAction()
	{
		$idMembre = $_SESSION['id'];

		$mdp = sha1($_POST['mdp']);
		$mdpVerif = verifMdp($idMembre);
		$nouveaumdp = sha1($_POST['nouveaumdp']);
		$nouveaumdpVerif = sha1($_POST['nouveaumdpVerif']);

		if($mdp != $mdpVerif['pass']){
			header('Location: ../vue/changementmdpForm.html.php?mmdp');
			die();
		}
		elseif($nouveaumdp != $nouveaumdpVerif){
			header('Location: ../vue/changementmdpForm.html.php?mmdpverif');
			die();
		}

		setNewPassword($nouveaumdp, $idMembre);

		header('Location: membre.php?nmdpok&action=listeBillets');
	}


	function verifCoAction()
	{
		$pseudo = $_POST['pseudo'];
	 	$mdp = sha1($_POST['mdp']);

	 	$membre = verifMembre($pseudo, $mdp);

	 	if($membre['statut'] == -1){
	 		header('Location: membre.php?action=connexion&err');
	 		die();
	 	}
	 	elseif(!$membre){
	 		header('Location: ../vue/connexion.html.php?mi'); // mauvais identifiants
	 		exit(0);
	 	}
	 	elseif(isset($_POST['autoco']) && $_POST['autoco']){
			setcookie('sac', 1, time()+3600*24*3600, '/', null, false, true); //cookie du statut de l'autoco
		}

		session_start();
		$_SESSION['id'] = $membre['id'];
		$_SESSION['pseudo'] = $membre['pseudo'];
		$_SESSION['statut'] = $membre['statut'];
		
		header('Location: billet2.php?action=liste');
	}

	function verifCompteAction()
	{
		$pseudo = $_POST['pseudo'];
		$mdp = sha1($_POST['mdp']);
		$mdpverif = sha1($_POST['mdp2']);
		$email = $_POST['email'];

		$verifpseudo = verifpseudo($pseudo);
		if($verifpseudo == 1){
			header('Location: creerCompte.php?mp');
			die();
		}

		elseif($mdp != $mdpverif || empty($mdp) || empty($mdpverif)){
			header('Location: creerCompte.php?mmdp');
			die();
		}

		elseif(!preg_match('#^[-a-z0-9._]+@[-a-z0-9._]{2,}.[a-z]{2,4}$#',$email) || empty($email)){
			header('Location: creerCompte.php?memail');
			die();
		}

		insererMembre($pseudo, $mdp, $email);

		header('Location: membre.php?inscrit&action=connexion');
	}

	function creerCompteAction()
	{
		include_once('../vue/creerCompte.html.php');
	}

	function adminBilletsAction()
	{
		$billets = listbillets();

		include_once('../vue/gererBillets.html.php');
	}

	function adminMembresAction()
	{
		$membres = listMembres();

		if(isset($_POST['recherche'])){
			$recherche = getMembres($_POST['recherche']);
		}
		
		include_once('../vue/gererMembresForm.html.php');	
	}

	function changerStatutAction()
	{

		if($_POST['statut'] == 'admin'){
			$statut = 1;
		}
		elseif($_POST['statut'] == 'membre'){
			$statut = 0;
		}
		else{
			$statut = -1;
		}	

		$idMembre = $_GET['idMembre'];

		changerStatut($statut, $idMembre);

		header('Location: membre.php?ok&action=adminMembres');
		
			
	}
		
