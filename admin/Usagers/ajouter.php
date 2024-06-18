<?php
require('../../header.php');
?>
<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Ajouter un utilisateur en tant
    qu'admin</h1>
<form action="validAjoutUsager.php" method="post" enctype="multipart/form-data"
    class="mt-8 grid grid-cols-6 gap-6 p-20">
    <div class="col-span-6 sm:col-span-3">
        <label for="prenom" class="block text-sm font-medium text-gray-700">
            Prénom<span class="text-red-500">*</span>
        </label>

        <input type="text" id="prenom" name="prenom"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="nom" class="block text-sm font-medium text-gray-700">
            Nom de famille<span class="text-red-500">*</span>
        </label>

        <input type="text" id="nom" name="nom"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <label for="mail" class="block text-sm font-medium text-gray-700"> Email<span class="text-red-500">*</span>
        </label>

        <input type="email" id="mail" name="mail"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <label for="tel" class="block text-sm font-medium text-gray-700"> numero de telephone<span class="text-red-500">*</span>
        </label>

        <input type="email" id="tel" name="tel"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6">
        <label for="ville" class="block text-sm font-medium text-gray-700"> Ville<span class="text-red-500">*</span>
        </label>

        <input type="text" id="ville" name="ville"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="pseudo" class="block text-sm font-medium text-gray-700"> Pseudo<span class="text-red-500">*</span>
        </label>

        <input type="text" id="pseudo" name="pseudo"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="motdepasse" class="block text-sm font-medium text-gray-700">
            Mot de passe<span class="text-red-500">*</span>
        </label>

        <input type="password" id="motdepasse" name="motdepasse"
            class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
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

    <fieldset>
    <div class="relative flex gap-x-3 mt-5">
              <div class="flex h-6 items-center">
                <input id="admin" name="admin" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
              </div>
              <div class="text-sm leading-6">
                <label for="admin" class="font-medium text-gray-900">L'utilisateur sera admin</label>
              </div>
            </div>
        </fieldset>

    <div class="col-span-6">
        <p class="text-sm text-gray-500">
            Les champs marqués d'un <span class="text-red-500">*</span> sont obligatoires.
        </p>
    </div>

    <div class="col-span-6 sm:flex sm:items-center sm:gap-4">

        <input type="submit" value="Créer un compte"
            class="inline-block shrink-0 rounded-md border border-[#0b2b1c] bg-[#0b2b1c] px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#0b2b1c] focus:outline-none focus:ring active:text-[#0b2b1c] hover:cursor-pointer">
        </input>
    </div>
</form>

<?php
include '../../footer.php';
?>