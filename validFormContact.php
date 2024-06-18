<?php
session_start();
$_SESSION['erreur']='';
include 'fonctions.inc.php';

$affichage_retour = '';	
$erreurs=0;

//VERIFICATION DE L'EMAIL
if (!empty($_POST['mail'])) {
  	if (filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)) {
      $email=$_POST['mail'];
    } else {
    $affichage_retour .='Adresse mail incorrecte<br>';
    $erreurs++;
    }       
} else {
    $affichage_retour .='Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}

//VERIFICATION DU CHAMP TYPE
if(empty($_POST['type'])){
    $affichage_retour .='pas de type <br>';
    $erreurs++;
}

//VERIFICATION QUE LE FORMULAIRE NE SOIT PAS VIDE
if (count($_POST)==0) {
    $affichage_retour .='Aucun champ a été rempli <br>';
    $erreurs++;
} 


if ($erreurs == 0) {
    $email=$_POST['mail'];
    $type=$_POST['type'];
    $pseudo = $_POST['pseudo'];
    $id = $_POST['id'];
    $message = $_POST['message'];

    if($pseudo == "Invité"){
        $pseudo = "cher utilisateur"; // ce sera ça qui s'affichera dans le mail si l'utilisateur n'était pas connecté au moment de l'envoi
    }


    if($id == "000"){
        $id = "visiteur"; // ce sera ça qui s'affichera dans l'objet du mail pour que l'admin sache que l'utilisateur n'était pas un utilisateur connecté
    }

    $subject = '';
    if($type == "bug"){
        $subject='SAE202 : Signalement de bug de '.$pseudo.' - ID :'.$id;
    } elseif ($type == "probleme"){
        $subject='SAE202 : Signalement de problème de '.$pseudo.' - ID :'.$id;
    } elseif ($type == "sugggestion"){
        $subject='SAE202 : Suggestion de '.$pseudo.' - ID :'.$id;
    } else {
        $subject='SAE202 : Message de type autre de : '.$pseudo.' - ID :'.$id;
    }
    $headers['From']=$email;							
    $headers['Reply-to']=$email;						
    $headers['X-Mailer']='PHP/'.phpversion();			
    $headers['MIME-Version'] = '1.0';
    $headers['content-type'] = 'text/html; charset=utf-8';

    //PREMIER MAIL À L'ADMIN
    $email_dest="mmi23c12@mmi-troyes.fr";   
    //Envoi du mail de contact)
    if (mail($email_dest,$subject,$message,$headers)) {
    $erreurs=0;
    } else {
    $affichage_retour .='Echec de l\'envoi du message à l\'admin <br>';
    $erreurs++;
    }
    
    //MAIL DE CONFIRMATION À L'UTILISATEUR
    $headers2['From']='mmi23c12@mmi-troyes.fr';
    $headers2['Reply-to']='no-reply@mmi-troyes.fr';
    $headers2['X-Mailer']='PHP/'.phpversion();
    $headers2['MIME-Version'] = '1.0';
    $headers2['content-type'] = 'text/html; charset=utf-8';
    $message2 = '';

    if($type == "bug"){
        $message2 = "<h1 style='text-align:center;'>Merci pour votre message sur Univert!</h1><br>Bonjour ".ucfirst($pseudo).",\n\nMerci pour le bug que vous nous avez signalé.";
    } elseif ($type == "probleme"){
        $message2 = "<h1 style='text-align:center;'>Merci pour votre message sur Univert !</h1><br>Bonjour ".ucfirst($pseudo).",\n\nNous allons régler votre problème dans les plus brefs délais.";
    } elseif ($type == "suggestion"){
        $message2 = "<h1 style='text-align:center;'>Merci pour votre message sur Univert !</h1><br>Bonjour ".ucfirst($pseudo).",\n\nMerci pour votre suggestion.";
    } else {
        $message2 = "<h1 style='text-align:center;'>Merci pour votre message sur Univert!</h1><br>Bonjour ".ucfirst($pseudo).",\n\nNous avons bien reçu votre demande.";
    }

    if($type == "bug"){
        $subject2='Confirmation de signalement de bug - Univert';
    } elseif ($type == "probleme"){
        $subject2='Confirmation de signalement de probleme - Univert';
    } elseif ($type == "suggestion"){
        $subject2='Confirmation de suggestion - Univert';
    } else {
        $subject2='Confirmation de demande de contact - Univert';
    }

    if (mail($email,$subject2,$message2,$headers2)) {
    $erreurs=0;
    } else {
    $affichage_retour .='Echec de l\'envoi du message à l\'utilisateur <br>';
    $erreurs++;
    }
    
    if($erreurs == 0){
        if($type == "bug"){
            $affichage_retour="Merci pour votre signalement, vous devrez recevoir une confirmation sous peu";
        } elseif ($type == "probleme"){
            $affichage_retour="Merci pour votre signalement, vous devrez recevoir une confirmation sous peu";
        } elseif ($type == "suggestion"){
            $affichage_retour="Merci pour votre suggestion, vous devrez recevoir une confirmation sous peu";
        } else {
            $affichage_retour="Votre demande de contact à bien été envoyée, vous devrez recevoir une confirmation sous peu";
        }
    }
    }
    
    $_SESSION['erreur']=$affichage_retour;
    header('location: contact.php');


?>