<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
    <title>Modifier un joueur</title>
</head>
<body>
    <h1>Modification effectuée.</h1>
<body>
    <?php
    include('../secret.php');

    // Récupérer l'ID du jardin à modifier depuis l'URL
$nombre = $_GET['jardin_id'];

// Connexion à la base de données
$mabd = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=UTF8;', USER, PASSWORD);
$mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $newName = $_POST['new_name'];
    $newPhoto = $_POST['new_photo'];
    $newLieu = $_POST['new_lieu'];
    $newInfos = $_POST['new_infos'];

    // Préparer la requête de mise à jour
    $req = $mabd->prepare("UPDATE jardins SET jardin_nom = :nom, jardin_photo = :photo, jardin_lieu = :lieu, jardin_info = :info WHERE jardin_id = :id");

    // Liaison des valeurs aux paramètres de la requête préparée
    $req->bindParam(':nom', $newName);
    $req->bindParam(':photo', $newPhoto);
    $req->bindParam(':lieu', $newLieu);
    $req->bindParam(':info', $newInfos);
    $req->bindParam(':id', $nombre);

    // Exécution de la requête
    $req->execute();

    echo '<h2>Vous venez de modifier le jardin numéro ' . $nombre . '</h2>';
} else {
    // Si le formulaire n'a pas été soumis, récupérez les données actuelles du skieur
    $req = $mabd->prepare("SELECT * FROM jardins WHERE jardin_id = :id");
    $req->bindParam(':id', $nombre);
    $req->execute();
    $skieur = $req->fetch(PDO::FETCH_ASSOC);
}
    echo '<h2>Votre modification a bien été prise en compte.</h2>'.'<br>'
    ?>
    <a href="backoffice.php"><button id="bouton">Retour</button></a>
</body>
</html>