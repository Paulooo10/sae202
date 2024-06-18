<?php
//A METTRE SUR TOUTES LES PAGES ADMIN
require('../header.php');
require('../fonctions.inc.php');
verifAdmin();
?>
<?php
$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$mabd->query('SET NAMES utf8;');

$req = "SELECT COUNT(jardin_id) as nbJardins FROM jardin";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
    $nbJardins = $value['nbJardins'];
}

//jardin avec le plus de parcelles
$req = "SELECT jardin_nom, jardin_nb_parcelles FROM jardin ORDER BY jardin_nb_parcelles DESC LIMIT 1";
$resultat = $mabd->query($req);
foreach ($resultat as $value) {
    $nom_plusdeparcelles = $value['jardin_nom'];
    $nb_plusdeparcelles = $value['jardin_nb_parcelles'];
}

//utilisateur qui loue le plus de parcelles
$req = "SELECT _parcelle_locataire_id, COUNT(parcelle_id) as nbParcelles FROM parcelles WHERE parcelle_etat = 1 GROUP BY _parcelle_locataire_id ORDER BY nbParcelles DESC LIMIT 1";
$resultat = $mabd->query($req);
$utilisateur_plusdeparcelles = 0;
$nb_plusdeparcellesuser = 0;
foreach ($resultat as $value) {
    $req = "SELECT utilisateur_pseudo FROM utilisateur WHERE utilisateur_id = ".$value['_parcelle_locataire_id'];
    $resultat2 = $mabd->query($req);
    foreach ($resultat2 as $value2) {
        $utilisateur_plusdeparcelles = $value2['utilisateur_pseudo'];
        $nb_plusdeparcellesuser = $value['nbParcelles'];
    }
}
?>

<section class="bg-white">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Statistiques du site :</h2>
    </div>

    <div class="mt-8 sm:mt-12">
      <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3 sm:divide-x sm:divide-gray-100">
        <div class="flex flex-col px-4 py-8 text-center">
          <dt class="order-last text-lg font-medium text-gray-500">Jardins enregistrés</dt>

          <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl"><?= $nbJardins ?></dd>
        </div>

        <div class="flex flex-col px-4 py-8 text-center">
          <dt class="order-last text-lg font-medium text-gray-500">Nombre de parcelles dans</dt>
          <dt class="order-last text-lg font-medium text-gray-500">"<?=$nom_plusdeparcelles?>"</dt>
          <dt class="order-last text-lg font-medium text-gray-500">qui détient donc le record de parcelles</dt>
          <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl"><?= $nb_plusdeparcelles ?></dd>
        </div>

        <div class="flex flex-col px-4 py-8 text-center">
        <dt class="order-last text-lg font-medium text-gray-500">Nombre de parcelles louées par</dt>
          <dt class="order-last text-lg font-medium text-gray-500">"<?=$utilisateur_plusdeparcelles?>"</dt>
          <dt class="order-last text-lg font-medium text-gray-500">qui détient donc le record de parcelles louées</dt>
          <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl"><?= $nb_plusdeparcellesuser ?></dd>
        </div>
      </dl>
    </div>
  </div>
</section>

<h2 class="text-3xl font-bold text-gray-900 sm:text-4xl text-center">Gestion des tables :</h2>
<div class="m-10 flex flex-row flex-wrap justify-center gap-5">
<a href="/admin/Jardins/gestion.php" class="">
    <div class="w-[150px] h-[150px] bg-[#d2d9d1] rounded-md drop-shadow-md flex flex-col justify-center items-center">
        <p class="font-bold text-2xl">Jardins</p>
    </div>
</a>
<a href="/admin/Annonces/gestion.php" class="">
    <div class="w-[150px] h-[150px] bg-[#d2d9d1] rounded-md drop-shadow-md flex flex-col justify-center items-center">
        <p class="font-bold text-2xl">Annonces</p>
    </div>
</a>
<a href="/admin/Usagers/gestion.php" class="">
    <div class="w-[150px] h-[150px] bg-[#d2d9d1] rounded-md drop-shadow-md flex flex-col justify-center items-center">
        <p class="font-bold text-2xl">Usagers</p>
    </div>
</a>
<a href="/admin/Parcelles/gestion.php" class="">
    <div class="w-[150px] h-[150px] bg-[#d2d9d1] rounded-md drop-shadow-md flex flex-col justify-center items-center">
        <p class="font-bold text-2xl">Parcelles</p>
    </div>
</a>
</div>


<?php
include '../footer.php';
?>