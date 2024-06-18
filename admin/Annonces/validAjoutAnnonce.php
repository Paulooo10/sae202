<?php
session_start();
$_SESSION['erreur'] = "";
include ('../../fonctions.inc.php');
verifAdmin(); //script qui verifie si l'admin est connecté


$id = $_POST['id_admin']; //ID DE L'AUTEUR CHOISI PAR L'ADMIN


//VERIFICATION DE L'ID
if (!isset($_POST['id_admin']) || !is_numeric($id)) {
    $_SESSION['erreur'] = "Erreur dans l'ID de l'auteur";
    header('Location: ajouter.php');
    die();
}
verifAuteur($id, "ajouter.php"); //script qui verifie si l'auteur existe dans la bdd


//VERIFICATION DES CHAMPS 
if (!isset($_POST['nom']) || !isset($_POST['type']) || !isset($_POST['description']) || empty($_POST['nom']) || empty($_POST['type']) || empty($_POST['description'])) {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs obligatoires";
    header('Location: ajouter.php');
    die();
}
$nom = $_POST['nom'];
$type = $_POST['type'];
$description = $_POST['description'];

//VERIFICATION DES TYPES
if ($type != "don" && $type != "jardin" && $type != "outil") {
    $_SESSION['erreur'] .= "Type d'annonce non reconnu <br>";
    header('Location: ajouter.php');
    exit();
}


$nouvelleImage = uploadImage("photo", "ajouter.php");

if ($_SESSION['erreur'] == "") {
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $date = $db->quote(date("Y-m-d"));
    $nouvelleImage = $db->quote($nouvelleImage);
    $nom = $db->quote($nom);
    $type = $db->quote($type);
    $description = $db->quote($description);

    $req = "INSERT INTO annonce (annonce_photo, annonce_nom, annonce_type_demande, annonce_description, annonce_date_publi, _utilisateur_id) 
        VALUES ($nouvelleImage, $nom, $type, $description, $date, $id)";
    $db->exec($req);
    $_SESSION['erreur'] = "Annonce ajoutée";
    header('Location: ajouter.php');
    exit();
}

?>