<?php
session_start();
$_SESSION['erreur'] = "";
include '../fonctions.inc.php';


if (!isset($_POST['nom'], $_POST['type'], $_POST['description']) || empty($_POST['nom']) || empty($_POST['type']) || empty($_POST['description'])){
    $_SESSION['erreur'] .= "Veuillez remplir tous les champs <br>";
    header('Location: ajouterAnnonce.php');
    exit();
} else {
    $id = $_SESSION['utilisateur_id'];
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    //ON FAIT EN SORTE QUE LE TYPE SOIT UN DE CEUX ACCEPTÉS PAR LA BDD
    if($type != "don" && $type != "jardin" && $type != "outil") {
        $_SESSION['erreur'] .= "Type d'annonce non reconnu <br>";
        header('Location: ajouterAnnonce.php');
    exit();
    }
}


//uplaod de l'iamge
if($_FILES['photo']['size'] == 0){
    $_SESSION['erreur'] .= "Veuillez ajouter une photo <br>";
    header('Location: ajouterAnnonce.php');
    exit();
} else {
    $nouvelleImage = uploadImage("photo", "ajouterAnnonce.php");
}


if($_SESSION['erreur'] == "") {
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
        $date = $db->quote(date("Y-m-d"));
        $nouvelleImage = $db->quote($nouvelleImage);
        $nom = $db->quote($nom);
        $type = $db->quote($type);
        $description = $db->quote($description);
        $id = (int)$id;

        $req = "INSERT INTO annonce (annonce_photo, annonce_nom, annonce_type_demande, annonce_description, annonce_date_publi, _utilisateur_id) 
        VALUES ($nouvelleImage, $nom, $type, $description, $date, $id)";
        
        $db->exec($req);
        $_SESSION['erreur'] = "Annonce ajoutée avec succès";
        header('Location: ajouterAnnonce.php');
        exit();
}

?>