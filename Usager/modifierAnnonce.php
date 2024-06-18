<?php
include ('../../header.php');

$id = $_GET['id'];
$mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
              $mabd->query('SET NAMES utf8;');
                $req = "SELECT * FROM annonce WHERE annonce_id = $id";
                $resultat = $mabd->query($req);
                foreach ($resultat as $value) {
                    $photo = $value['annonce_photo'];
                    $nom = $value['annonce_nom'];
                    $description = $value['annonce_description'];
                    $type_demande = $value['annonce_type_demande'];
                    $utilisateur_id = $value['_utilisateur_id'];
                    $date = $value['annonce_date_publi'];
                    $date = strtotime($date);
                }

?>


<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Ajouter une annonce en tant qu'admin :</h1>
<form class="p-20" enctype="multipart/form-data" method="post" action="validModifAnnonce.php?id_annonce=<?= $id ?>">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900">Informations générales</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600 mb-10">Rentrez ici le nom de votre jardin et les infos supplémentaires le concernant</p>
      <div class="sm:col-span-3">
          <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type d'annonce</label>
          <div class="mt-2">
            <select id="type" name="type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <?php
            if($type_demande == "jardin"){
                echo '<option value="jardin">Recherche de jardin</option>';
                echo '<option value="don">Don d\'outil ou de récoltes</option>';
                echo '<option value="outil">Recherche d\'outils</option>';
            }elseif($type_demande == "outil"){
                echo '<option value="outil">Recherche d\'outils</option>';
                echo '<option value="don">Don d\'outil ou de récolte</option>';
                echo '<option value="jardin">Recherche de jardin</option>';
            }else{
                echo '<option value="don">Don d\'outil ou de récoltes</option>';
                echo '<option value="jardin">Recherche de jardin</option>';
                echo '<option value="outil">Recherche d\'outils</option>';
            } 
            ?>
            </select>
          </div>
        </div>
      <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nom de l'annonce</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-lime-600 sm:max-w-md">
              <input type="text" value="<?= $nom ?>" name="nom" id="nom" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 pl-2" placeholder="Recherche pelle">
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Plus d'informations sur l'annonce</label>
          <div class="mt-2">
            <textarea id="description" placeholder="Écrivez ici les informations supplémentaires sur votre annonce" name="description" rows="3" class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6"><?= $description ?></textarea>
          </div>
        </div>

        <div class="col-span-full">
          <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo de l'annonce</label>
          <img src="/assets/Uploads/<?= $photo ?>" alt="photo de l'annonce" class="w-20 h-20">
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="photo" class="relative cursor-pointer rounded-md bg-white font-semibold text-lime-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-lime-600 focus-within:ring-offset-2 hover:text-lime-500">
                  <span>Téléchargez une image</span>
                  <input id="photo" name="photo" type="file" class="sr-only">
                </label>
                <p class="pl-1">ou bien cliquez-glissez</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG</p>
            </div>
        </div>
        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Date de publication</legend>
          <p class="mt-1 text-sm leading-6 text-gray-600">Modifiez la date de publication de l'annonce.</p>
          <div class="relative max-w-sm">
  <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
      <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
    </svg>
  </div>
  <input datepicker datepicker-format="dd/mm/yyyy" name ="date" id="date" type="text" value="<?= $date ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Selectionner une date">
</div>
        </fieldset>
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