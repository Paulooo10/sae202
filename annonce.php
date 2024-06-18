<?php
    include 'header.php';
    include 'alertes.php';
    include 'fonctions.inc.php';
    //VERIFICATION D'ID
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
    } else {
        $_SESSION['erreur'] = "vous n'avez pas sélectionné d'annonce.";
        echo "<script> window.location.replace('annonces.php')</script>;";
        die();
    }

    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM annonce INNER JOIN utilisateur ON annonce._utilisateur_id = utilisateur.utilisateur_id WHERE annonce_id =".$id.";";
    $res = $db->query($req);
    foreach ($res as $row) {
        $nom = $row['annonce_nom'];
        $photo = $row['annonce_photo'];
        $type_demande = $row['annonce_type_demande'];
        $description = $row['annonce_description'];
        $dateFromDB = $row['annonce_date_publi'];
        $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
        $formattedDate = $dateObj->format('d/m/Y');
        $utilisateur_pseudo = $row['utilisateur_pseudo'];
        $utilisateur_prenom = $row['utilisateur_prenom'];
        $utilisateur_nom = $row['utilisateur_nom'];
        $utilisateur_email = $row['utilisateur_mail'];
        $utilisateur_tel = $row['utilisateur_tel'];
        $utilisateur_ville = $row['utilisateur_ville'];
        $utilisateur_photo = $row['utilisateur_photo'];
        $utilisateur_id = $row['_utilisateur_id'];
        if($type_demande == "jardin"){
            $type_demande = "Recherche de jardin";
        } else if($type_demande == "don"){
            $type_demande = "Don de récoltes ou d'outil";
        } else if($type_demande == "outil"){
            $type_demande = "Recherche d'outil";
        }
    }

?>

<main>
    <div class="bg-black">
            <img src="assets/Uploads/<?= $photo ?>" class="w-full h-auto max-w-[600px] mx-auto object-cover">
    </div>

<div class="flex flex-col bg-[#12492e] text-white sm:flex-row justify-between p-10">
    <div class="flex flex-col">
        <h1 class="font-bold text-xl"><?= $nom ?></h1>
        <h2><?= $type_demande ?> - <span>Publié le <?= $formattedDate ?></span></h2>
        <div class="flex flex-row">
        </div>
    </div>
</div>
<hr>
<div class="bg-[#e5e5e5] p-10 pb-5">
    <h2 class="font-bold text-xl">Description de l'annonce :</h2>
    <p><?= $description ?></p>
</div>
<div class="flex flex-col p-10 bg-[#e5e5e5] text-black gap-5 sm:flex-row sm:justify-between sm:p-3 sm:items-center sm:px-10">
    <div class="flex flex-row items-center gap-3">
        <img src="/assets/Uploads/<?= $utilisateur_photo ?>" class="w-[40px] h-[40px] rounded-full">
        <a href="user.php?id=<? $utilisateur_id ?>" class="uppercase underline font-bold"><?= $utilisateur_pseudo ?></a>
    </div>
    <div class="flex flex-col gap-5 sm:flex-row">
        <div class="flex flex-row gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
</svg>
            <p><?= $utilisateur_tel ?></p>
        </div>
        <div class="flex flex-row gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
</svg>

            <p><?= $utilisateur_email ?></p>
        </div>
    </div>
</div>
</main>

<?php
    include 'footer.php';
?>
