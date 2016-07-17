<?php
	// Prend les 5 derniers billets
	function listBillets(){ 
		$billets = array();

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC LIMIT 5');
		
		while($billet = $req->fetch(PDO::FETCH_ASSOC)){
			$billets[] = $billet;
		}
		
		return $billets ;
	}

	// retourne le billet avec l'id entré en paramètre
	function getBillet($idBillet){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('SELECT * FROM billets WHERE id=:id');
		$req->execute(array(
			"id" => $idBillet
		));
		
		return $req->fetch(PDO::FETCH_ASSOC);
	}

	function ajouterBillet($titre, $contenu){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');

		$req->execute(array(
			"titre" => $titre,
			"contenu" => $contenu
		));
	}

	function modifierBillet($titre, $contenu, $idBillet){
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('UPDATE billets SET titre=:titre, contenu=:contenu WHERE id=:id');

		$req->execute(array(
			"titre" => $titre,
			"contenu" => $contenu,
			"id" => $idBillet
		));
	}

	function getTitle($idBillet){
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('SELECT titre FROM billets WHERE id=:id');

		$req->execute(array(
			"id" => $idBillet
		));

		return $req->fetch(PDO::FETCH_ASSOC);
	}

	function getContent($idBillet){
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('SELECT contenu FROM billets WHERE id=:id');

		$req->execute(array(
			"id" => $idBillet
		));

		return $req->fetch(PDO::FETCH_ASSOC);
	}

	function supprimerBillet($idBillet){
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('DELETE FROM billets WHERE id=:id');

		$req->execute(array(
			"id" => $idBillet
		));
	}