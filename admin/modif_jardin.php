<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <title>Modifier</title>
</head>
<body class="agence">
    <h1>Modifier un jardin</h1>
<?php
include ('../secret.php');
$num=$_GET['jardin_id'];
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;', USER, PASSWORD);
$mabd->query('SET NAMES utf8;');
$req = $mabd->prepare("SELECT * FROM jardins WHERE jardin_id = :id");
$req->bindParam(':id', $num);
$req->execute();
$skieur = $req->fetch(PDO::FETCH_ASSOC);
?>
<div id="formulaire">
<form method="post" action="valid_modif_jardin.php?jardin_id=<?php echo $num; ?>" enctype="multipart/form-data">
        <label for="new_name">Nouveau nom :</label>
        <input type="text" name="new_name" id="new_name" value="<?php echo $skieur['jardin_nom']; ?>" required><br>

        <label for="new_photo">Nouvelle photo :</label>
        <input type="text" name="new_photo" id="new_photo" value="<?php echo $skieur['jardin_photo']; ?>" required><br>

        <label for="new_lieu">Nouveau lieu : </label>
        <input type="text" name="new_lieu" id="new_lieu" value="<?php echo $skieur['jardin_lieu']; ?>" required><br>

        <label for="new_infos">Infos complémentaires : </label>
        <input type="text" name="new_infos" id="new_infos" value="<?php echo $skieur['jardin_info']; ?>" required><br>

        <button id="bouton" type="submit">Modifier</button>
</form>
</div>
<br>
<a href="backoffice.php"><button id="bouton">Retour</button></a>

</body>