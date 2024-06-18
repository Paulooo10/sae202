<?php
//ICI SE TROUVERONT TOUTES LES FONCTIONS QUE J'UTILISE RÉGULIÈREMENT DANS MES PAGES PHP DE GESTION NOTAMMENT QUAND J'UPLOAD UNE IMAGE, LES SCRIPTS SERONT MOINS LONGS

//VÉRIFICATION DE MAIL 
function verifMail($mail, $page){
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $_SESSION['erreur'] .= "Adresse mail invalide";
        header("location: $page");
        exit();
    }
}

//UPLOAD D'UNE IMAGE
function uploadImage($nomDuChamp, $page){
    $imageType = $_FILES[$nomDuChamp]['type'];
    if($imageType != "image/jpeg" && $imageType != "image/png" && $imageType != "image/jpg"){
        $_SESSION['erreur'] .= "Le format de l'image n'est pas valide. Seuls les formats jpeg, jpg et png sont acceptés";
        $_SESSION['erreur'] .= $imageType;
        header("location: $page");
        exit();
    } else {
        $ext = pathinfo($_FILES[$nomDuChamp]['name'], PATHINFO_EXTENSION);
        $nouvelleImage = uniqid().".".$ext;

        if(is_uploaded_file($_FILES[$nomDuChamp]['tmp_name'])){
            $destination = $_SERVER['DOCUMENT_ROOT'] . '/assets/Uploads/' . $nouvelleImage;
            if(!move_uploaded_file($_FILES[$nomDuChamp]['tmp_name'], $destination)){
                $_SESSION['erreur'].= "L'image n'a pas pu être sauvegardée sur le serveur";
                $_SESSION['erreur'] .= "Erreur PHP: " . $_FILES[$nomDuChamp]['error'] . "<br>";
                header("location: $page");
            } else {
                return $nouvelleImage;
            }
        } else {

            $_SESSION['erreur'].= "L'image n'a pas pu être uploadée";
            $_SESSION['erreur'] .= "Erreur PHP: " . $_FILES[$nomDuChamp]['error'] . "<br>";
            $_SESSION['erreur'] .= "Erreur PHP: " . $_FILES[$nomDuChamp]['tmp_name'] . "<br>";
            header("location: $page");
        }
    }
}
//UPLOAD D'UNE IMAGE QUAND ELLE N'EST PAS OBLIGATOIRE
function ajoutImageSecondaire($photo2, $page){
        if(isset($_FILES[$photo2]) && !empty($_FILES[$photo2]['name'])){
            return uploadImage($photo2, $page);
        } else {
            return "";
        }
    }

    //VERIFICATION SI C'EST BIEN UN ADMIN DE CONNECTÉ, POUR EVITER QUE TOUT LE MONDE PUISSE ACCEDER À LA PAGE DE GESTION
function verifAdmin(){
    if($_SESSION['utilisateur_admin'] != 1){
        $_SESSION['erreur'] = "Vous n'avez pas accès à cette page car vous n'êtes pas admin ou pas connecté.";
        $destination = $_SERVER['DOCUMENT_ROOT'] . '/index.php';
          header('Location: '.$destination);
            die();
        }
}

//VERIFICATION SI L'AUTEUR EXISTE BIEN DANS LA BASE DE DONNÉES
function verifAuteur($id, $pageHeader){
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User' , 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM utilisateur WHERE utilisateur_id = ".$id.";";
    $resultat = $db->query($req);
    $i = 0;
    foreach($resultat as $value){
        $i += 1;
    }
    if ($i == 0){
        $_SESSION['erreur'] = "L'ID indiqué dans le menu déroulant n'existe pas dans la base de données.";
        header("location: $pageHeader");
        die();
    }
}

//VERIFIER SI L'ID DU PROPRIO DU JARDIN CORRESPOND À L'ID DU PROPRIO DE LA PARCELLE (pas le locataire hein)
function verifProprio($id_jardin, $id_proprio){
    $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM jardin WHERE jardin_id = $id_jardin;";
    $resultat = $mabd->query($req);
    foreach ($resultat as $value) {
  if($value['_utilisateur_id'] != $id_proprio){
    $_SESSION['erreur'] = "Vous ne pouvez pas ajouter une parcelle avec un propriétaire différent de celui du jardin qui la contient.";
    header('Location: gestion.php');
    die();
  }
}
}

//VERIFICATION DU NUMERO DE TÉLÉPHONE
function verifTel($tel, $page){
    if(is_numeric($tel) && strlen($tel) == 10){
        return $tel;
    } else {
        $_SESSION['erreur'] = "Le numéro de téléphone n'est pas valide";
        header("location: $page");
        die();
    }
}
    


?>