<?php
include ('../header.php');

if(!isset($_GET['typeAnnonce']) || $_GET['typeAnnonce'] == ""){
    $typeAnnonce = "don";
} else {
    $typeAnnonce = $_GET['typeAnnonce'];
}
// echo $typeAnnonce;

  if(!isset($_SESSION['utilisateur_id']) || $_SESSION['utilisateur_id'] == ""){
    header('Location: ../connexion.php');
  }
?>
<!-- <form action="validAjoutAnnonce.php" method="POST" enctype="multipart/form-data">
    <label for="photo">Photo de l'annonce:</label>
    <input type="file" name="photo" id="photo">

    <label for="nom">Nom de l'annonce:</label>
    <input type="text" name="nom" id="nom">

    <label for="quantite">Quantité:</label>
    <input type="number" name="quantite" id="quantite">

    <label for="type_produit">Type de produit:</label>
    <select name="type_produit" id="type_produit">
        <option value="legumes">Légumes</option>
        <option value="fruit">Fruit</option>
        <option value="outils">Outils</option>
    </select>

    <label for="type_annonce">Type d'annonce:</label>
    <select name="type_annonce" id="type_annonce">
        <option value="don">Don</option>
        <option value="demande">Demande</option>
    </select>

    <label for="description">Description de l'annonce:</label>
    <textarea name="description" id="description"></textarea>

    <input type="submit" value="Ajouter">
</form>
</body>
</html> -->

<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Ajouter une annonce :</h1>
<form class="p-20" enctype="multipart/form-data" method="post" action="validAjoutAnnonce.php">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900">Informations générales</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600 mb-10">Rentrez ici le nom de votre jardin et les infos supplémentaires le concernant</p>
      <div class="sm:col-span-3">
          <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type d'annonce</label>
          <div class="mt-2">
            <select id="type" name="type" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
            <?php
            if($typeAnnonce == "jardin"){
                echo '<option value="jardin">Recherche de jardin</option>';
                echo '<option value="don">Don d\'outil ou de récoltes</option>';
                echo '<option value="outil">Recherche d\'outils</option>';
            }elseif($typeAnnonce == "outil"){
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
              <input type="text" name="nom" id="nom" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 pl-2" placeholder="Recherche pelle">
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Plus d'informations sur l'annonce</label>
          <div class="mt-2">
            <textarea id="description" placeholder="Écrivez ici les informations supplémentaires sur votre annonce" name="description" rows="3" class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6"></textarea>
          </div>
        </div>

        <div class="col-span-full">
          <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo de l'annonce</label>
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
          </div>
    </div>

    
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="window.location.href = 'publier.php'">Annuler</button>
    <button type="submit" class="rounded-md bg-lime-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Sauvegarder</button>
  </div>
</form>
</div>
<?php
include ('../footer.php');
?>
