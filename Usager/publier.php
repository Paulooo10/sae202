<?php
include '../header.php';
if($_SESSION['utilisateur_id'] == "" || !isset($_SESSION['utilisateur_id'])){
    header('Location: formConnexion.php');
}

//récupération des données de la bdd
$conn = new PDO("mysql:host=localhost;dbname=sae202;charset=utf8", "sae202User", 'rvf5ztz!ckw0UQP_yeu');
$sql = "SELECT COUNT(utilisateur_id) FROM utilisateur";
$result = $conn->query($sql);
$countLocation = $result->fetchColumn();

$sql = "SELECT COUNT(annonce_id) FROM annonce WHERE annonce_type_demande = 'rechOutil'";
$result = $conn->query($sql);
$countOutils = $result->fetchColumn();

$sql = "SELECT COUNT(jardin_id) FROM jardin";
$result = $conn->query($sql);
$countJardins = $result->fetchColumn();

$sql = "SELECT COUNT(annonce_id) FROM annonce WHERE annonce_type_demande = 'donOutil'";
$result = $conn->query($sql);
$countDonOutils = $result->fetchColumn();
?>
<main id="mainpublier" class="p-10 h-[100vh] lg:h-[700px]">
<h2 id="h2publier" class="font-bold text-xl border-b">Je souhaite déposer une annonce pour...</h2>
<div id="publier" class="flex flex-col gap-5 mt-5 lg:flex-row lg:flex-wrap lg:justify-center">
    <div class="blocPublier bg-[#d2d9d1] drop-shadow-md p-5 relative lg:w-[300px] lg:min-h-[180px]" onclick="window.location.href = 'ajouterJardin.php'">
        <div class="flex flex-row items-center font-bold gap-5">
        <img src="../assets/images/garden.png" alt="location" class="w-20 h-20">
        <h3>Mettre en location mon jardin</h3>
        </div>

        <p class="text-sm mt-5"><?= $countLocation; ?> jardiniers motivés recherchent un jardin !</p>
        <img src="../assets/images/flechepublier.png" class="flechepublier absolute bottom-0 right-[20px] w-[50px]">
    </div>
    <div class="blocPublier bg-[#d2d9d1] drop-shadow-md p-5 relative lg:w-[300px] lg:min-h-[180px]" onclick="window.location.href = 'ajouterAnnonce.php?typeAnnonce=don'">
        <div class="flex flex-row items-center font-bold gap-5">
        <img src="../assets/images/can.png" alt="donOutil" class="w-20 h-20">
        <h3>Faire un don d'outil ou de récolte</h3>
        </div>

        <p class="text-sm mt-5"><?= $countOutils; ?> jardiniers recherchent des outils !</p>
        <img src="../assets/images/flechepublier.png" class="flechepublier absolute bottom-0 right-[20px] w-[50px]">
    </div>
    <div class="blocPublier bg-[#d2d9d1] drop-shadow-md p-5 relative lg:w-[300px] lg:min-h-[180px]" onclick="window.location.href = 'ajouterAnnonce.php?typeAnnonce=jardin'">
        <div class="flex flex-row items-center font-bold gap-5">
        <img src="../assets/images/fertilizer.png" alt="rechJardin" class="w-20 h-20">
        <h3>Rechercher un jardin</h3>
        </div>

        <p class="text-sm mt-5"><?= $countJardins; ?> jardins sont disponibles à la location !</p>
        <img src="../assets/images/flechepublier.png" class="flechepublier absolute bottom-0 right-[20px] w-[50px]">
    </div>
    <div class="blocPublier bg-[#d2d9d1] drop-shadow-md p-5 relative lg:w-[300px] lg:min-h-[180px]" onclick="window.location.href = 'ajouterAnnonce.php?typeAnnonce=outil'">
        <div class="flex flex-row items-center font-bold gap-5">
        <img src="../assets/images/tools.png" alt="rechOutil" class="w-20 h-20">
        <h3>Rechercher des outils</h3>
        </div>

        <p class="text-sm mt-5"> <?= $countDonOutils; ?> outils sont disponibles GRATUITEMENT !</p>
        <img src="../assets/images/flechepublier.png" class="flechepublier absolute bottom-0 right-[20px] w-[50px]">
    </div>
</div>
</main>
<?php

include '../footer.php';

?>