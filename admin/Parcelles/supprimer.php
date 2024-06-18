<?php
session_start();
include '../../fonctions.inc.php';
verifAdmin();
$_SESSION['erreur'] = "";

$id = $_GET['id'];

//ON VERIFIE QUE L'ID DE LA PARCELLE EXISTE BIEN DANS LA BDD
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User' , 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM parcelles WHERE parcelle_id = ".$id.";";
$resultat = $db->query($req);
$i = 0;
foreach($resultat as $value){
    $i += 1;
}
if ($i == 0){
    $_SESSION['erreur'] = "L'ID indiqué dans le menu déroulant n'existe pas dans la base de données.";
    header("location: gestion.php");
    die();
}

if($_SESSION['erreur'] == ""){
    //ON RECUPERE L'ID DU JARDIN DE LA PARCELLE
    $req = "SELECT _parcelle_jardin_id FROM parcelles WHERE parcelle_id = ".$id.";";
    $resultat = $db->query($req);
    foreach($resultat as $row) {
        $jardin = $row['_parcelle_jardin_id'];
    }

    //ON SUPPRIME LA PARCELLE
    $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $mabd->query('SET NAMES utf8;');
    $req = 'DELETE FROM parcelles WHERE parcelle_id='.$id.';';  
    $resultat = $mabd->query($req);

    //COMPTER LE NOMBRE DE PARCELLES DU JARDIN QUI CONTIENT LA PARCELLE SUPPRIMÉE ET LE METTRE À JOUR AU CAS OÙ ON A CHANGÉ LA PARCELLE DE JARDIN
    $req = "SELECT COUNT(_pa) as nb FROM parcelles WHERE _parcelle_jardin_id = $jardin";
    $resultat = $mabd->query($req);
    foreach($resultat as $row) {
    $nb = $row['nb'];
    }
    $req = "UPDATE jardin SET jardin_nb_parcelles = $nb WHERE jardin_id = $jardin";
    $mabd->query($req);

    $_SESSION['erreur'] = "La parcelle a bien été supprimée.";

}

header('Location: gestion.php');

?>