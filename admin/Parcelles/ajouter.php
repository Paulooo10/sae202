<?php
include ('../../header.php');
?>


<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Ajouter une parcelle en tant qu'admin :</h1>
<form class="p-20" enctype="multipart/form-data" method="post" action="validAjoutParcelle.php">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    <div class="sm:col-span-3 pb-10">
          <label for="proprietaire" class="block text-sm font-medium leading-6 text-gray-900">Propriétaire de la parcelle</label>
          <div class="mt-2">
            <select id="proprietaire" name="proprietaire" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <?php
              $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
              $mabd->query('SET NAMES utf8;');
              $req = "SELECT * FROM utilisateur";
              $resultat = $mabd->query($req);
              foreach ($resultat as $value) {
                echo '<option value="'.$value['utilisateur_id'].'">'.$value['utilisateur_pseudo'].' - ID : '.$value['utilisateur_id'].'</option>';
              }
            ?>
            </select>
          </div>
        </div>
        <div class="sm:col-span-3 pb-10">
          <label for="nombre" class="block text-sm font-medium leading-6 text-gray-900">Nombre de parcelles</label>
          <div class="mt-2">
            <input type="number " id="nombre" name="nombre" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
            </input>
          </div>
        </div>
        <div class="sm:col-span-3 pb-10">
          <label for="jardin" class="block text-sm font-medium leading-6 text-gray-900">Jardin qui contient la parcelle</label>
          <div class="mt-2">
            <select id="jardin" name="jardin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <?php
              $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
              $mabd->query('SET NAMES utf8;');
              $req = "SELECT * FROM jardin INNER JOIN utilisateur ON jardin._utilisateur_id = utilisateur.utilisateur_id";
              $resultat2 = $mabd->query($req);
              foreach ($resultat2 as $value) {
                echo '<option value="'.$value['jardin_id'].'">'.$value['jardin_nom'].' - proprietaire : '.$value['utilisateur_pseudo'].'</option>';
              }
            ?>
            </select>
          </div>
        </div>
          </div>
    </div>

    
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="window.location.href = 'gestion.php'">Annuler</button>
    <button type="submit" class="rounded-md bg-lime-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Sauvegarder</button>
  </div>
</form>

<?php
include '../../footer.php';
?>
    
</body>
</html>