<?php
session_start();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
} else {
    $_SESSION['erreur'] = "Aucun jardin selectionné !";
    header('Location: jardins.php');
    die();
}
if(!isset($_SESSION['utilisateur_id'])){
    $_SESSION['erreur'] = "Vous devez vous connecter pour louer un jardin !";
    header('Location: formConnexion.php');
    die();
}

$user_id = $_SESSION['utilisateur_id'];

//VÉRIFICATION DE LA DISPONIBILITÉ
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM parcelles WHERE parcelle_id = ".$id.";";
$res = $db->query($req);
foreach($res as $row){
    if($row['parcelle_etat'] == 1){
        $_SESSION['erreur'] = "Parcelle déjà louée !";
        header('Location: /jardins.php');
        die();
    }
}

if($_SESSION['erreur'] == ""){
//CHANGEMENT D'ÉTAT EN LOUÉ
$req = "UPDATE parcelles SET parcelle_etat = 1 WHERE parcelle_id = ".$id.";";
$res = $db->query($req);

//CHANGEMENT DE LOCATAIRE
$req = "UPDATE parcelles SET _parcelle_locataire_id = $user_id WHERE parcelle_id = ".$id.";";
$res = $db->query($req);

$_SESSION['erreur'] = "Parcelle louée avec succès !";
header('Location: /jardins.php');
}




?>