<?php

	include_once('../modele/billet.php');
	include_once('../modele/commentaires.php');

	session_start();

	$actions = array(
	'post',
	'supprimer',
	'modifier',
	'modifierForm',
	'detail',
	'liste',
	'admin'
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

	function postAction()
	{
		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];

		if(strlen($titre) == 0 || strlen($contenu) == 0){
			header('Location: billet2.php?action=admin&vide');
			die();
		}

		ajouterBillet($titre, $contenu);

		header('Location: billet2.php?action=admin');
	}

	function supprimerAction()
	{
		$idBillet = $_GET['id_billet'];

		supprimerBillet($idBillet);

		header('Location: billet2.php?action=admin');
	}

	function modifierFormAction()
	{
		$idBillet = $_GET['id_billet'];

		$titre = getTitle($idBillet);
		$contenu = getContent($idBillet);

		include_once('../vue/modifierBilletForm.html.php');
	}



	function modifierAction()
	{
		$titre = $_POST['titre'];
		$contenu = $_POST['contenu'];
		$idBillet = $_POST['idBillet'];

		modifierBillet($titre, $contenu, $idBillet);

		$billets = listBillets();

		header('Location: billet2.php?billetmodif&action=admin');
	}

	function detailAction()
	{	

		$idBillet = $_GET['id_billet'];

		$billet = getBillet($idBillet);

		$commentaires = listComments($idBillet);

		include_once('../vue/commentaires.html.php');
	}

	function listeAction()
	{
		$billets = listBillets();

		include_once('../vue/billets.html.php');
	}

	function adminAction()
	{
		$billets = listbillets();

		include_once('../vue/gererBillets.html.php');
	}