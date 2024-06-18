<?php
session_start();
include '../../fonctions.inc.php';
$_SESSION['erreur'] = "";
verifAdmin();

$id = $_GET['id'];
verifAuteur($id, "gestion.php");


if($id == 0){
    $_SESSION['erreur'] = "Vous ne pouvez pas supprimer l'admin !";
    header ('Location: gestion.php');
    die();
}

$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$mabd->query('SET NAMES utf8;');

//ON SUPPRIME L'UTILISATEUR
$req = 'DELETE FROM utilisateur WHERE utilisateur_id='.$id.';';
$resultat = $mabd->query($req);


//ON SUPPRIME LES JARDINS, LES PARCELLES ET LES ANNONCES DE L'UTILISATEUR
$req = 'DELETE FROM jardin WHERE _utilisateur_id='.$id.';';  
$resultat = $mabd->query($req);

$req = 'DELETE FROM parcelles WHERE _parcelle_proprietaire_id='.$id.';';
$resultat = $mabd->query($req);

$req = 'UPDATE parcelles SET _parcelle_locataire_id = NULL WHERE _parcelle_locataire_id = '.$id.';';
$resultat = $mabd->query($req);

$req = 'DELETE FROM annonce WHERE _utilisateur_id='.$id.';';
$resultat = $mabd->query($req);

$_SESSION['erreur'] = "L'utilisateur et ses données ont bien été supprimés";


header('Location: gestion.php');

?>