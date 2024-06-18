<?php
session_start();
include '../../fonctions.inc.php';
$_SESSION['erreur'] = "";
verifAdmin();


$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$ville = $_POST['ville'];
$pseudo = $_POST['pseudo'];
$motdepasse = $_POST['motdepasse'];
$tel = $_POST['tel'];

//VERIFICATION DES CHAMPS
if (empty($prenom) || empty($nom) || empty($mail) || empty($ville) || empty($pseudo) || empty($motdepasse) || empty($tel) || !isset($prenom) || !isset($nom) || !isset($mail) || !isset($ville) || !isset($pseudo) || !isset($motdepasse) || !isset($tel)) {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
    header('Location: profil.php');
    die();
}

//ON VERIFIE LA CHECKBOX ADMIN
if(!isset($_POST['admin']) || $_POST['admin'] == "" || $_POST['admin'] == 0) {
    $admin = 0;
} else {
    $admin = 1;
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

$id = $_GET['id'];

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

//ON VERIFIE LE NUMÉRO DE TELEPHONE
verifTel($tel, 'gestion.php');


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

//ON VERIFIE QUE L'ADMIN DE BASE OU UN AUTRE UTILISATEUR N'EST PAS EN TRAIN DE SE RETIRER LES DROITS D'ADMIN À L'ADMIN
if($id == 0 && $admin == 1){
    $_SESSION['erreur'] = "Vous ne pouvez pas retirer les permissions d'admin à l'utilisateur admin";
    header ('Location: gestion.php');
}

//ON UPLOAD LA NOUVELLE IMAGE MAIS LA FONCTION RENVOIE "" SI AUCUNE IMAGE N'A ÉTÉ UPLOADÉE
$nouvelleImage = ajoutImageSecondaire("pdp", "gestion.php");

//SI AUCUNE IMAGE N'A ÉTÉ UPLOADÉE, ON GARDE L'ANCIENNE
if($nouvelleImage == ""){
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = 'SELECT * FROM utilisateur WHERE utilisateur_id = ' . $id;
    $reponse = $db->query($req);

    foreach ($reponse as $value) {
        $nouvelleImage = $value['utilisateur_photo'];
}
}

//ON UPDATE L'UTILISATEUR
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $nom = $db->quote($nom);
    $prenom = $db->quote($prenom);
    $pseudo = $db->quote($pseudo);
    $mail = $db->quote($mail);
    $motdepasse = $db->quote($motdepasse);
    $ville = $db->quote($ville);
    $nouvelleImage = $db->quote($nouvelleImage);
    $admin = $db->quote($admin);
    $id = $db->quote($id);
    $tel = $db->quote($tel);

    $req = $db->prepare("UPDATE utilisateur SET utilisateur_nom = ?, utilisateur_prenom = ?, utilisateur_pseudo = ?, utilisateur_mail = ?, utilisateur_mdp = ?, utilisateur_photo = ?, utilisateur_ville = ?, utilisateur_admin = ?, utilisateur_tel = ? WHERE utilisateur_id = ?");
    $req->execute([$nom, $prenom, $pseudo, $mail, $motdepasse, $nouvelleImage, $ville, $admin, $tel, $id]);

    //SI L'UTILISATEUR MODIFIÉ EST L'UTILISATEUR CONNECTÉ, ON MODIFIE AUSSI LES VARIABLES DE SESSION
    if($id == $_SESSION['id']){
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['mail'] = $mail;
        $_SESSION['mdp'] = $motdepasse;
        $_SESSION['photo'] = $nouvelleImage;
        $_SESSION['ville'] = $ville;
        $_SESSION['admin'] = $admin;
    }
    
    $_SESSION['erreur'] = "Utilisateur modifié avec succès";
    header('Location: gestion.php');

?>