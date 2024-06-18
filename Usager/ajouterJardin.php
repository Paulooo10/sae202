<?php

include '../header.php';
if(!isset($_SESSION['utilisateur_id']) || $_SESSION['utilisateur_id'] == ""){
  header('Location: ../connexion.php');
}


?>
<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Ajouter un jardin :</h1>
<form class="p-20" enctype="multipart/form-data" method="post" action="validAjoutJardin.php">
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900">Informations générales</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600 mb-10">Rentrez ici le nom de votre jardin et les infos supplémentaires le concernant</p>
      <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nom du jardin</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-lime-600 sm:max-w-md">
              <input type="text" name="nom" id="nom" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6 pl-2" placeholder="Jardin de Mathieu">
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Informations générales</label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6"></textarea>
          </div>
          <p class="mt-3 text-sm leading-6 text-gray-600">Vous n'avez pas besoin de préciser sa superficie, s'il y a un point d'eau ou des équipements disponibles</p>
        </div>

        <div class="col-span-full">
          <label for="photo1" class="block text-sm font-medium leading-6 text-gray-900">Photos du jardin</label>
          
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
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="photo2" class="relative cursor-pointer rounded-md bg-white font-semibold text-lime-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-lime-600 focus-within:ring-offset-2 hover:text-lime-500">
                  <span>Téléchargez une image</span>
                  <input id="photo2" name="photo2" type="file" class="sr-only">
                </label>
                <p class="pl-1">ou bien cliquez-glissez</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="text-center">
              <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
              </svg>
              <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <label for="photo3" class="relative cursor-pointer rounded-md bg-white font-semibold text-lime-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-lime-600 focus-within:ring-offset-2 hover:text-lime-500">
                  <span>Téléchargez une image</span>
                  <input id="photo3" name="photo3" type="file" class="sr-only">
                </label>
                <p class="pl-1">ou bien cliquez-glissez</p>
              </div>
              <p class="text-xs leading-5 text-gray-600">PNG, JPG</p>
            </div>
          </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Adresse</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Merci de rentrer une adresse dans l'agglomération Troyenne.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
       

        <!-- <div class="sm:col-span-3">
          <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
          <div class="mt-2">
            <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>United States</option>
              <option>Canada</option>
              <option>Mexico</option>
            </select>
          </div>
        </div> -->

        <div class="col-span-full">
          <label for="rue" class="block text-sm font-medium leading-6 text-gray-900">Numéro et nom de la rue</label>
          <div class="mt-2">
            <input type="text" name="rue" id="rue" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
          <label for="ville" class="block text-sm font-medium leading-6 text-gray-900">Ville</label>
          <div class="mt-2">
            <input type="text" name="ville" id="ville" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-2">
          <label for="cp" class="block text-sm font-medium leading-6 text-gray-900">Code Postal</label>
          <div class="mt-2">
            <input type="text" name="cp" id="cp" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
          </div>
        </div>
      </div>
    </div>

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Spécificités du jardin</h2>
      <p class="mt-1 text-sm leading-6 text-gray-600">Cochez les cases pour indiquer ce qu'il y a dans votre jardin.</p>

      <div class="mt-10 space-y-10">
        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Installations</legend>
          <div class="mt-6 space-y-6">
            <div class="relative flex gap-x-3">
              <div class="flex h-6 items-center">
                <input id="equipements" name="equipements" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
              </div>
              <div class="text-sm leading-6">
                <label for="equipements" class="font-medium text-gray-900">Équipements disponibles</label>
                <p class="text-gray-500">Votre jardin possède des outils disponible pour tous.</p>
              </div>
            </div>
            <div class="relative flex gap-x-3">
              <div class="flex h-6 items-center">
                <input id="eau" name="eau" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
              </div>
              <div class="text-sm leading-6">
                <label for="eau" class="font-medium text-gray-900">Points d'eau</label>
                <p class="text-gray-500">Votre jardin possède des points d'eau.</p>
              </div>
            </div>
            <div class="flex gap-10">
                <div>
  <label for="dimensions" class="block text-sm font-medium leading-6 text-gray-900">Dimensions d'une parcelle</label>
  <div class="relative mt-2 rounded-md shadow-sm">
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
      <span class="text-gray-500 sm:text-sm">m²</span>
    </div>
    <input type="text" name="dimensions" id="dismensions" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" placeholder="25">
  </div></div>
  <div><div>
  <label for="parcelles" class="block text-sm font-medium leading-6 text-gray-900">Nombre de parcelles</label>
  <div class="relative mt-2 rounded-md shadow-sm">
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
      <span class="text-gray-500 sm:text-sm">parcelle(s)</span>
    </div>
    <input type="text" name="parcelles" id="parcelles" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" placeholder="10">
  </div>
</div></div>
          </div>
        </fieldset>
        <fieldset>
          <legend class="text-sm font-semibold leading-6 text-gray-900">Partage</legend>
          <p class="mt-1 text-sm leading-6 text-gray-600">Choisissez les conditions de partage de votre jardin.</p>
            <div class="relative flex gap-x-3 mt-5">
              <div class="flex h-6 items-center">
                <input id="recolte" name="recolte" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
              </div>
              <div class="text-sm leading-6">
                <label for="recolte" class="font-medium text-gray-900">Partage de récoltes (légumes, fruits)</label>
                <p class="text-gray-500">Vous souhaitez que les locataires partagent leurs récoltes entre eux.</p>
              </div>
            </div>
            <div class="relative flex gap-x-3 mt-5">
              <div class="flex h-6 items-center">
                <input id="jardin" name="jardin" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
              </div>
              <div class="text-sm leading-6">
                <label for="jardin" class="font-medium text-gray-900">Entretien du jardin</label>
                <p class="text-gray-500">Vous souhaitez que les locataires entretiennent et nettoient votre jardin.</p>
              </div>
            </div>
        </fieldset>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm font-semibold leading-6 text-gray-900" onclick="window.location.href = 'publier.php'">Annuler</button>
    <button type="submit" class="rounded-md bg-lime-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Sauvegarder</button>
  </div>
</form>

<?php
include '../footer.php';
?>
    
</body>
</html>
