<?php
session_start();
include '../fonctions.inc.php';
$_SESSION['erreur'] = "";

$id_utilisateur_de_base = $_GET['id_utilisateur']; //ID DE L'AUTEUR QUI A CREE LE JARDIN À L'ORIGINE
$id = $_SESSION['utilisateur_id'];
$id_jardin = $_GET['id_jardin']; //ID DU JARDIN À MODIFIER

$nom = $_POST['nom'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$cp = $_POST['cp'];
$dimensions = $_POST['dimensions'];
$description = $_POST['description'];
$parcelles = $_POST['parcelles'];
$date =  $_POST['date'];

//VERFIICATION DES CHAMPS
if (!isset($_POST['nom']) || !isset($_POST['rue']) || !isset($_POST['ville']) || !isset($_POST['cp']) || !isset($_POST['dimensions']) || !isset($_POST['description']) || !isset($_POST['parcelles']) || empty($_POST['date']) || empty($_POST['nom']) || empty($_POST['rue']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['dimensions']) || empty($_POST['description']) || empty($_POST['parcelles'])) {
    $_SESSION['erreur'] = "Veuillez remplir tous les champs obligatoires";
    header("Location: modifierJardin.php?id=$id_jardin");
    die();
}

//VERIFICATION DES CHAMPS NUMÉRIQUES
if (!is_numeric($cp) || !is_numeric($dimensions) || !is_numeric($parcelles)) {
    $_SESSION['erreur'] = "Les champs Code Postal, Dimensions et Nombre de parcelles doivent être des nombres";
    header("Location: modifierJardin.php?id=$id_jardin");
    die();
}

//VERIFICATION DU CODE POSTAL
if (strlen($cp) != 5) {
    $_SESSION['erreur'] = "Le code postal doit contenir 5 chiffres";
    header("Location: modifierJardin.php?id=$id_jardin");
    die();
}

//VERIFICATION DES CHECKBOXES
if (isset($_POST['equipements']) && $_POST['equipements'] == "1") {
    $equipements = 1;
} else {
    $equipements = 0;
}

if (isset($_POST['eau']) && $_POST['eau'] == "1") {
    $eau = 1;
} else {
    $eau = 0;
}

if (isset($_POST['recoltes']) && $_POST['recoltes'] == "1") {
    $recoltes = 1;
} else {
    $recoltes = 0;
}

if (isset($_POST['jardin']) && $_POST['jardin'] == "1") {
    $jardin = 1;
} else {
    $jardin = 0;
}

//UPLOAD DES IMAGES
//on les mets toutes en "secondaires" car si elles ne sont pas changées, c'est pas grave, on reprend juste les anciennes
$nouvelleImage = ajoutImageSecondaire("photo1", "modifierJardin.php?id=$id_jardin");
$nouvelleImage2 = ajoutImageSecondaire("photo2", "modifierJardin.php?id=$id_jardin");
$nouvelleImage3 = ajoutImageSecondaire("photo3", "modifierJardin.php?id=$id_jardin");

$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');

$req = "SELECT * FROM jardin WHERE jardin_id = $id_jardin";
$reponse = $db->query($req);

foreach ($reponse as $value) {
    if ($nouvelleImage == "") {
        $nouvelleImage = $value['jardin_photo1'];
    }
    if ($nouvelleImage2 == "") {
        $nouvelleImage2 = $value['jardin_photo2'];
    }
    if ($nouvelleImage3 == "") {
        $nouvelleImage3 = $value['jardin_photo3'];
    }
}

$date = date("Y-m-d", strtotime($date)); //date de la modification

//MODIFICATION DU JARDIN
if ($_SESSION['erreur'] == "") {

    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $nom = $db->quote($nom);
$rue = $db->quote($rue);
$ville = $db->quote($ville);
$cp = $db->quote($cp);
$dimensions = $db->quote($dimensions);
$description = $db->quote($description);
$parcelles = (int)$parcelles;
$date = $db->quote($date);
$nouvelleImage = $db->quote($nouvelleImage);
$nouvelleImage2 = $db->quote($nouvelleImage2);
$nouvelleImage3 = $db->quote($nouvelleImage3);
$equipements = $db->quote($equipements);
$eau = $db->quote($eau);
$recoltes = $db->quote($recoltes);
$jardin = $db->quote($jardin);
$id = (int)$id;
$id_jardin = (int)$id_jardin;


    $req = "UPDATE jardin SET 
    jardin_nom = $nom,
    jardin_cp = $cp,
    jardin_ville = $ville,
    jardin_rue = $rue,
    jardin_photo1 = $nouvelleImage,
    jardin_photo2 = $nouvelleImage2,
    jardin_photo3 = $nouvelleImage3,
    jardin_surface = $dimensions,
    jardin_condition_partage = $recoltes,
    jardin_description = $description,
    jardin_equipements = $equipements,
    jardin_entretien = $jardin,
    jardin_date_publication = $date,
    jardin_point_eau = $eau,
    jardin_nb_parcelles = $parcelles,
    _utilisateur_id = $id
    WHERE jardin_id = $id_jardin";
    $resultat = $db->query($req);


    //ON RÉCUPÈRE L'ID DU JARDIN MODIFIÉ (au cas ou mysql a changé l'id du jardin)
    $req = "SELECT jardin_id FROM jardin WHERE jardin_nom=$nom AND jardin_cp=$cp AND jardin_ville=$ville AND jardin_rue=$rue AND jardin_surface=$dimensions AND jardin_description=$description AND jardin_nb_parcelles=$parcelles AND _utilisateur_id=$id";
    $resultat = $db->query($req);
    foreach ($resultat as $row) {
        $jardin_id = $row['jardin_id'];
    }

    //ON COMPTE LE NOMBRE DE PARCELLES QUI SONT DANS CE JARDIN
    //COMME CA ON PEUT CALCULER SI ON A MODIFIÉ LE NOMBRE DE PARCELLES
    $req = "SELECT COUNT(*) AS nb_parcelles FROM parcelles WHERE _parcelle_jardin_id = $jardin_id";
    $resultat = $db->query($req);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
    $nb_parcelles = $row['nb_parcelles'];


    //ON AJOUTE DES PARCELLES SI ON A AUGMENTÉ LE NOMBRE DE PARCELLES
    if ($nb_parcelles < $parcelles) {
        $diff = $parcelles - $nb_parcelles;
        for ($i = 0; $i < $diff; $i++) {
            $req = "INSERT INTO parcelles (_parcelle_jardin_id, _parcelle_proprietaire_id) VALUES ($jardin_id, $id)";
            $resultat = $db->query($req);
        }
    } elseif ($nb_parcelles > $parcelles) {
        //ON SUPPRIME DES PARCELLES SI ON A DIMINUÉ LE NOMBRE DE PARCELLES
        //ON COMMENCE PAR SUPPRIMER LES PARCELLES QUI ONT ÉTÉ CRÉÉES EN DERNIER
        //COMME ÇA ON A - DE CHANCES DE SUPPRIMER DES PARCELLES DÉJÀ LOUÉES
        $diff = $nb_parcelles - $parcelles;
        $req = "DELETE FROM parcelles WHERE _parcelle_jardin_id = $jardin_id ORDER BY parcelle_id DESC LIMIT $diff";
        $resultat = $db->query($req);
    }

    //APRÈS TOUT ÇA, ON MET À JOUR LE PROPRIÉTAIRE DE TOUTES LES PARCELLES DU JARDIN
    for ($i = 1; $i <= $parcelles; $i++) {
        $req = "UPDATE parcelles SET _parcelle_proprietaire_id = $id WHERE _parcelle_jardin_id = $jardin_id";
        $resultat = $db->query($req);
    }
}


if ($_SESSION['erreur'] == "") {
    $_SESSION['erreur'] = "Le jardin a bien été modifié, ainsi que ses parcelles.";
}

header('Location: profil.php')






    ?>