<?php
require('../../header.php');
$id = $_GET['id'];
$db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
$req = "SELECT * FROM utilisateur WHERE utilisateur_id = $id";
$reponse = $db->query($req);
foreach ($reponse as $value){
    $nom = $value['utilisateur_nom'];
    $prenom = $value['utilisateur_prenom'];
    $pseudo = $value['utilisateur_pseudo'];
    $mail = $value['utilisateur_mail'];
    $motdepasse = $value['utilisateur_mdp'];
    $ville = $value['utilisateur_ville'];
    $admin = $value['utilisateur_admin'];
    $photo = $value['utilisateur_photo'];
    $tel = $value['utilisateur_tel'];
}
?>
<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Modifier un usager</h1>
<form action="validModifUsager.php?id=<?= $id ?>" method="post" enctype="multipart/form-data"
    class="mt-8 grid grid-cols-6 gap-6 p-20">
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
        <label for="tel" class="block text-sm font-medium text-gray-700"> numero de telephone <span class="text-red-500">*</span>
        </label>

        <input type="text" value="<?= $tel ?>" id="tel" name="tel"
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
                echo "<p>L'utilisateur n'a pas photo de profil</p>";
            } else {
                echo "<img src='../../assets/Uploads/$photo' alt='Photo de profil' class='w-20 h-20 rounded-full'>";
            }
        ?>
        <label for="pdp"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Cliquez pour
                        choisir</span> or glissez-déposez</p>
                <p class="text-xs text-gray-500">PNG ou JPG</p>
            </div>
            <input id="pdp" name="pdp" type="file" class="hidden" />
        </label>
    </div>
    <fieldset>
    <div class="relative flex gap-x-3 mt-5">
              <div class="flex h-6 items-center">
                <input id="admin" name="admin" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
              </div>
              <div class="text-sm leading-6">
                <label for="admin" class="font-medium text-gray-900">L'utilisateur est un admin</label>
              </div>
            </div>
        </fieldset>

    <?php
    if($admin == 1) {
        echo "<script>document.getElementById('admin').checked = true;</script>";
    } else {
        echo "<script>document.getElementById('admin').checked = false;</script>";
    }

    ?>

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
</form>

<?php
include '../../footer.php';
?>