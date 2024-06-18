<?php
session_start();
$id_annonce = $_GET['id_annonce']; //ID DE L'ANNONCE À MODIFIER
$_SESSION['erreur'] = "";
include '../fonctions.inc.php';


//VERIFICATION DES CHAMPS 
if (!isset($_POST['nom']) || !isset($_POST['type']) || !isset($_POST['description']) || !isset($_POST['date']) || empty($_POST['nom']) || empty($_POST['type']) || empty($_POST['description']) || empty($_POST['date'])) {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs obligatoires";
    header('Location: ../index.php');
    die();
}
$nom = $_POST['nom'];
$type = $_POST['type'];
$description = $_POST['description'];
$date = $_POST['date'];
$id = $_POST['id_admin'];

//VERIFICATION DES TYPES
if ($type != "don" && $type != "jardin" && $type != "outil") {
    $_SESSION['erreur'] .= "Type d'annonce non reconnu <br>";
    header('Location: ../index.php');
    exit();
}

//UPLOAD DE L'IMAGE
//On la met en "secondaire" car cest pas grave si y'en a aucune d'uploadé, on utilisera celle qui était déjà là
$page = "../index.php";
$nouvelleImage = ajoutImageSecondaire("photo", $page);

//utilisation de l'image de base si on en change pas
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM annonce WHERE annonce_id = $id_annonce";
$reponse = $db->query($req);
foreach ($reponse as $value) {
    if ($nouvelleImage == "") {
        $nouvelleImage = $value['annonce_photo'];
    }
}

$date = date("Y-m-d", strtotime($date)); //date de la modification


if ($_SESSION['erreur'] == "") {
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');

    $date = $db->quote($date);
    $nouvelleImage = $db->quote($nouvelleImage);
    $nom = $db->quote($nom);
    $type = $db->quote($type);
    $description = $db->quote($description);

    $req = "UPDATE annonce SET annonce_photo = $nouvelleImage, annonce_nom = $nom, annonce_type_demande = $type, annonce_description = $description, annonce_date_publi = $date, _utilisateur_id = $id WHERE annonce_id = $id_annonce";

    $db->exec($req);
    $_SESSION['erreur'] = "Annonce modifiée avec succès";
    header('Location: ../index.php');
    exit();
}

?>