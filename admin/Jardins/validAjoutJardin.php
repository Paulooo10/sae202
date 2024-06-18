<?php
session_start();
include('../../fonctions.inc.php');
verifAdmin();

$_SESSION['erreur'] = "";
$id = $_POST['id_admin']; //ID DE L'AUTEUR CHOISI PAR L'ADMIN
$nom = $_POST['nom'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$cp = $_POST['cp'];
$dimensions = $_POST['dimensions'];
$description = $_POST['description'];
$parcelles = $_POST['parcelles'];

//VERIFICATION DE L'ID
if(!isset($_POST['id_admin']) || !is_numeric($id)) {
    $_SESSION['erreur'] = "Erreur dans l'ID de l'auteur";
    header ('Location: ajouter.php');
    die();
}
verifAuteur($id, "ajouter.php"); //script qui verifie si l'auteur existe dans la bdd

//VERFIICATION DES CHAMPS
if(!isset($_POST['nom']) || !isset($_POST['rue']) || !isset($_POST['ville']) || !isset($_POST['cp']) || !isset($_POST['dimensions']) || !isset($_POST['description']) || !isset($_POST['parcelles']) || empty($_POST['nom']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['dimensions']) || empty($_POST['description']) || empty($_POST['parcelles'])) {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs obligatoires";
    header ('Location: ajouter.php');
    die();
}

//VERIFICATION DES CHAMPS NUMÉRIQUES
if (!is_numeric($cp) || !is_numeric($dimensions) || !is_numeric($parcelles)) {
    $_SESSION['erreur'] = "Les champs Code Postal, Dimensions et Nombre de parcelles doivent être des nombres";
    header ('Location: ajouter.php');
    die();
}

//VERIFICATION DU CODE POSTAL
if(strlen($cp) != 5) {
    $_SESSION['erreur'] = "Le code postal doit contenir 5 chiffres";
    header ('Location: ajouter.php');
    die();
}

//VERIFICATION DES CHECKBOXES
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


//ON VERIFIE QUE L'IMAGE N'EST PAS VIDE
if ($_FILES["photo1"]["size"] == 0) {
    $_SESSION['erreur'] = "Veuillez ajouter une photo principale au jardin";
    header ('Location: ajouter.php');
    die();
} else {
    //SI C'EST PAS VIDE, ON L'UPLOAD
    $nouvelleImage = uploadImage("photo1", "ajouter.php");
}
$nouvelleImage2 = ajoutImageSecondaire("photo2", "ajouter.php");
$nouvelleImage3 = ajoutImageSecondaire("photo2", "ajouter.php");

$date = date("Y-m-d"); //date de publication de l'annonce

if($_SESSION['erreur'] != "") {
    header ('Location: ajouter.php');
    die();
} else {
    $_SESSION['erreur'] = "";
    //AJOUT DU JARDIN DANS LA TABLE JARDIN
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $nom = $db->quote($nom);
    $rue = $db->quote($rue);
    $description = $db->quote($description);
    $ville = $db->quote($ville);
    $cp = $db->quote($cp);
    $dimensions = $db->quote($dimensions);
    $parcelles = $db->quote($parcelles);
    $id = (int)$id;
    $equipements = $db->quote($equipements);
    $eau = $db->quote($eau);
    $recoltes = $db->quote($recoltes);
    $jardin = $db->quote($jardin);
    $date = $db->quote($date);
    $nouvelleImage = $db->quote($nouvelleImage);
    $nouvelleImage2 = $db->quote($nouvelleImage2);
    $nouvelleImage3 = $db->quote($nouvelleImage3);
    
    $req = "INSERT INTO jardin (jardin_nom, jardin_cp, jardin_ville, jardin_rue, jardin_photo1, jardin_photo2, jardin_photo3, jardin_surface, jardin_condition_partage, jardin_description, jardin_equipements, jardin_entretien, jardin_date_publication, jardin_point_eau, jardin_nb_parcelles, _utilisateur_id) VALUES ('$nom', '$cp', '$ville', '$rue', '$nouvelleImage', '$nouvelleImage2', '$nouvelleImage3', '$dimensions', '$recoltes', '$description', '$equipements', '$jardin', '$date', '$eau', '$parcelles', '$id')";
    $resultat = $db->query($req);

    //AJOUT DES PARCELLES

$req = "SELECT jardin_id FROM jardin WHERE jardin_nom=$nom AND jardin_cp=$cp AND jardin_ville=$ville AND jardin_rue=$rue AND jardin_surface=$dimensions AND jardin_description=$description AND jardin_nb_parcelles=$parcelles AND _utilisateur_id=$id";
$resultat = $db->query($req);
foreach($resultat as $row) {
    $jardin_id = $row['jardin_id'];
}
for($i = 1; $i <= $parcelles; $i++) {
    $req = "INSERT INTO parcelles (parcelle_etat, _parcelle_proprietaire_id, _parcelle_jardin_id)
    VALUES (0, $id, $jardin_id)";
    $resultat = $db->query($req);
}
$_SESSION['erreur'] = "Jardin ajouté avec succès";

}
header('Location: gestion.php')
?>
