<?php
include '../fonctions.inc.php';
session_start();
$_SESSION['erreur'] = "";
$id = $_SESSION['utilisateur_id'];

//ON ASSIGNE LESQ VARIABLMES
$nom = $_POST['nom'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$cp = $_POST['cp'];
$dimensions = $_POST['dimensions'];
$description = $_POST['description'];
$parcelles = $_POST['parcelles'];


//VERIFICATION QUE TOUS LES CHAMPS SOIENT REMPLIS
if(!isset($_POST['nom'], $_POST['rue'], $_POST['ville'], $_POST['cp'], $_POST['dimensions'], $_POST['description'], $_POST['parcelles']) || empty($_POST['nom']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['dimensions']) || empty($_POST['description']) || empty($_POST['parcelles'])){
    $_SESSION['erreur'] = "Veuillez remplir tous les champs";
    header('Location: ajouterJardin.php');
    die();
}

//VERIFICATION DES CHAMPS NUMERIQUES
if (!is_numeric($cp) || !is_numeric($dimensions) || !is_numeric($parcelles)) {
    $_SESSION['erreur'] = "Les champs Code Postal, Dimensions et Nombre de parcelles doivent être des nombres";
    header('Location: ajouterJardin.php');
    die();
}


//verification du code postal
if(strlen($cp) != 5) {
    $_SESSION['erreur'] = "Le code postal doit contenir 5 chiffres";
    header ('Location: ajouterJardin.php');
    die();
}

//VERIFICATION DES LES CHAMPS CHECKBOX
if (isset($_POST['equipements']) && $_POST['equipements'] == "1") {
    $equipements = 1;
} else {
    $equipements = 0;
}

if (isset($_POST['eau']) && $_POST['eau'] == "1") {
    $eau = 1;
} else {
    $eau = 0;
}

if (isset($_POST['recoltes']) && $_POST['recoltes'] == "1") {
    $recoltes = 1;
} else {
    $recoltes = 0;
}

if (isset($_POST['jardin']) && $_POST['jardin'] == "1") {
    $jardin = 1;
} else {
    $jardin = 0;
}

//ON VERIFIE QUE L'IMAGE PRINCIAPLE N'EST PAS VIDE
if ($_FILES["photo1"]["size"] == 0) {
    $_SESSION['erreur'] = "Veuillez ajouter une photo principale";
    header('Location: ajouterJardin.php');
    die();
} else {
    //SI C'EST PAS VIDE, ON L'UPLOAD
    $nouvelleImage = uploadImage("photo1", "ajouterJardin.php");
}

$nouvelleImage2 = ajoutImageSecondaire("photo2", "ajouterJardin.php");
$nouvelleImage3 = ajoutImageSecondaire("photo3", "ajouterJardin.php");

$date = date("Y-m-d"); //DATE DE PUBLICATION DE L'ANNONCE


if($_SESSION['erreur'] != "") {
    header('Location: ajouterJardin.php');
    die();
} else {


    //AJOUT DU JARDIN DANS LA TABLE JARDIN
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $nom = $db->quote($nom);
    $rue = $db->quote($rue);
    $ville = $db->quote($ville);
    $cp = (int)$cp;
    $dimensions = (int)$dimensions;
    $description = $db->quote($description);
    $equipements = (int)$equipements;
    $eau = (int)$eau;
    $recoltes = (int)$recoltes;
    $jardin = $db->quote($jardin);
    $parcelles = (int)$parcelles;
    $id = (int)$id;
    $date = $db->quote($date);

    $req = "INSERT INTO jardin (jardin_nom, jardin_cp, jardin_ville, jardin_rue, jardin_photo1, jardin_photo2, jardin_photo3, jardin_surface, jardin_condition_partage, jardin_description, jardin_equipements, jardin_entretien, jardin_date_publication, jardin_point_eau, jardin_nb_parcelles, _utilisateur_id) 
    VALUES ($nom, $cp, $ville, $rue, $nouvelleImage, $nouvelleImage2, $nouvelleImage3, $dimensions, $recoltes, $description, $equipements, $jardin, $date, $eau, $parcelles, $id)";
    echo $req;
    $resultat = $db->query($req);
    //SELECTION DE L'ID JARDIN AJOUTÉ POUR ENSUITE AJOUTER LES PARCELLES AVEC COMME JARDIN_ID CELUI DU JARDIN CRÉE
    $req = "SELECT jardin_id FROM jardin WHERE jardin_nom=$nom AND jardin_cp=$cp AND jardin_ville=$ville AND jardin_rue=$rue AND jardin_surface=$dimensions AND jardin_description=$description AND jardin_nb_parcelles=$parcelles AND _utilisateur_id=$id";
    $resultat = $db->query($req);
foreach($resultat as $row) {
    $jardin_id = $row['jardin_id'];
}

//AJOUT DU JARDIN DANS LES PARCELLES
for($i = 1; $i <= $parcelles; $i++) {
    $req = "INSERT INTO parcelles (parcelle_etat, _parcelle_proprietaire_id, _parcelle_jardin_id)
    VALUES (0, $id, $jardin_id)";
    $resultat = $db->query($req);
}


$_SESSION['erreur'] = "Jardin ajouté avec succès";
}


header('Location: ajouterJardin.php')
?>
