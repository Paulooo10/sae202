<?php
//A METTRE SUR TOUTES LES PAGES ADMIN
require('../../header.php');
if($_SESSION['utilisateur_admin'] != 1){
  header('Location: ../index.php');
}

$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$mabd->query('SET NAMES utf8;');
?>
<h1 class="text-center text-2xl font-bold p-10">Gestion des jardins :</h1>
<div class="flex flex-row justify-center gap-5 mx-auto pb-10">
    <a href="../gestion.php">
        <div class="w-[200px] bg-lime-700 p-3 text-center text-white rounded-md flex flex-row justify-center gap-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
            </svg>
            <p>Retour</p>
        </div>
    </a>
    <a href="ajouter.php">
        <div class="w-[200px] bg-lime-700 p-3 text-center text-white rounded-md flex flex-row justify-center gap-5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            <p>Ajouter un jardin</p>
        </div>
    </a>
</div>






<?php
$req = "SELECT * FROM jardin";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
  $dateFromDB = $value['jardin_date_publication'];
  $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
  $formattedDate = $dateObj->format('d/m/Y');

        echo '<div class="flex flex-col bg-white drop-shadow-md w-[100%] m-5 p-10">
  <h1 class="text-center text-2xl font-bold">Jardin n°'.$value['jardin_id'].' - '.$value['jardin_nom'].'</h1>
  <p><span class="font-bold">Code postal : </span>'.$value['jardin_cp'].'</p>
  <p><span class="font-bold">Ville : </span>'.$value['jardin_ville'].'</p>
  <p><span class="font-bold">Rue : </span>'.$value['jardin_rue'].'</p>
  <p><span class="font-bold">Photo 1 : </span> '.$value['jardin_photo1'].'</p>
  <p><span class="font-bold">Photo 2 : </span>'.$value['jardin_photo2'].' </p>
  <p><span class="font-bold">Photo 3 : </span>'.$value['jardin_photo3'].'</p>
  <p><span class="font-bold">Surface : </span>'.$value['jardin_surface'].'m</p>
  <p><span class="font-bold">Condition de partage : </span>'.$value['jardin_condition_partage'].'</p>
  <p><span class="font-bold">Description : </span>'.$value['jardin_description'].'</p>
  <p><span class="font-bold">Equipements : </span>'.$value['jardin_equipements'].'</p>
  <p><span class="font-bold">Point d\'eau : </span>'.$value['jardin_point_eau'].'</p>
  <p><span class="font-bold">Nombre de parcelles : </span>'.$value['jardin_nb_parcelles'].'</p>
    <p><span class="font-bold">Date de publication : </span>'.$formattedDate.'</p>
  <p><span class="font-bold">ID proprietaire : </span>'.$value['_utilisateur_id'].'</p>
  <div class="flex flex-row justify-center gap-5 mx-auto">
  <a href="modifier.php?id='.$value['jardin_id'].'">
<div class="w-[200px] bg-lime-700 p-3 text-center text-white rounded-md flex flex-row justify-center gap-5">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
</svg>
<p>Modifier</p>
</div>
</a>
<a href="supprimer.php?id='.$value['jardin_id'].'">
<div class="w-[200px] bg-red-700 p-3 text-center text-white rounded-md flex flex-row justify-center gap-5">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
</svg>
<p>Supprimer</p>
</div>
</a>
</div>
</div>';

}
echo '</table>';


?>

<?php
include '../../footer.php';
?>