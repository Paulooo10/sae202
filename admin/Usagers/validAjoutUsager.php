<?php
session_start();
$_SESSION['erreur'] = "";
include '../../fonctions.inc.php';
verifAdmin();

if (!isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['mail'], $_POST['motdepasse'], $_POST['ville'], $_POST['tel']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['pseudo']) || empty($_POST['mail']) || empty($_POST['motdepasse']) || empty($_POST['ville']) || empty($_POST['tel'])){
    $_SESSION['erreur'] .= "Veuillez remplir tous les champs <br>";
} else {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $motdepasse = $_POST['motdepasse'];
    $ville = $_POST['ville'];
    $tel = $_POST['tel'];
}

//ON VERIFIE LA CHECKBOX ADMIN
if(!isset($_POST['admin']) || $_POST['admin'] == "" || $_POST['admin'] == 0) {
    $admin = 0;
} else {
    $admin = 1;
}

//ON VÉRIFIE QUE L'EMAIL EST VALIDE
verifMail($mail, 'ajouter.php');

//ON VÉRIFIE QUE LE PSEUDO N'EST PAS DÉJÀ PRIS
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = $db->prepare("SELECT * FROM utilisateur WHERE utilisateur_pseudo = ?");
$req->execute([$pseudo]);
$nbResult = $req->rowCount();
if ($nbResult > 0) {
    $_SESSION['erreur'] .= "Ce pseudo est déjà pris <br>";
    header('Location: ajouter.php');
    exit();
}

//ON VÉRIFIE QUE L'EMAIL N'EST PAS DÉJÀ PRIS
$req = $db->prepare("SELECT * FROM utilisateur WHERE utilisateur_mail = ?");
$req->execute([$mail]);
$nbResult = $req->rowCount();
if ($nbResult > 0) {
    $_SESSION['erreur'] .= "Cet email est déjà pris <br>";
    header('Location: ajouter.php');
    exit();
}

//ON VERIFIE QUE LE MOT DE PASSE FAIT PLUS DE 7 CARACTERES
if (strlen($motdepasse) < 8) {
    $_SESSION['erreur'] .= "Le mot de passe doit faire au moins 8 caractères <br>";
}

//ON VERIFIE LE NUMERO DE TELEPHONE
verifTel($tel, 'ajouter.php');

//ON VERIFIE QUE L'IMAGE N'EST PAS VIDE
if ($_FILES["photo"]["size"] == 0) {
    $nouvelleImage = "placeholder.png";
} else {
    //SI C'EST PAS VIDE, ON L'UPLOAD
    $nouvelleImage = uploadImage("photo", "ajouter.php");
}


if($_SESSION['erreur'] == "") {
    $_SESSION['erreur'] = "Inscription réussie";
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$nom = $db->quote($nom);
$prenom = $db->quote($prenom);
$pseudo = $db->quote($pseudo);
$mail = $db->quote($mail);
$motdepasse = $db->quote($motdepasse);
$ville = $db->quote($ville);
$tel = $db->quote($tel);

$req = $db->prepare("INSERT INTO utilisateur (utilisateur_nom, utilisateur_prenom, utilisateur_pseudo, utilisateur_mail, utilisateur_mdp, utilisateur_photo, utilisateur_ville, utilisateur_admin, utilisateur_tel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$req->execute([$nom, $prenom, $pseudo, $mail, $motdepasse, $nouvelleImage, $ville, $admin, $tel]);

header('Location: gestion.php');
}

?>
