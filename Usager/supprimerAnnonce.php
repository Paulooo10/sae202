<?php
$id = $_GET['id'];

$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$mabd->query('SET NAMES utf8;');
$req = 'DELETE FROM annonce WHERE annonce_id='.$id.';';  
$resultat = $mabd->query($req);

header('Location: ../index.php');

?>