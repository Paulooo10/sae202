<?php
session_start();
include('../../fonctions.inc.php');
$_SESSION['erreur'] = "";
verifAdmin();

$id = $_GET['id'];

$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');

//SUPPRESSION DES PARCELLES DU JARDIN
$req = 'DELETE FROM parcelles WHERE _parcelle_jardin_id='.$id.';';
$resultat = $mabd->query($req);

//SUPPRESSION DU JARDIN
$req = 'DELETE FROM jardin WHERE jardin_id='.$id.';';  
$resultat = $mabd->query($req);

$_SESSION['erreur'] = "Le jardin a bien été supprimé.";

header('Location: gestion.php');

?>