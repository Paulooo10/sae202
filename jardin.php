<?php
    include 'header.php';
    include 'alertes.php';
    include 'fonctions.inc.php';
    //VERIFICATION D'ID
    if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
        $id = $_GET['id'];
    } else {
        $_SESSION['erreur'] = "vous n'avez pas sélectionné de jardin.";
        echo "<script> window.location.replace('jardins.php')</script>;";
        die();
    }

    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM jardin INNER JOIN utilisateur ON jardin._utilisateur_id = utilisateur.utilisateur_id WHERE jardin_id =".$id.";";
    $res = $db->query($req);
    foreach ($res as $row) {
        $nom = $row['jardin_nom'];
        $cp = $row['jardin_cp'];
        $ville = $row['jardin_ville'];
        $rue = $row['jardin_rue'];
        $photo1 = $row['jardin_photo1'];
        $photo2 = $row['jardin_photo2'];
        $photo3 = $row['jardin_photo3'];
        $surface = $row['jardin_surface'];
        $condition_partage = $row['jardin_condition_partage'];
        $description = $row['jardin_description'];
        $equipements = $row['jardin_equipements'];
        $entretien = $row['jardin_entretien'];
        $dateFromDB = $row['jardin_date_publication'];
        $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
        $formattedDate = $dateObj->format('d/m/Y');
        $point_eau = $row['jardin_point_eau'];
        $nb_parcelles = $row['jardin_nb_parcelles'];
        $utilisateur_pseudo = $row['utilisateur_pseudo'];
        $utilisateur_prenom = $row['utilisateur_prenom'];
        $utilisateur_nom = $row['utilisateur_nom'];
        $utilisateur_email = $row['utilisateur_mail'];
        $utilisateur_tel = $row['utilisateur_tel'];
        $utilisateur_ville = $row['utilisateur_ville'];
        $utilisateur_photo = $row['utilisateur_photo'];
        $utilisateur_id = $row['_utilisateur_id'];
        if($point_eau == 1){
            $point_eau = "Oui";
        } else {
            $point_eau = "Non";
        }
        if($equipements == 1){
            $equipements = "Oui";
        } else {
            $equipements = "Non";
        }
        if($entretien == 1){
            $entretien = "Oui";
        } else {
            $entretien = "Non";
        }
    }
?>
<main>
    <div id="scrollez" class="hidden w-full fixed bottom-0 bg-gradient-to-b from-transparent to-black text-white text-center z-[999] h-20 lg:flex lg:items-center lg:justify-center">
        <h1>Scrollez pour voir les informations sur le jardin </h1>
    </div>
<div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[400px] overflow-hidden rounded-lg md:h-[700px]">
         <!-- Item 1 -->
         <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="assets/Uploads/<?= $photo1 ?>" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        <!-- Item 2 -->
        <?php
        if(!empty($photo2)){
            echo "<div class='hidden duration-700 ease-in-out' data-carousel-item>";
            echo "<img src='assets/Uploads/$photo2' class='absolute block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2' alt=''>";
            echo "</div>";
        }
        if(!empty($photo3)){
            echo "<div class='hidden duration-700 ease-in-out' data-carousel-item>";
            echo "<img src='assets/Uploads/$photo3' class='absolute block w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2' alt=''>";
            echo "</div>";
        }
        ?>
        
    </div>
    <div class="flex justify-center items-center bg-[#12492e]">
        <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="text-gray-400 hover:text-gray-900  group-focus:text-gray-900">
                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="text-gray-400 hover:text-gray-900 group-focus:text-gray-900">
                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</div>
<hr>
<div class="flex flex-col bg-[#12492e] text-white sm:flex-row justify-between p-10">
    <div class="flex flex-col">
        <h1 class="font-bold text-xl"><?= $nom ?></h1>
        <h2><?= $ville ?> (<?= $cp ?>) <span>publié le <?= $formattedDate ?></span></h2>
        <div class="flex flex-row">

        </div>
    </div>
    <a href="#parcelles" class="bg-[#7AA843] text-center text-white p-2 pr-3 pl-3 mt-5 mr-4 rounded-md hover:bg-lime-700">Reserver une parcelle</a>
</div>
<hr>
<div id="specificites" class="flex flex-row justify-between p-10 px-5">
    <div id="spec" class="flex flex-row flex-start items-center gap-2">
    <svg class="size-6" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css">  .st0{fill:#12492e;}  </style> <g> <path class="st0" d="M256,0C194.5,82.109,82.125,199.438,82.125,338.094C82.125,434.141,159.969,512,256,512 s173.875-77.859,173.875-173.906C429.875,199.438,317.469,82.109,256,0z"></path> </g> </g></svg>
    <div class="flex flex-col">
    <p class="text-slate-700">Points d'eau</p>
    <p><?= $point_eau ?></p>
    </div>
    </div>

    <div id="spec" class="flex flex-row flex-start items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#12492e" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
</svg>
    <div class="flex flex-col">
    <p class="text-slate-700">Equipements <span class="hidden md:inline-block">à disposition</span></p>
    <p><?= $point_eau ?></p>
    </div>
    </div>

    <div id="spec" class="flex flex-row flex-start items-center gap-2">
    <img src="assets/images/clean.png" class="size-6">
    <div class="flex flex-col">
    <p class="text-slate-700">Entretien <span class="hidden md:inline-block">nécessaire</span></p>
    <p><?= $entretien ?></p>
    </div>
    </div>

    <div id="spec" class="flex flex-row flex-start items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#12492e" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
</svg>

    <div class="flex flex-col">
    <p class="text-slate-700">Surface <span class="hidden md:inline-block">du jardin</span></p>
    <p><?= $surface ?> m²</p>
    </div>
    </div>

</div>
<div class="bg-[#e5e5e5] p-10 pb-5">
    <h2 class="font-bold text-xl">Description de l'annonce :</h2>
    <p><?= $description ?></p>
</div>
<div class="flex flex-col p-10 bg-[#e5e5e5] text-black gap-5 sm:flex-row sm:justify-between sm:p-3 sm:items-center sm:px-10">
    <div class="flex flex-row items-center gap-3">
        <img src="/assets/Uploads/<?= $utilisateur_photo ?>" class="w-[40px] h-[40px] rounded-full">
        <a href="user.php?id=<?= $utilisateur_id ?>" class="uppercase underline font-bold"><?= $utilisateur_pseudo ?></a>
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
<hr>
<h3 id="parcelles" class="font-bold text-xl p-2 bg-[#d2d9d0] text-center pb-5">Parcelles disponibles</h3>
<table class="w-full text-center bg-[#d2d9d0]">
    <tr>
        <th>Parcelle N°</th>
        <th>Etat</th>
        <th>Surface</th>
        <th>Louer</th>
    </tr>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM parcelles WHERE _parcelle_jardin_id =".$id.";";
    $res = $db->query($req);
    foreach($res as $row){
        $numero = $row['parcelle_id'];
        $etat = $row['parcelle_etat'];
        if($etat == 0){
            $etat = "Disponible";
        } else {
            $etat = "Réservée";
        }
        echo "<tr class='leading-10 border border-black'>";
        echo "<td> $numero </td>";
        echo "<td> $etat </td>";
        echo "<td> Taille : $surface  m²</td>";
        echo "<td> <a href='Usager/louer.php?id=$numero' class='bg-[#7AA843] text-center text-white p-2 pr-3 pl-3 mt-5 lg:mt-0 lg:mr-0 rounded-md hover:bg-lime-700'>Reserver</a> </td>";
        echo "</tr>";
    }
    ?>
    
</table>

</main>

<?php
    include 'footer.php';
?>
