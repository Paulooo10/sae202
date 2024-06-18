<?php
session_start();
include '../fonctions.inc.php';
$_SESSION['erreur'] = "";


$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$ville = $_POST['ville'];
$pseudo = $_POST['pseudo'];
$motdepasse = $_POST['motdepasse'];
$tel = $_POST['tel'];
$id = $_SESSION['utilisateur_id'];

$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');


//VERIFICATION DES CHAMPS
if (empty($prenom) || empty($nom) || empty($mail) || empty($ville) || empty($pseudo) || empty($motdepasse) || empty($tel) || !isset($prenom) || !isset($nom) || !isset($mail) || !isset($ville) || !isset($pseudo) || !isset($motdepasse) || !isset($tel)) {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
    header('Location: profil.php');
    die();
}

//VERIFICATION DU MAIL
if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['erreur'] = "Adresse mail invalide.";
    header('Location: profil.php');
    die();
}

//ON VERIFIE QUE LE MOT DE PASSE FAIT PLUS DE 7 CARACTERES
if (strlen($motdepasse) < 8) {
    $_SESSION['erreur'] .= "Le mot de passe doit faire au moins 8 caractères <br>";
}

//ON VÉRIFIE QUE L'EMAIL N'EST PAS LE MÊME QU'AVANT
$req = $db->prepare("SELECT * FROM utilisateur WHERE utilisateur_id = ?");
$req->execute([$id]);
$estCeQueCestLeMeme = false;
foreach ($req as $value) {
    if ($value['utilisateur_mail'] == $mail) {
        $estCeQueCestLeMeme = true; //ILS SONT LES MÊMES
    }
}
if ($estCeQueCestLeMeme == false) { //SI ILS SONT PAS LES MÊMES
    //ON VÉRIFIE QUE L'EMAIL N'EST PAS DÉJÀ PRIS PAR QUELQU'UN D'AUTRE
    $req = $db->prepare("SELECT * FROM utilisateur WHERE utilisateur_mail = ?");
    $req->execute([$mail]);
    $nbResult = $req->rowCount();
    if ($nbResult > 0) {
        $_SESSION['erreur'] .= "Cet email est déjà pris <br>";
        header('Location: formInscription.php');
        exit();
    }
}


//ON VÉRIFIE QUE LE PSEUDO N'EST PAS DÉJÀ PRIS
//ON VÉRIFIE QUE LE PSEUDO N'EST PAS LE MÊME QU'AVANT
$req = $db->prepare("SELECT * FROM utilisateur WHERE utilisateur_id = ?");
$req->execute([$id]);
$estCeQueCestLeMemePseudo = false;
foreach ($req as $value) {
    if ($value['utilisateur_pseudo'] == $pseudo) {
        $estCeQueCestLeMemePseudo = true; //ILS SONT LES MÊMES
    }
}
if ($estCeQueCestLeMemePseudo == false) { //SI ILS SONT PAS LES MÊMES
    //ON VÉRIFIE QUE LE PSEUDO N'EST PAS DÉJÀ PRIS PAR QUELQU'UN D'AUTRE
    $req = $db->prepare("SELECT * FROM utilisateur WHERE utilisateur_pseudo = ?");
    $req->execute([$pseudo]);
    $nbResult = $req->rowCount();
    if ($nbResult > 0) {
        $_SESSION['erreur'] .= "Ce pseudo est déjà pris <br>";
        header('Location: formInscription.php');
        exit();
    }
}

//ON VERIFIE LE NUMERO DE TEL
verifTel($tel, 'profil.php');

//ON UPLOAD LA NOUVELLE IMAGE MAIS LA FONCTION RENVOIE "" SI AUCUNE IMAGE N'A ÉTÉ UPLOADÉE
$nouvelleImage = ajoutImageSecondaire("pdp", "profil.php");

//SI AUCUNE IMAGE N'A ÉTÉ UPLOADÉE, ON GARDE L'ANCIENNE
if($nouvelleImage == ""){
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = 'SELECT * FROM utilisateur WHERE utilisateur_id = ' . $id;
    $reponse = $db->query($req);

    foreach ($reponse as $value) {
        $nouvelleImage = $value['utilisateur_photo'];
}
}

if($_SESSION['erreur'] != ""){

    //on modifie l'utilisateur dans la bdd
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $nom = $db->quote($nom);
    $prenom = $db->quote($prenom);
    $pseudo = $db->quote($pseudo);
    $mail = $db->quote($mail);
    $motdepasse = $db->quote($motdepasse);
    $ville = $db->quote($ville);
    $tel = $db->quote($tel);
    $nouvelleImage = $db->quote($nouvelleImage);
    $id = $db->quote($id);


$req = $db->prepare("UPDATE utilisateur SET utilisateur_nom = ?, utilisateur_prenom = ?, utilisateur_pseudo = ?, utilisateur_mail = ?, utilisateur_mdp = ?, utilisateur_photo = ?, utilisateur_ville = ?, utilisateur_tel = ? WHERE utilisateur_id = ?");
$req->execute([$nom, $prenom, $pseudo, $mail, $motdepasse, $nouvelleImage, $ville, $tel, $id]);

//et on réassign eles variables de session pour que les changements soient affichés au reload de la page
$_SESSION['utilisateur_nom'] = $nom;
$_SESSION['utilisateur_prenom'] = $prenom;
$_SESSION['utilisateur_pseudo'] = $pseudo;
$_SESSION['utilisateur_mail'] = $mail;
$_SESSION['utilisateur_ville'] = $ville;
$_SESSION['utilisateur_photo'] = $nouvelleImage;
$_SESSION['utilisateur_mdp'] = $motdepasse;

$_SESSION['erreur'] = "Vos modifications ont bien été prises en compte";

}


header('Location: profil.php');

?>