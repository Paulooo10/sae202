<?php
include ('../../header.php');
$id = $_GET['id'];
?>

<script>
function toggleLocataireMenu() {
    var checkbox = document.getElementById('louer');
    var menu = document.getElementById('locataireMenu');
    if (checkbox.checked) {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
}
</script>
<h1 class="mt-6 text-2xl font-bold text-black sm:text-3xl md:text-4xl pl-20 pt-10">Modifier une parcelle</h1>
<form class="p-20" enctype="multipart/form-data" method="post" action="validModifParcelle.php?id=<?= $id ?>">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="sm:col-span-3 pb-10">
                <label for="proprietaire" class="block text-sm font-medium leading-6 text-gray-900">Propriétaire de la
                    parcelle</label>
                <div class="mt-2">
                    <select id="proprietaire" name="proprietaire"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <?php
            $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
            $mabd->query('SET NAMES utf8;');
            
            // ID du propriétaire actuel
            $currentOwnerId = $id;
            
            // Récupérer les informations du propriétaire actuel
            $req = "SELECT * FROM utilisateur WHERE utilisateur_id = :currentOwnerId";
            $stmt = $mabd->prepare($req);
            $stmt->execute(['currentOwnerId' => $currentOwnerId]);
            $currentOwner = $stmt->fetch(PDO::FETCH_ASSOC);

            // Afficher le propriétaire actuel en premier
            if ($currentOwner) {
                echo '<option value="'.$currentOwner['utilisateur_id'].'">'.$currentOwner['utilisateur_pseudo'].' - ID : '.$currentOwner['utilisateur_id'].'</option>';
            }

            // Récupérer la liste de tous les utilisateurs sauf le propriétaire actuel
            $req = "SELECT * FROM utilisateur WHERE utilisateur_id != :currentOwnerId";
            $stmt = $mabd->prepare($req);
            $stmt->execute(['currentOwnerId' => $currentOwnerId]);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Afficher les autres utilisateurs
            foreach ($users as $user) {
                echo '<option value="'.$user['utilisateur_id'].'">'.$user['utilisateur_pseudo'].' - ID : '.$user['utilisateur_id'].'</option>';
            }
        ?>
                    </select>
                </div>
            </div>

            <div class="sm:col-span-3 pb-10">
                <label for="jardin" class="block text-sm font-medium leading-6 text-gray-900">Jardin qui contient la
                    parcelle</label>
                <div class="mt-2">
                    <select id="jardin" name="jardin"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
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
                <fieldset>
                    <div class="relative flex gap-x-3 mt-5">
                        <div class="flex h-6 items-center">
                            <input id="louer" name="louer" type="checkbox" value="1" onclick="toggleLocataireMenu()"
                                class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600">
                        </div>
                        <div class="text-sm leading-6">
                            <label for="louer" class="font-medium text-gray-900">La parcelle est louée</label>
                        </div>
                    </div>
                </fieldset>
                <div id="locataireMenu" class="hidden sm:col-span-3 pb-10">
                    <label for="locataire" class="block text-sm font-medium leading-6 text-gray-900">Locataire de la
                        parcelle</label>
                    <div class=" mt-2">
                        <select id="locataire" name="locataire"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <?php
            $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM parcelles WHERE parcelle_id = $id";
            $resultat2 = $mabd->query($req);
            foreach ($resultat2 as $value) {
              if($value['_parcelle_locataire_id'] == NULL){
                echo '<option value="NULL">Aucun locataire</option>';
                $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
                $mabd->query('SET NAMES utf8;');
                $req = "SELECT * FROM utilisateur";
                $resultat3 = $mabd->query($req);
              
              foreach ($resultat3 as $value) {
                echo '<option value="'.$value['utilisateur_id'].'">'.$value['utilisateur_pseudo'].' - ID : '.$value['utilisateur_id'].'</option>';
              }
              } else {
                $mabd = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
                $mabd->query('SET NAMES utf8;');
                
                // ID du propriétaire actuel
                $currentLocataireId = $id;
                
                // Récupérer les informations du locataire actuel
                $req = "SELECT * FROM utilisateur WHERE utilisateur_id = :currentOwnerId";
                $stmt = $mabd->prepare($req);
                $stmt->execute(['currentOwnerId' => $currentLocataireId]);
                $currentLocataire = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Afficher le propriétaire actuel en premier
                if ($currentLocataire) {
                    echo '<option value="'.$currentLocataire['utilisateur_id'].'">'.$currentLocataire['utilisateur_pseudo'].' - ID : '.$currentOwner['utilisateur_id'].'</option>';
                }
    
                // Récupérer la liste de tous les utilisateurs sauf le propriétaire actuel
                $req = "SELECT * FROM utilisateur WHERE utilisateur_id != :currentOwnerId";
                $stmt = $mabd->prepare($req);
                $stmt->execute(['currentOwnerId' => $currentLocataireId]);
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Afficher les autres utilisateurs
                foreach ($users as $user) {
                    echo '<option value="'.$user['utilisateur_id'].'">'.$user['utilisateur_pseudo'].' - ID : '.$user['utilisateur_id'].'</option>';
                }
              }}


              
            ?>
                        </select>
                    </div>
                    <fieldset>
                        <?php

$req = "SELECT * FROM parcelles WHERE parcelle_id = $id";
$stmt = $mabd->query($req);
$parcelle = $stmt->fetch(PDO::FETCH_ASSOC);

    if($parcelle['parcelle_etat'] == 1){
      echo '<script>document.getElementById("louer").checked = true; document.getElementById("locataireMenu").style.display = "block";</script>';
    }

    ?>
                </div>
            </div>
        </div>




        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900"
                onclick="window.location.href = 'gestion.php'">Annuler</button>
            <button type="submit"
                class="rounded-md bg-lime-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Sauvegarder</button>
        </div>
</form>

<?php
include '../../footer.php';
?>

</body>

</html>