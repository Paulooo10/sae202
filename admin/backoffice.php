<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Partie administrateur</title>
</head>
<style>
@media screen and (max-width: 480px) {
  nav {
        background-color: #333;
        padding: 10px;
        width: 506px;
        display: flex;
        justify-content: center;
    }

    nav li {
        display: inline;
    }

    nav a {
        color: white;
        text-decoration: none;
        padding: 10px;
        display: inline;
    }

    nav a:hover {
        background-color: #555;
        color: yellow;
        border-radius: 5px;
    }

    .active {
        color: #ffcc00;
        border-radius: 5px;
    }
  }
  </style>
<body class="agence">
    <?php require('../header.php'); ?>
    <h1>Partie administrateur</h1>
<?php
require('../secret.php');
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;', USER, PASSWORD);
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM jardins";
$resultat = $mabd->query($req);
?>

<table>
<tr> 
  <th>Nom :</th>
  <th>Photo :</th> 
  <th>Lieu :</th>
  <th>Infos supplémentaires :</th>
  <th>Actions</th>
</tr>

<?php
// Boucle sur les résultats de la requête
while ($value = $resultat->fetch(PDO::FETCH_ASSOC)) {
?>
<tr>
  <?php 
    echo '<td>'.'<h2>'.$value['jardin_nom'].'</h2>'.'</td>';   
    echo '<td>'.'<p style="text-align: center;">'.$value['jardin_photo'].'</h3>'.'</td>'; 
    echo '<td>'.'<p>'.$value['jardin_lieu'].'</p>'.'</td>'; 
    echo '<td>'.'<p>'.$value['jardin_info']. '</p>'.'</td>'; 
    echo '<td>'.'<p><a href="modif_jardin.php?jardin_id='.$value['jardin_id'].'">Modifier</a></p><br><p><a href="delete_jardin.php'.$value['jardin_id'].'">Supprimer</a></p>'.'</td>';
  ?>

</tr>
<?php
}
?>
    
</body>
</html>