<?php
session_start();
include '../../fonctions.inc.php';
verifAdmin();
$_SESSION['erreur'] = "";


$id = $_GET['id'];
$jardin = $_POST['jardin'];
$proprietaire = $_POST['proprietaire'];

//ON VERIFIE QUE LES ID DES MENUS DÉROULANT EXISTENT BIEN DANS LA BDD
verifAuteur($jardin, "modifier.php?id=".$id);
verifAuteur($proprietaire, "modifier.php?id=".$id);

//ON VERIFIE QUE LE PROPRIÉTAIRE EST BIEN LE PROPRIÉTAIRE DU JARDIN
verifProprio($jardin, $proprietaire);


//ON VERIFIE SI ON A COCHÉ LA CASE DEMANDANT SI LA PARCELLE EST LOUÉE
if(!isset($_POST['louer']) || $_POST['louer'] == NULL){
  //SI NON,
  $locataire = NULL;
} else {
  //SI OUI, ON VERIFIE QUE LE LOCATAIRE EST BIEN CHOISI
  $locataire = $_POST['locataire'];
  if($locataire == "NULL"){
    $_SESSION['erreur'] = "Vous devez choisir un locataire.";
    header('Location: modifier.php?id='.$id);
  }
  //PUIS ON VERIFIE QU'IL EXISTE BIEN DANS LA BASE DE DONNÉES
  verifAuteur($locataire, "modifier.php?id=".$id);
}

if($_SESSION['erreur'] == ""){
  //ON MODIFIE LA PARCELLE
$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$mabd->query('SET NAMES utf8;');
$req = "UPDATE parcelles SET parcelle_etat = :louer, _parcelle_locataire_id = :locataire, _parcelle_proprietaire_id = :proprietaire, _parcelle_jardin_id = :jardin WHERE parcelle_id = :id";
$stmt = $mabd->prepare($req);
$stmt->execute([
    ':louer' => $louer,
    ':locataire' => $locataire,
    ':proprietaire' => $proprietaire,
    ':jardin' => $jardin,
    ':id' => $id
]);

//COMPTER LE NOMBRE DE PARCELLES DU JARDIN QUI CONTIENT LA PARCELLE MODIFIÉE ET LE METTRE À JOUR AU CAS OÙ ON A CHANGÉ LA PARCELLE DE JARDIN
$req = "SELECT COUNT(*) as nb FROM parcelles WHERE _parcelle_jardin_id = $jardin";
$resultat = $mabd->query($req);
foreach($resultat as $row) {
  $nb = $row['nb'];
}
$req = "UPDATE jardin SET jardin_nb_parcelles = $nb WHERE jardin_id = $jardin";
$mabd->query($req);

//MODIFIER LE NOMBRE DE PARCELLES DE TOUS LES JARDINS AU CAS OÙ ON A CHANGÉ LE PROPRIÉTAIRE DE LA PARCELLE
$req = "SELECT _parcelle_jardin_id, COUNT(*) as nb_parcelles FROM parcelles GROUP BY _parcelle_jardin_id";
$resultat = $mabd->query($req);
foreach($resultat as $row) {
  $jardin_id = $row['_parcelle_jardin_id'];
  $nb_parcelles = $row['nb_parcelles'];
  $req = "UPDATE jardin SET jardin_nb_parcelles = $nb_parcelles WHERE jardin_id = $jardin_id";
  $mabd->query($req);
}

$_SESSION['erreur'] = "La parcelle a bien été modifiée.";
}



header('Location: gestion.php');

?>