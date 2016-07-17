<?php

	function changerStatut($statut, $idMembre){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('UPDATE membres SET statut=:statut WHERE id=:id');

		$req->execute(array(
			'statut' => $statut,
			'id' => $idMembre
		));

		return $statut;
	} 

	function listMembres(){
		$membres = array();

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->query('SELECT * FROM membres');

		while($membre = $req->fetch()){
			$membres[] = $membre;
		}
		return $membres;
	}


	function getMembres($recherche){
	h:;	$membres = array();

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->query('SELECT * FROM membres where pseudo like "%'.$recherche.'%"');

		while($membre = $req->fetch(PDO::FETCH_ASSOC)){
			$membres[] = $membre;
		}
		return $membres;
	}


	function verifMembre($pseudo, $mdp){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo=:pseudo and pass=:mdp');

		$req->execute(array(
			'pseudo' => $pseudo,
			'mdp' => $mdp
		));

		return $req->fetch(PDO::FETCH_ASSOC);
	}

	function verifMdp($idMembre){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('SELECT pass FROM membres WHERE id=:id');
		
		$req->execute(array(
		'id' => $idMembre
		));

		return $req->fetch(PDO::FETCH_ASSOC);
	}

	function setNewPassword($mdp, $id){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('UPDATE membres SET pass=:newmdp WHERE id=:id');

		$req->execute(array(
		'newmdp' => $mdp,
		'id' => $id
		));
	}

	function insererMembre($pseudo, $mdp, $email){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :mdp, :email, NOW())');

		$req->execute(array(
			'pseudo' => $pseudo,
			'mdp' => $mdp,
			'email' => $email
		));
	}

	function verifpseudo($pseudo){

		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$req = $bdd->query('SELECT pseudo FROM membres');
		while($donnees = $req->fetch()){
			if($pseudo == $donnees['pseudo'] || empty($pseudo)){
				return 1;
			}
			else{
				return 0;
			}
		}

	}