<?php
require '../header.php';

if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: ../index.php');
}

$pseudo = $_SESSION['utilisateur_pseudo'];
$mail = $_SESSION['utilisateur_mail'];
$nom = $_SESSION['utilisateur_nom'];
$prenom = $_SESSION['utilisateur_prenom'];
$photo = $_SESSION['utilisateur_photo'];
$motdepasse = $_SESSION['utilisateur_mdp'];
$id = $_SESSION['utilisateur_id'];
$ville = $_SESSION['utilisateur_ville'];
$tel = $_SESSION['utilisateur_tel'];
?>
<script>
  function showInformations() {
    document.getElementById('informations').classList.remove('hidden');
    document.getElementById('annonces').classList.add('hidden');
    document.getElementById('mesinfos').classList.add('text-[#7aa843]');
    document.getElementById('mesinfos').classList.remove('text-black');
    document.getElementById('mesannonces').classList.remove('text-[#7aa843]');
    document.getElementById('mesannonces').classList.add('text-black');

  }

  function showAnnonces() {
    document.getElementById('informations').classList.add('hidden');
    document.getElementById('annonces').classList.remove('hidden');
    document.getElementById('mesinfos').classList.remove('text-[#7aa843]');
    document.getElementById('mesinfos').classList.add('text-black');
    document.getElementById('mesannonces').classList.remove('text-black');
    document.getElementById('mesannonces').classList.add('text-[#7aa843]');
  }
</script>
<main class="flex flex-col md:flex-row ">
    <div class="flex flex-col items-center pt-5 md:w-[400px]">
        <img src="../assets/Uploads/<?= $photo ?>" class="max-w-[200px] max-h-[200px] mx-auto rounded-full">
        <button class="bg-[#0b2b1c] text-white px-4 py-2 rounded-md mt-4">Modifier</button>
        <h1 class="capitalize text-xl pt-5 text-center">Bonjour, <span class="font-bold"><?= $prenom.' '.$nom ?></span></h1>
        <div class="flex flex-row uppercase mt-4 gap-4 md:gap-0 md:flex-col md:w-[100%]">
            <button id="mesinfos" class="md:p-2 md:uppercase md:bg-[#e5e5e5]" onclick="showInformations();">Mes informations</button>
            <p class="md:hidden">|</p>
            <button id="mesannonces" class="md:p-2 md:uppercase md:bg-[#e5e5e5]" onclick="showAnnonces();">Mes annonces</button>
        </div>
    </div>
    <div id="informations" class="hidden md:w-[100%]">
    <div class="mx-10 mt-5 p-2 bg-[#d2d9d1]">
        <p>Informations générales</p>
    </div>
    <form action="validModifUsager.php" method="post" enctype="multipart/form-data" class="mt-8 grid grid-cols-6 gap-6 p-10 pt-0">
    <div class="col-span-6 sm:col-span-2">
        <label for="prenom" class="block text-sm font-medium text-gray-700">
            Prénom<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $prenom ?>" id="prenom" name="prenom"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-2">
        <label for="nom" class="block text-sm font-medium text-gray-700">
            Nom de famille<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $nom ?>" id="nom" name="nom"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

 <div class="col-span-6 sm:col-span-2">
        <label for="pseudo" class="block text-sm font-medium text-gray-700"> Pseudo<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $pseudo ?>" id="pseudo" name="pseudo"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <label for="mail" class="block text-sm font-medium text-gray-700"> Email<span class="text-red-500">*</span>
        </label>

        <input type="email" value="<?= $mail ?>" id="mail" name="mail"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

   

    <div class="col-span-6">
        <label for="ville" class="block text-sm font-medium text-gray-700"> Ville<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $ville ?>" id="ville" name="ville"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="tel" class="block text-sm font-medium text-gray-700"> Numero de tel<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $tel ?>" id="tel" name="tel"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="motdepasse" class="block text-sm font-medium text-gray-700">
            Mot de passe<span class="text-red-500">*</span>
        </label>

        <input type="password" value="<?= $motdepasse ?>" id="motdepasse" name="motdepasse"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div></form>
    <div class="col-span-6 m-10">
        <?php
            // if($photo == "" || $photo == null) {
            //     echo "";
            // } else {
            //     echo "<p class='block text-sm font-medium text-gray-700'>Photo de profil actuelle :</p>";
            //     echo "<img src='../../assets/Uploads/$photo' alt='Photo de profil' class='w-20 h-20 rounded-full'>";
            // }
        ?>
        <p class="block text-sm font-medium text-gray-700">Changer la photo de profil :</p>
        <label for="pdp"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">

            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="photo1" class="relative cursor-pointer rounded-md bg-white font-semibold text-lime-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-lime-600 focus-within:ring-offset-2 hover:text-lime-500">
                  <span>Téléchargez une image</span>
                  <input id="photo1" name="photo1" type="file" class="sr-only">
                </label>
                <p class="pl-1">ou bien cliquez-glissez</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG</p>
            </div>
          </div>
          </label>

        <div class="col-span-6 sm:flex sm:items-center sm:gap-4 mt-4" >
            </div>

            <input type="submit" value="Modifier le profil"
    class="inline-block shrink-0 rounded-md border border-[#0b2b1c] bg-[#0b2b1c] px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#0b2b1c] focus:outline-none focus:ring active:text-[#0b2b1c] hover:cursor-pointer">
</input>

    </form>
    </div>
    </div>


    <div id="annonces" class="hidden annonces mx-5 my-10 flex flex-col gap-5 items-center w-[100%]">
        <p class="text-sm text-justify">Univert prône la convivialité, la gratuité et le partage. Consultez vos transactions en toute simplicité, elles sont modérées pour garantir qu'elles respectent nos valeurs et l'esprit du site. Rejoignez-nous pour vivre une expérience de cojardinage enrichissante et communautaire !</p>
        <a href="ajouterAnnonce.php" class="p-4 bg-[#7aa843] rounded-md text-white w-[200px] text-center">Déposer une annonce</a>
        <div class="w-[100%]">
            <h2 class="font-bold mb-4">Mes annonce en cours</h2>
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
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <a href="../annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Voir</a>
             <a href="modifierAnnonce.php.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Modifier</a>
             <a href="supprimerAnnonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Supprimer</a>
             <svg class="sm:hidden size-5" onclick="window.location.href=\'../annonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
<svg  class="sm:hidden size-5" onclick="window.location.href=\'modifierAnnonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>
<svg   class="sm:hidden size-5" onclick="window.location.href=\'supprimerAnnonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#852a2a" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>

             </div>
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
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <a href="../jardin.php?id='.$ligne['jardin_id'].'" class="hidden sm:block lg:text-sm uppercase">Voir</a>
             <a href="modifierJardin.php?id='.$ligne['jardin_id'].'" class="hidden sm:block lg:text-sm uppercase">Modifier</a>
             <a href="supprimerJardin.php?id='.$ligne['jardin_id'].'" class="hidden sm:block lg:text-sm uppercase">Supprimer</a>
             <svg class="sm:hidden size-5" onclick="window.location.href=\'../jardin.php?id='.$ligne['jardin_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
<svg  class="sm:hidden size-5" onclick="window.location.href=\'modifierJardin.php?id='.$ligne['jardin_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>
<svg   class="sm:hidden size-5" onclick="window.location.href=\'supprimerJardin.php?id='.$ligne['jardin_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#852a2a" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>

             </div>
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
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <a href="../annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Voir</a>
             <a href="modifierAnnonce.php.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Modifier</a>
             <a href="supprimerAnnonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Supprimer</a>
             <svg class="sm:hidden size-5" onclick="window.location.href=\'../annonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
<svg  class="sm:hidden size-5" onclick="window.location.href=\'modifierAnnonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>
<svg   class="sm:hidden size-5" onclick="window.location.href=\'supprimerAnnonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#852a2a" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>

             </div>
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
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <a href="../annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Voir</a>
             <a href="modifierAnnonce.php.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Modifier</a>
             <a href="supprimerAnnonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm uppercase">Supprimer</a>
             <svg class="sm:hidden size-5" onclick="window.location.href=\'../annonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
<svg  class="sm:hidden size-5" onclick="window.location.href=\'modifierAnnonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>
<svg   class="sm:hidden size-5" onclick="window.location.href=\'supprimerAnnonce.php?id='.$ligne['annonce_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#852a2a" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>

             </div>
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
      <h2 class="text-lg font-medium">Mes parcelles louées</h2>

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
$req = "SELECT * FROM jardin INNER JOIN parcelles ON jardin.jardin_id = parcelles._parcelle_jardin_id INNER JOIN utilisateur ON parcelles._parcelle_proprietaire_id = utilisateur.utilisateur_id WHERE parcelles._parcelle_locataire_id = $id";
$resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
         echo '<div class="annonce relative rounded-md bg-white drop-shadow-md flex flex-row my-5">
         <div class="bg-black bg-[url(\'../assets/Uploads/'.$ligne['jardin_photo1'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden">'.$ligne['jardin_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-4 max-h-[120px] overflow-hidden hidden lg:max-w-[230px] sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] lg:mb-2  lg:mb-[0px] lg:mt-[0px]">'.$ligne['jardin_description'].'</p>
             <p class="text-sm">Parcelle n°<span class="font-bold">'.$ligne['parcelle_id'].'</span></p>
             <p class="text-sm">Propriété de <a href="../user.php?id='.$ligne['_parcelle_proprietaire_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <a href="../jardin.php?id='.$ligne['jardin_id'].'" class="hidden sm:block lg:text-sm uppercase">Voir</a>
             <a href="supprimerParcelle.php?id='.$ligne['parcelle_id'].'" class="hidden sm:block lg:text-sm uppercase">Supprimer</a>
             <svg class="sm:hidden size-5" onclick="window.location.href=\'../jardin.php?id='.$ligne['jardin_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#11492e" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
<svg   class="sm:hidden size-5" onclick="window.location.href=\'supprimerParcele.php?id='.$ligne['parcelle_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#852a2a" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>

             </div>
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
</div>
            

        </div>

    </div>
    </main>

  
    

</main>
<script>
  showInformations();
</script>

<?php
include '../footer.php';
?>
<!-- <h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Modifier votre profil</h1>
<p class="pl-20">Modification des informations de base. (La page manque encore de css et des autres fonctionnalités à venir)</p>
<form action="validModifUsager.php" method="post" enctype="multipart/form-data"
    class="mt-8 grid grid-cols-6 gap-6 pl-20">
    <div class="col-span-6 sm:col-span-3">
        <label for="prenom" class="block text-sm font-medium text-gray-700">
            Prénom<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $prenom ?>" id="prenom" name="prenom"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="nom" class="block text-sm font-medium text-gray-700">
            Nom de famille<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $nom ?>" id="nom" name="nom"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <label for="mail" class="block text-sm font-medium text-gray-700"> Email<span class="text-red-500">*</span>
        </label>

        <input type="email" value="<?= $mail ?>" id="mail" name="mail"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <label for="ville" class="block text-sm font-medium text-gray-700"> Ville<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $ville ?>" id="ville" name="ville"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="tel" class="block text-sm font-medium text-gray-700"> Numero de tel<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $tel ?>" id="tel" name="tel"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>


    <div class="col-span-6 sm:col-span-3">
        <label for="pseudo" class="block text-sm font-medium text-gray-700"> Pseudo<span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $pseudo ?>" id="pseudo" name="pseudo"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="motdepasse" class="block text-sm font-medium text-gray-700">
            Mot de passe<span class="text-red-500">*</span>
        </label>

        <input type="password" value="<?= $motdepasse ?>" id="motdepasse" name="motdepasse"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <p class="block text-sm font-medium text-gray-700">Photo de profil</p>
        <?php
            if($photo == "" || $photo == null) {
                echo "<p>Vous n'avez pas de photo de profil</p>";
            } else {
                echo "<p>Photo de profil actuelle :</p>";
                echo "<img src='../../assets/Uploads/$photo' alt='Photo de profil' class='w-20 h-20 rounded-full'>";
            }
        ?>
        <label for="pdp"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Cliquez pour
                        choisir</span> or glissez-déposez</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PNG ou JPG</p>
            </div>
            <input id="pdp" name="pdp" type="file" class="hidden" />
        </label>
    </div>

    <div class="col-span-6">
        <p class="text-sm text-gray-500">
            Les champs marqués d'un <span class="text-red-500">*</span> sont obligatoires.
        </p>
    </div>

    <div class="col-span-6 sm:flex sm:items-center sm:gap-4">

        <input type="submit" value="Modifier le profil"
            class="inline-block shrink-0 rounded-md border border-[#0b2b1c] bg-[#0b2b1c] px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#0b2b1c] focus:outline-none focus:ring active:text-[#0b2b1c] hover:cursor-pointer">
        </input>
    </div>
</form> -->