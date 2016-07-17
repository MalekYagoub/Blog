<?php

	function listComments($idBillet){
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet=:id ORDER BY date_commentaire DESC');

		$req->execute(array(
			"id" => $idBillet
		));

		$commentaires = array();

		while($commentaire = $req->fetch(PDO::FETCH_ASSOC)){
			$commentaires[] = $commentaire;
		}

		return $commentaires;
	}

	function insertComment($auteur, $commentaire, $idBillet){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('INSERT INTO commentaires(auteur, commentaire, id_billet, date_commentaire) VALUES(:toto, :commentaire, :idBillet, NOW())');

		$req->execute(array(
			"toto" => $auteur,
			"commentaire" => $commentaire,
			"idBillet" => $idBillet
		));
	}

	function delComment($idCommentaire){
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('DELETE FROM commentaires WHERE id=:id');

		$req->execute(array(
			"id" => $idCommentaire
		));
	}