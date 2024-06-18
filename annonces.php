<?php
include 'header.php';

//TRAITEMENT DES FILTES
if(!isset($_GET['recherche']) && !isset($_GET['ville']) && !isset($_GET['eau']) && !isset($_GET['equipements']) && !isset($_GET['superficie'])){
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM annonce INNER JOIN utilisateur ON annonce._utilisateur_id = utilisateur.utilisateur_id";
} else {
    $recherche = $_GET['recherche'];
    $type = $_GET['type'];

    //REQUETE SQL QUI VA RECUPERER LES JARDINS EN FONCTION DES FILTRES (LE CHAMP RECHERCHE EST UN LIKE EN SQL)
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM annonce INNER JOIN utilisateur ON annonce._utilisateur_id = utilisateur.utilisateur_id WHERE 1=1";
    //SI LE CHAMP EST REMPLI, ON AJOUTE LA CONDITION A LA REQUETE (on prévoit tous les cas possibles ouais ouais)
    if (!empty($recherche)) {
        $req .= " AND annonce_nom LIKE '%" . $recherche . "%'";
    }
    if (!empty($type)) {
        if($type == 1){
            $req .= " AND annonce_type = 'jardin'";
        } else if($type == 2){
            $req .= " AND annonce_type ='don'";
        } else if($type == 3){
            $req .= " AND annonce_type = 'outil'";
        }
    }

}

?>
<main class="m-5 mb-5 lg:mb-5 lg:m-0 lg:mx-3">
<div class="p-10 pb-1 sm:p-5 md:p-2 lg:p-1">
<div class="flex flex-row justify-center border-2 p-5 rounded-md lg:hidden">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
</svg>
<button id="affichermasquer" onclick="document.getElementById('filtres').classList.toggle('hidden'); let thiselement = document.getElementById('affichermasquer'); if(thiselement.innerHTML == 'Afficher les filtres'){thiselement.innerHTML='Masquer les filtres';}else{thiselement.innerHTML='Afficher les filtres';}">Afficher les filtres</button>
</div></div>
<div class="m-6 mt-0 lg:m-3">
<form action="annonces.php" method="get" id="filtres" class="hidden lg:block lg:flex lg:items-center lg:justify-center lg:gap-5">
    <div class="flex flex-row items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
</svg>
<label for="recherche" class="sr-only">Underline select</label>
  <input id="recherche" name="recherche" type="text" placeholder="Que recherchez-vous ?" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
  </input>
    </div>
    <div class="flex flex-row items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
</svg>

    <label for="type" class="sr-only">Underline select</label>
  <select id="type" name="type" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
    <option value="">Type...</option>
        <option value="1">Recherche de jardin</option>
        <option value="2">Don de recoltes</option>
        <option value="2">Don d'outil</option>
  </select>
    </div>




    <input type="submit" value="Rechercher" class="bg-[#7AA843] text-white p-2 pr-3 pl-3 mt-5 mr-4 lg:mt-0 lg:mr-0 rounded-md hover:bg-lime-700">
</form>
</div>

<hr>
<div class="max-w-[1000px] mx-auto">
<div class="annonces flex flex-col gap-5 mt-4 lg:flex-row lg:flex-wrap">
<?php
//echo $req;
 $resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
     $dateFromDB = $ligne['annonce_date_publi'];
         $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
         $formattedDate = $dateObj->format('d/m/Y');
         $typeuh = $ligne['annonce_type_demande'];
         if($typeuh == "jardin"){
             $typeuh = "Recherche de jardin";
         } else if($typeuh == "don"){
             $typeuh = "Don de récoltes";
         } else if($typeuh == "outil"){
             $typeuh = "Don d'outil";
         }

         echo '<div class="annonce relative rounded-md bg-white drop-shadow-md flex flex-row lg:min-w-[490px] lg:max-w-[490px]">
         <div class="bg-[url(\'assets/Uploads/'.$ligne['annonce_photo'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden">'.$ligne['annonce_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-4 max-h-[120px] overflow-hidden hidden lg:max-w-[230px] sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] lg:mb-2  lg:mb-[0px] lg:mt-[0px]">'.$ligne['annonce_description'].'</p>
             <p class="text-sm">Déposée le <span class="font-bold">'.$formattedDate.'</span></p>
             <p class="text-sm">Par <a href="user.php?id='.$ligne['_utilisateur_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
  <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
</svg>

     <p class="text-sm sm:text-base lg:text-sm">'.$typeuh.'</p>
             </div>
         </div>
         <div class="flex flex-row gap-2 absolute bottom-[15px] right-[10px] border-b-2 lg:bottom-[5px] items-center">
             <a href="annonce.php?id='.$ligne['annonce_id'].'" class="hidden sm:block lg:text-sm">Voir l\'annonce</a>
             <svg xmlns="http://www.w3.org/2000/svg" onclick="window.location.href=\'annonce.php?id='.$ligne['annonce_id'].'\'" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-4">
       <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
     </svg>
     
         </div>
     </div>';
 
 }

?>
</div>
</div>
</main>

<?php
include 'footer.php';
?>






