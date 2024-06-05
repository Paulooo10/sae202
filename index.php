<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Nom de l'agence</title>
</head>
<body class="agence">
<p><b>Important :</b>Ce site n'est pas encore opérationnel et est en cours de développement. <br>Les modifications suivront en fonction de l'avancée du projet.<br>
Nous vous remercions de votre compréhension.</p>

    <?php 
    require('header.php');
    ?>
    <h1>Nom de l'agence</h1>
    
    <?php
require('secret.php');
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;', USER, PASSWORD);
$mabd->query('SET NAMES utf8;');
$req = "SELECT * FROM jardins";
$resultat = $mabd->query($req);
?>


<!-- Merci de ne pas enlever cette phrase pour l'instant -->

<table>
<tr> 
  <th>Nom :</th>
  <th>Photo :</th> 
  <th>Lieu :</th>
  <th>Infos supplémentaires :</th>
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
    echo '<td>'.'<p>'.$value['jardin_info']. '</p>'; 
  ?>
</tr>
<?php
}
?>
</body>
</html>