 <?php

include_once('../modele/commentaires.php');

session_start();

$actions = array(
	'post',
	'supprimer'
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
	$auteur = $_SESSION['pseudo'];
	$commentaire = $_POST['commentaire'];
	$idBillet = $_POST['idBillet'];
	var_dump($idBillet);

	insertComment($auteur, $commentaire, $idBillet);

	header('Location: billet2.php?action=detail&id_billet=' . $_POST['idBillet']);
}

function supprimerAction()
{
	$idCommentaire = $_GET['idCommentaire'];
	$idBillet = $_GET['idBillet'];

	delComment($idCommentaire);

	header('Location: billet2.php?action=detail&id_billet=' . $idBillet);
}