<?php
include 'header.php';
include 'alertes.php';

//TRAITEMENT DES FILTES
if(!isset($_GET['recherche']) && !isset($_GET['ville']) && !isset($_GET['eau']) && !isset($_GET['equipements']) && !isset($_GET['superficie'])){
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM jardin INNER JOIN utilisateur ON jardin._utilisateur_id = utilisateur.utilisateur_id";
} else {
    $recherche = $_GET['recherche'];
    $ville = $_GET['ville'];
    $eau = $_GET['eau'];
    $superficie = $_GET['superficie'];
    $equipements = $_GET['equipements'];

    //REQUETE SQL QUI VA RECUPERER LES JARDINS EN FONCTION DES FILTRES (LE CHAMP RECHERCHE EST UN LIKE EN SQL)
    $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
    $req = "SELECT * FROM jardin INNER JOIN utilisateur ON jardin._utilisateur_id = utilisateur.utilisateur_id WHERE 1=1";
    //SI LE CHAMP EST REMPLI, ON AJOUTE LA CONDITION A LA REQUETE (on prévoit tous les cas possibles ouais ouais)
    if (!empty($recherche)) {
        $req .= " AND jardin_nom LIKE '%" . $recherche . "%'";
    }
    if (!empty($ville)) {
        $req .= " AND jardin_ville LIKE '%" . $ville . "%'";
    }
    if (!empty($eau) || $eau == 0) {
        $req .= " AND jardin_point_eau = " . $eau;
    }
    if (!empty($equipements) || $equipements == 0) {
        $req .= " AND jardin_equipements = " . $equipements;
    }
    if (!empty($superficie)) {
        if($superficie == 1){
            $req .= " AND jardin_surface < 100";
        } else if($superficie == 2){
            $req .= " AND jardin_surface >= 100 AND jardin_surface < 500";
        } else if($superficie == 3){
            $req .= " AND jardin_surface >= 500 AND jardin_surface < 1000";
        } else if($superficie == 4){
            $req .= " AND jardin_surface >= 1000";
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
<form action="jardins.php" method="get" id="filtres" class="hidden lg:block lg:flex lg:items-center lg:justify-center lg:gap-5">
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
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
</svg>
<label for="ville" class="sr-only">Underline select</label>
  <input id="ville" name="ville" type="text" placeholder="Ville... " class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
  </input>
    </div>
    <div class="flex flex-row items-center gap-3">
    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-4 lg:size-6">
<g id="Environment / Water_Drop">
<path id="Vector" d="M16.0001 13.3848C16.0001 14.6088 15.526 15.7828 14.6821 16.6483C14.203 17.1397 13.6269 17.5091 13 17.7364M19 13.6923C19 7.11538 12 2 12 2C12 2 5 7.11538 5 13.6923C5 15.6304 5.7375 17.4893 7.05025 18.8598C8.36301 20.2302 10.1436 20.9994 12.0001 20.9994C13.8566 20.9994 15.637 20.2298 16.9497 18.8594C18.2625 17.4889 19 15.6304 19 13.6923Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</g>
</svg>
    <label for="eau" class="sr-only">Underline select</label>
  <select id="eau" name="eau" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
      <option value="">Indifférent</option>
      <option value="0">Pas de point d'eau</option>
      <option value="1">Point d'eau</option>
  </select>
    </div>
    <div class="flex flex-row items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
</svg>

    <label for="superficie" class="sr-only">Underline select</label>
  <select id="superficie" name="superficie" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
    <option value="">Indifférent</option>
        <option value="1">0-100m²</option>
        <option value="2">100-500m²</option>
        <option value="2">500-1000m²</option>
        <option value="3">1000m² et +</option>
  </select>
    </div>
    <div class="flex flex-row items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 lg:size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 0 1-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 1 1-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 0 1 6.336-4.486l-3.276 3.276a3.004 3.004 0 0 0 2.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008Z" />
</svg>


    <label for="equipements" class="sr-only">Underline select</label>
  <select id="equipements" name="equipements" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
  <option value="">Indifférent</option>
        <option value="0">Pas d'équipements</option>
        <option value="1">Équipements</option>
  </select>
    </div>




    <input type="submit" value="Rechercher" class="bg-[#7AA843] text-white p-2 pr-3 pl-3 mt-5 mr-4 lg:mt-0 lg:mr-0 rounded-md hover:bg-lime-700">
</form>
</div>

<hr>
<div class="max-w-[1000px] mx-auto">
<div class="jardins flex flex-col gap-5 mt-4 lg:flex-row lg:flex-wrap">
<?php
//echo $req;
 $resultat = $db->query($req);
 while($ligne = $resultat->fetch()){
     $dateFromDB = $ligne['jardin_date_publication'];
         $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
         $formattedDate = $dateObj->format('d/m/Y');

         echo '<div class="jardin relative rounded-md bg-white drop-shadow-md flex flex-row lg:min-w-[490px] lg:max-w-[490px]">
         <div class="bg-[url(\'assets/Uploads/'.$ligne['jardin_photo1'].'\')] bg-cover min-w-[200px] max-w-[200px] max-h-[200px] rounded-md sm:min-w-[300px] sm:min-h-[300px] sm:max-w-[300px] lg:min-w-[230px] lg:min-h-[232px]">
         </div>
         <div class="flex flex-col p-4">
             <h2 class="text-sm font-bold max-h-[40px] overflow-hidden ">'.$ligne['jardin_nom'].'</h2>
             <p class="text-sm text-justify mt-4 mb-2 max-h-[120px] overflow-hidden hidden lg:max-w-[230px] sm:block sm:min-h-[100px] md:h-[120px] lg:min-h-[60px] lg:max-h-[60px] ">'.$ligne['jardin_description'].'</p>
             <p class="text-sm">Déposée le <span class="font-bold">'.$formattedDate.'</span></p>
             <p class="text-sm">Par <a href="user.php?id='.$ligne['_utilisateur_id'].'" class="uppercase font-bold underline">'.$ligne['utilisateur_pseudo'].'</a></p>
             <div class="flex flex-row items-center mt-4 gap-2 lg:mt-2">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-5">
       <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
       <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
     </svg>
     <p class="text-sm sm:text-base lg:text-sm">'.$ligne['jardin_ville'].'</p>
             </div>
         </div>
         <div class="flex flex-row gap-2 absolute bottom-[15px] right-[10px] border-b-2 lg:bottom-[5px] items-center">
             <a href="jardin.php?id='.$ligne['jardin_id'].'" class="hidden sm:block lg:text-sm">Voir l\'annonce</a>
             <svg onclick="window.location.href=\'jardin.php?id='.$ligne['jardin_id'].'\'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 lg:size-4">
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






