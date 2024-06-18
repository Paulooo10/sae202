<?php
session_start();
include '../../fonctions.inc.php';
verifAdmin();
$_SESSION['erreur'] = "";

$jardin = $_POST['jardin'];
$proprietaire = $_POST['proprietaire'];
$nombre = $_POST['nombre'];

//ON VERIFIE SI LES ID DES MENUS DEROULANT EXISTENT DANS LA BDD
verifAuteur($jardin, "ajouter.php");
verifAuteur($proprietaire, "ajouter.php");

//ON VERIFIE SI LE PROPRIETAIRE DE LA PARCELLE EST BIEN LE PROPRIETAIRE DU JARDIN
verifProprio($jardin, $proprietaire);

if($_SESSION['erreur'] == ""){
  //AJOUT DE LA PARCELLE
  $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
  $jardin = $mabd->quote($jardin);
  $proprietaire = $mabd->quote($proprietaire);
  $nombre = $mabd->quote($nombre);
  
$mabd->query('SET NAMES utf8;');
$req = "INSERT INTO parcelles (parcelle_etat, _parcelle_locataire_id, _parcelle_proprietaire_id, _parcelle_jardin_id) VALUES ('0', NULL, $proprietaire, $jardin)";
for ($i = 0; $i < $nombre; $i++) {
  $mabd->query($req);
}
}


header('Location: gestion.php');

?>