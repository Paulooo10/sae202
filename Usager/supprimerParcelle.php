<?php
session_start();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
} else {
    $_SESSION['erreur'] = "Aucune parcelle selectionnée !";
    header('Location: profil.php');
    die();
}

$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM parcelles WHERE parcelle_id = ".$id.";";
$res = $db->query($req);
foreach($res as $row){
    if($row['_parcelle_locataire_id'] != $_SESSION['utilisateur_id']){
        $_SESSION['erreur'] = "Vous ne pouvez pas ne plus louer une parcelle qui ne vous appartient pas !";
        header('Location: profil.php');
        die();
    }
}

$req = "UPDATE parcelles SET parcelle_etat = 0 WHERE parcelle_id = ".$id.";";
$res = $db->query($req);

$req = "UPDATE parcelles SET _parcelle_locataire_id = NULL WHERE parcelle_id = ".$id.";";
$res = $db->query($req);

$_SESSION['erreur'] = "Parcelle libérée avec succès !";
header('Location: profil.php')
?>