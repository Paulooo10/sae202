<?php
session_start();
include('../fonctions.inc.php');
$_SESSION['erreur'] = "";

$id = $_GET['id'];


$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = 'SELECT * FROM jardin INNER JOIN utilisateur ON _utilisateur_id = utilisateur_id WHERE jardin_id='.$id.';';
$resultat = $mabd->query($req);
foreach($resultat as $ligne) {
    if($ligne['j_utilisateur_id'] != $_SESSION['id']) {
        $_SESSION['erreur'] = "Vous n'avez pas les droits pour supprimer ce jardin.";
        header('Location: profil.php');
        exit();
    }
}

//SUPPRESSION DES PARCELLES DU JARDIN
$req = 'DELETE FROM parcelles WHERE _parcelle_jardin_id='.$id.';';
$resultat = $mabd->query($req);

//SUPPRESSION DU JARDIN
$req = 'DELETE FROM jardin WHERE jardin_id='.$id.';';  
$resultat = $mabd->query($req);

$_SESSION['erreur'] = "Le jardin a bien été supprimé.";

header('Location: profil.php');

?>