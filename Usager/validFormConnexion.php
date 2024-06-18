<?php
include '../fonctions.inc.php';
session_start();
$_SESSION['erreur'] = "";

//VRIFICATION DES CHAMPS
if(!isset($_POST['mail']) || !isset($_POST['motdepasse']) || $_POST['mail'] == "" || $_POST['motdepasse'] == ""){
    $_SESSION['erreur'] .= "Veuillez remplir tous les champs";
    header('Location: formConnexion.php');
    exit();
}

//LES CHAMPS SONT VÉRIFIÉS, ON ASSIGNE LES VARIABLES
$mail = $_POST['mail'];
$password = $_POST['motdepasse'];

//ON VÉRIFIE QUE L'EMAIL EST VALIDE
verifMail($mail, 'formConnexion.php');

//CONNEXION À LA BASE DE DONNÉES
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$mail = $db->quote($mail);
$password = $db->quote($password);
$req = "SELECT * FROM utilisateur WHERE utilisateur_mail = $mail AND utilisateur_mdp = $password";
$resultat = $db->query($req);

//SI ON TROUVE UN UTILISATEUR ON LE CONNECTE
$nbResult = $resultat->rowCount();
if ($nbResult == 1) {
    foreach ($resultat as $value) {
        echo "<br>";
        echo $value['utilisateur_pseudo'];
        $_SESSION['utilisateur_pseudo'] = $value['utilisateur_pseudo'];
        $_SESSION['utilisateur_mail'] = $value['utilisateur_mail'];
        $_SESSION['utilisateur_nom'] = $value['utilisateur_nom'];
        $_SESSION['utilisateur_prenom'] = $value['utilisateur_prenom'];
        $_SESSION['utilisateur_photo'] = $value['utilisateur_photo'];
        $_SESSION['utilisateur_mdp'] = $value['utilisateur_mdp'];
        $_SESSION['utilisateur_id'] = $value['utilisateur_id'];
        $_SESSION['utilisateur_admin'] = $value['utilisateur_admin'];
        $_SESSION['utilisateur_ville'] = $value['utilisateur_ville'];
        $_SESSION['utilisateur_tel'] = $value['utilisateur_tel'];
        header('Location: ../index.php');
    }
} else {
    $_SESSION['erreur'] = "Il n'y a pas d'utilisateur avec ces identifiants";
    header('Location: formConnexion.php');
    exit();
}
?>