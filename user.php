<?php
require 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location: index.php');
}
$id = $_GET['id'];
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM utilisateur WHERE utilisateur_id = $id";
$resultat = $db->query($req);
foreach($resultat as $ligne){
    $pseudo = $ligne['utilisateur_pseudo'];
    $mail = $ligne['utilisateur_mail'];
    $nom = $ligne['utilisateur_nom'];
    $prenom = $ligne['utilisateur_prenom'];
    $photo = $ligne['utilisateur_photo'];
    $motdepasse = $ligne['utilisateur_mdp'];
    $ville = $ligne['utilisateur_ville'];
    $tel = $ligne['utilisateur_tel'];

}

if($id == $_SESSION['utilisateur_id']){
    echo "<script> window.location.replace('Usager/profil.php')</script>;";
    die();
}

?>
<main class="flex flex-col">
    <div class="flex flex-col items-center pt-5">
        <img src="../assets/Uploads/<?= $photo ?>" class="max-w-[200px] max-h-[200px] mx-auto rounded-full border border-8 border-[#11492e]">
        <h1 class="text-xl pt-5 text-center">Bonjour, je suis <span class="font-bold capitalize"><?= $prenom.' '.$nom ?></span></h1>
    </div>

    <div>
        <h2 class="text-lg font-bold mt-5 text-center">Mes informations</h2>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-5 mt-5">
            <div class="flex flex-col items-center gap-2">
                <h3 class="text-lg font-bold">Pseudo</h3>
                <p class="text-sm"><?= $pseudo ?></p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <h3 class="text-lg font-bold">Mail</h3>
                <p class="text-sm"><?= $mail ?></p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <h3 class="text-lg font-bold">Ville</h3>
                <p class="text-sm"><?= $ville ?></p>
            </div>
            <div class="flex flex-col items-center gap-2">
                <h3 class="text-lg font-bold">Téléphone</h3>
                <p class="text-sm"><?= $tel ?></p>
            </div>
        </div>
    </div>


    <div id="annonces" class=" annonces my-10 flex flex-col gap-5 items-center w-[100%]">
        <div class="w-[100%]">
            <h2 class="font-bold mb-4 ml-4">Mes annonce en cours</h2>
            <div class="w-[100%] divide-y divide-gray-100 rounded-xl border border-gray-100 bg-white">
  <details class="group p-6 [&_summary::-webkit-details-marker]:hidden" open>
    <summary class="flex cursor-pointer items-center justify-between gap-1.5 text-gray-900">
      <h2 class="text-lg font-medium">Recherches de jardin</h2>

      <span class="relative size-5 shrink-0">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-100 group-open:opacity-0"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-0 group-open:opacity-100"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </span>
    </summary>

    <?php
//echo $req;
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM annonce INNER JOIN utilisateur ON annonce._utilisateur_id = utilisateur.utilisateur_id WHERE _utilisateur_id = $id AND annonce_type_demande = 'jardin'";
 $resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
     $dateFromDB = $ligne['annonce_date_publi'];
         $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
         $formattedDate = $dateObj->format('d/m/Y');
         $typeuh = $ligne['annonce_type_demande'];
         if($typeuh == "jardin"){
             $typeuh = "Recherche de jardin";
         } else if($typeuh == "don"){
             $typeuh = "Don";
         } else if($typeuh == "outil"){
             $typeuh = "Recherche d'outil";
         }

         echo '<div class="annonce relative rounded-md bg-white drop-shadow-md flex flex-row my-5">
         <div class="bg-black bg-[url(\'../assets/Uploads/'.$ligne['annonce_photo'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden">'.$ligne['annonce_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-4 max-h-[120px] overflow-hidden hidden lg:max-w-[230px] sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] lg:mb-2  lg:mb-[0px] lg:mt-[0px] lg:w-[100%]">'.$ligne['annonce_description'].'</p>
             <p class="text-sm">Déposée le <span class="font-bold">'.$formattedDate.'</span></p>
             <p class="text-sm">Par <a href="profil.php?id='.$ligne['_utilisateur_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
         </div>
         <div class="flex flex-row gap-2 absolute bottom-[15px] right-[10px] border-b-2 lg:bottom-[5px] items-center">
             <a href="../annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm">Voir l\'annonce</a>
             <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href=\'../annonce.php?id='.$ligne['annonce_id'].'\'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-4">
       <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
     </svg>
     
         </div>
     </div>';
 
 }

?>
  </details>
  <details class="group p-6 [&_summary::-webkit-details-marker]:hidden" open>
    <summary class="flex cursor-pointer items-center justify-between gap-1.5 text-gray-900">
      <h2 class="text-lg font-medium">Prêts de jardin</h2>

      <span class="relative size-5 shrink-0">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-100 group-open:opacity-0"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-0 group-open:opacity-100"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </span>
    </summary>

    <?php
//echo $req;
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM jardin INNER JOIN utilisateur ON jardin._utilisateur_id = utilisateur.utilisateur_id WHERE _utilisateur_id = $id";
 $resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
          $dateFromDB = $ligne['jardin_date_publication'];
         $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
         $formattedDate = $dateObj->format('d/m/Y');

         echo '<div class="annonce relative rounded-md bg-white drop-shadow-md flex flex-row my-5">
         <div class="bg-black bg-[url(\'../assets/Uploads/'.$ligne['jardin_photo1'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden">'.$ligne['jardin_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-4 max-h-[120px] overflow-hidden hidden sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] lg:mb-2  lg:mb-[0px] lg:mt-[0px] lg:w-[100%]">'.$ligne['jardin_description'].'</p>
             <p class="text-sm">Déposée le <span class="font-bold">'.$formattedDate.'</span></p>
             <p class="text-sm">Par <a href="profil.php?id='.$ligne['_utilisateur_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
             
         </div>
         <div class="flex flex-row gap-2 absolute bottom-[15px] right-[10px] border-b-2 lg:bottom-[5px] items-center">
             <a href="../jardin.php?id='.$ligne['jardin_id'].'" class="hidden sm:block lg:text-sm">Voir l\'annonce</a>
             <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href=\'../jardin.php?id='.$ligne['jardin_id'].'\'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-4">
       <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
     </svg>
     
         </div>
     </div>';
 
 }

?>
  </details>
  <details class="group p-6 [&_summary::-webkit-details-marker]:hidden" open>
    <summary class="flex cursor-pointer items-center justify-between gap-1.5 text-gray-900">
      <h2 class="text-lg font-medium">Recherches d'outils'</h2>

      <span class="relative size-5 shrink-0">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-100 group-open:opacity-0"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-0 group-open:opacity-100"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </span>
    </summary>
    <?php
//echo $req;
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM annonce INNER JOIN utilisateur ON annonce._utilisateur_id = utilisateur.utilisateur_id WHERE _utilisateur_id = $id AND annonce_type_demande = 'outil'";
 $resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
     $dateFromDB = $ligne['annonce_date_publi'];
         $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
         $formattedDate = $dateObj->format('d/m/Y');
         $typeuh = $ligne['annonce_type_demande'];
         if($typeuh == "jardin"){
             $typeuh = "Recherche de jardin";
         } else if($typeuh == "don"){
             $typeuh = "Don";
         } else if($typeuh == "outil"){
             $typeuh = "Recherche d'outil";
         }

         echo '<div class="annonce relative rounded-md bg-white drop-shadow-md flex flex-row my-5">
         <div class="bg-black bg-[url(\'../assets/Uploads/'.$ligne['annonce_photo'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden">'.$ligne['annonce_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-4 max-h-[120px] overflow-hidden hidden lg:max-w-[230px] sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] lg:mb-2  lg:mb-[0px] lg:mt-[0px]">'.$ligne['annonce_description'].'</p>
             <p class="text-sm">Déposée le <span class="font-bold">'.$formattedDate.'</span></p>
             <p class="text-sm">Par <a href="profil.php?id='.$ligne['_utilisateur_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
         </div>
         <div class="flex flex-row gap-2 absolute bottom-[15px] right-[10px] border-b-2 lg:bottom-[5px] items-center">
             <a href="../annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm">Voir l\'annonce</a>
             <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href=\'../annonce.php?id='.$ligne['annonce_id'].'\'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-4">
       <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
     </svg>
     
         </div>
     </div>';
 
 }

?>
  </details>
  <details class="group p-6 [&_summary::-webkit-details-marker]:hidden" open>
    <summary class="flex cursor-pointer items-center justify-between gap-1.5 text-gray-900">
      <h2 class="text-lg font-medium">Dons</h2>

      <span class="relative size-5 shrink-0">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-100 group-open:opacity-0"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="absolute inset-0 size-5 opacity-0 group-open:opacity-100"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
          stroke-width="2"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </span>
    </summary>

    <?php
//echo $req;
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM annonce INNER JOIN utilisateur ON annonce._utilisateur_id = utilisateur.utilisateur_id WHERE _utilisateur_id = $id AND annonce_type_demande = 'don'";
 $resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
     $dateFromDB = $ligne['annonce_date_publi'];
         $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
         $formattedDate = $dateObj->format('d/m/Y');
         $typeuh = $ligne['annonce_type_demande'];
         if($typeuh == "jardin"){
             $typeuh = "Recherche de jardin";
         } else if($typeuh == "don"){
             $typeuh = "Don";
         } else if($typeuh == "outil"){
             $typeuh = "Recherche d'outil";
         }

         echo '<div class="annonce relative rounded-md bg-white drop-shadow-md flex flex-row my-5">
         <div class="bg-black bg-[url(\'../assets/Uploads/'.$ligne['annonce_photo'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden">'.$ligne['annonce_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-4 max-h-[120px] overflow-hidden hidden lg:max-w-[230px] sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] lg:mb-2  lg:mb-[0px] lg:mt-[0px]">'.$ligne['annonce_description'].'</p>
             <p class="text-sm">Déposée le <span class="font-bold">'.$formattedDate.'</span></p>
             <p class="text-sm">Par <a href="profil.php?id='.$ligne['_utilisateur_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
         </div>
         <div class="flex flex-row gap-2 absolute bottom-[15px] right-[10px] border-b-2 lg:bottom-[5px] items-center">
             <a href="../annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm">Voir l\'annonce</a>
             <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href=\'../annonce.php?id='.$ligne['annonce_id'].'\'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-4">
       <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
     </svg>
     
         </div>
     </div>';
 
 }

?>
  </details>
</div>
            

        </div>

    </div>
    </main>

  
    

</main>

<?php
require 'footer.php';
?>
