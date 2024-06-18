<?php
include('header.php');
?>
<div class="lg:h-[600px]">
<div id="hero" class="w-full h-[300px] bg-[url('assets/images/hero.jpeg')] bg-cover lg:h-[600px]">
    <div class="w-full h-full bg-[rgba(0,0,0,0.35)] text-white flex flex-col justify-around items-center text-center gap-[40px]">
    <h1 class="font-bold text-xl lg:text-[40px]">PLONGEZ DANS L'UNIVERT DU COJARDINAGE !</h1>
    <div id="texteHero" class="p-5 lg:flex lg:flex-row lg:justify-between lg:items-center lg:w-[900px]">
        <p class="lg:w-[400px] lg:text-start lg:text-xl">Que vous soyez un débutant ou expérimenté, Univert vous accompagne pour une expérience unique.<br>
            Cojardinez, partagez, cultivez !</p>
        <button onclick="window.location.href='Usager/formConnexion.php'" class="bg-[#7AA843] text-white p-2 pr-3 pl-3 mt-4 rounded-md hover:bg-lime-700">Je débute !</button>
    </div>
    </div>
</div>

</div>

<div id="recherche" class="block w-full text-white md:absolute md:top-[380px] lg:top-[620px] z-30">
<div class="md:w-[700px] bg-[#11492e] md:mx-auto md:rounded-xl md:drop-shadow-md pt-4 pb-12">
<h2 class="text-lg font-bold text-center">Recherchez dans l'agglomération :</h2>

    <form class="max-w-sm mx-auto m-5 flex flex-col gap-[10px] md:flex-row md:w-[600px] md:max-w-xl md:justify-between md:bg-[#D2D9D1] md:rounded-md md:py-4 md:px-5 md:items-center">
        <div>
        <label for="countries_disabled" class="block mb-2 text-sm font-medium text-white md:text-black">Je recherche...</label>
        <select id="countries_disabled"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-900 focus:border-lime-900 block w-full p-2.5">
            <option value="jardin">Un jardin à cultiver</option>
            <option value="recolte">Un don de récolte</option>
            <option value="outil">Un outil</option>
        </select>
        </div>
        <div>
        <label for="first_name" class="block mb-2 text-sm font-medium text-white  md:text-black">Où ?</label>
        <input type="text" id="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-lime-900 focus:border-lime-900 block w-full p-2.5"
            placeholder="Ville..." required />
        </div>
        
        
        <button type="submit"
            class="bg-[#7AA843] text-white p-2 pr-3 pl-3 mt-4 rounded-md hover:bg-lime-700 md:py-2">Rechercher</button>
    </form>
</div>    

</div>

<div id="stats relative">
    <div class="w-full h-[100px] relative z-0 top-[-40px] md:top-[-20px] lg:top-[-60px] h-[60px]">
        <div>
        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.54 32.5">
  <defs>
    <style>
      .cls-3 {
        fill: white;
        stroke-width: 0px;
      }
    </style>
  </defs>
  <g id="Layer_3" data-name="Layer 3">
    <path class="cls-3" d="M0,3.78S31.43-.39,49.12.03c31.49-.03,53.53,12.67,81.8,11.86,43.91-1.25,56.61-10.62,92.62-7.49v28.1H0V3.78Z"/>
  </g>
</svg>
        </div>
    
    </div>
    <h2 class="font-bold text-center m-10 text-lg md:mt-[200px]">Nos chiffres parlent d'eux même !</h2>
    <div id="chiffres" class="relative flex flex-col pb-10 items-center justify-center gap-[30px] sm:flex-row sm:justify-between sm:px-10 sm:max-w-[700px] sm:mx-auto z-30">
        <div class="chiffre flex flex-col items-center justify-center" >
            <img src="assets/images/stats1.jpg" class=" w-[100px] h-[100px] bg-contain rounded-full lg:w-[150px] lg:h-[150px]">
            <h3>1000</h3>
            <p>Jardins disponibles</p>
        </div>
        <div class="chiffre flex flex-col items-center justify-center" >
        <img src="assets/images/gardener.jpg" class=" w-[100px] h-[100px] bg-contain rounded-full lg:w-[150px] lg:h-[150px]">
            <h3>500</h3>
            <p>Jardiniers motivés</p>
        </div>
        <div class="chiffre flex flex-col items-center justify-center" >
        <img src="assets/images/handshake.jpg" class=" w-[100px] h-[100px] bg-contain rounded-full lg:w-[150px] lg:h-[150px]">
            <h3>100</h3>
            <p>Opérations concrétisées</p>
        </div>
        
    </div>
    <div class="w-full relative z-21  bottom-[-30px] md:bottom-[-20px] lg:bottom-[0px] h-[80px]">
        <div>
        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.54 32.5" class="z-0">
  <defs>
    <style>
      .cls-1 {
        fill: #12492e;
        stroke-width: 0px;
      }
    </style>
  </defs>
  <g id="Layer_3" data-name="Layer 3">
    <path class="cls-1" d="M0,3.78S31.43-.39,49.12.03c31.49-.03,53.53,12.67,81.8,11.86,43.91-1.25,56.61-10.62,92.62-7.49v28.1H0V3.78Z"/>
  </g>
</svg>
        </div>
    
    </div>

    <div id="cojardinez" class="w-full bg-[#11492e] text-white pt-20 pb-[100px] flex flex-col gap-[20px] relative z-20">
        <h2 class="font-bold text-center text-lg">Cojardinez dès maintenant !</h2>
        <div class="block md:flex md:flex-row">
        <div id="cojardinezTexte" class="flex flex-col justify-center items-center m-10 text-center md:gap-4">
            <h3 class="text-xl">1. Créez votre annonce</h3>
            <img src="assets/images/creezannonce.png" class="md:w-[60px] md:h-[60px]">
            <p>Vous avez un jardin et souhaitez le partager ? Ou cherchez-vous un espace pour cultiver vos plantes ? Créez votre annonce de cojardinage dès aujourd'hui ! Rejoignez une communauté passionnée, échangez conseils et récoltes, et profitez d'une expérience de jardinage enrichissante et conviviale. N'attendez plus, publiez votre annonce. C'est simple, rapide et gratifiant !</p>
        </div>
        <div id="cojardinezTexte" class="flex flex-col justify-center items-center m-10 text-center md:gap-4">
            <h3 class="text-xl">2. Trouvez vore bonheur</h3>
            <img src="assets/images/bonheur.png" class="md:w-[60px] md:h-[60px]">
            <p>Vous cherchez un espace vert pour cultiver vos légumes, herbes et fleurs ? Pas de soucis, vous êtes au bon endroit !  Rejoignez notre communauté de cojardinage et partagez un jardin avec des passionnés. Échangez des conseils, plantez ensemble, et récoltez les fruits de votre travail en toute convivialité. Que vous soyez débutant ou expert, trouvez votre bonheur en créant votre petit coin de paradis. </p>
        </div>
        <div id="cojardinezTexte" class="flex flex-col justify-center items-center m-10 text-center md:gap-4">
            <h3 class="text-xl">3. Cojardinez !</h3>
            <img src="assets/images/cojardinez.png" class="md:w-[60px] md:h-[60px]">
            <p>Découvrez la magie du cos jardinage !Partagez un coin de verdure avec amis ou inconnues et cultiver ensemble fruits, légumes et amitiés. Plantez, récoltez et savourez le bonheur de jardiner à plusieurs. Rejoignez nous pour une expérience enrichissante et écoresponsable. Cojardinez, c’est bien plus que cultiver des plantes !</p>
        </div>
        </div>
        
        <button action="window.location.href='Usager/formConnexion.php'" class="bg-[#7AA843] text-white p-2 pr-3 pl-3 mt-4 rounded-md hover:bg-lime-700 w-[200px] mx-auto md:mt-0">Je crée mon compte !</button>
    </div>

        <div class="w-full relative z-0 scale-y-[-1] bottom-[10px] h-[80px] lg:bottom-[-10px]">
        <div>
        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.54 32.5" class="z-0">
  <defs>
    <style>
      .cls-2 {
        fill: #12492e;
        stroke-width: 0px;
      }
    </style>
  </defs>
  <g id="Layer_3" data-name="Layer 3">
    <path class="cls-2" d="M0,3.78S31.43-.39,49.12.03c31.49-.03,53.53,12.67,81.8,11.86,43.91-1.25,56.61-10.62,92.62-7.49v28.1H0V3.78Z"/>
  </g>
</svg>
        </div>
    
    </div>

    <div id="decouvrez" class="flex flex-col justify-center items-center text-center mt-10 mb-10 md:mb-10">
        <h2 class="font-bold text-lg mb-10">Découvrez quelques jardins disponibles</h2>
        <div class="flex flex-col gap-4 pb-10 sm:flex-row sm:overflow-hidden sm:flex-wrap sm:mx-auto sm:justify-center">
        <?php
        $db = new PDO('mysql:host=localhost;dbname=sae202', 'sae202User', 'rvf5ztz!ckw0UQP_yeu');
        $req = "SELECT * FROM jardin INNER JOIN utilisateur ON jardin._utilisateur_id = utilisateur.utilisateur_id ORDER BY jardin_id DESC LIMIT 3";
        $res = $db->query($req);

        foreach($res as $ligne){
            $dateFromDB = $ligne['jardin_date_publication'];
            $dateObj = DateTime::createFromFormat('Y-m-d', $dateFromDB);
            $formattedDate = $dateObj->format('d/m/Y');
            echo ' <div class="jardin w-[300px] rounded-lg drop-shadow-md bg-white">
            <div class="w-full h-[168px] bg-[url(\'assets/Uploads/'.$ligne['jardin_photo1'].'\')] bg-cover">
            </div>
            <h3 class="font-bold text-left m-3 min-h-[50px]">'.$ligne['jardin_nom'].'</h3>
            <p class="text-left text-sm ml-3">Déposée le <strong>'.$formattedDate.'</strong> par <strong>'.$ligne['utilisateur_pseudo'].'</strong></p>
            <div class="flex flex-row items-center gap-[5px] ml-3 mt-7">
                <img src="assets/images/lieu.png" class="w-[20px]">
                <p class="text-sm md:text-[12px]">'.$ligne['jardin_ville'].' ('.$ligne['jardin_cp'].')</p>
            </div>
            <div class="flex flex-row items-center justify-end m-4 gap-2 text-blue-700">
                <a href="jardin.php?id='.$ligne['jardin_id'].'">Voir l\'annonce</a>
                <img src="assets/images/flechepublier.png" class="w-[20px]">
            </div>
        </div>';
        }

        ?>
        
        </div>
        
    </div>

    <div id="suiveznous" class="w-full bg-[#11492e] text-white pt-10 pb-10 flex flex-col gap-[20px]">
        <h2 class="text-lg font-bold text-center">Suivez Univert sur les réseaux sociaux</h2>
        <div class="block lg:flex lg:flex-row lg:justify-center lg:items-center lg:gap-10">
            <div class="w-[300px] h-[169px] bg-black mx-auto sm:w-[500px] sm:h-[281px] lg:mx-0">
            <iframe class="w-[100%] h-[100%]" src="https://www.youtube.com/embed/5_BjYp_9xFg?si=tLewJmdshvikRkv5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div class="m-10 text-center lg:w-[400px] lg:m-0">
                <p>Suivez-nous sur nos réseaux sociaux pour plonger dans notre univers dédié au cojardinage. Découvrez nos jardins, nos recettes et tutoriels sur tous nos réseaux ! Découvrez aussi nos initiatives, nos projets innovants et nos astuces pour adopter une main plus verte. Connectez-vous avec une communauté passionnée et engagée, partageant des astuces et des guides.</p>
                <div class="flex flex-row justify-center items-center gap-4 mt-10">
                    <img src="assets/images/fb.png" class="w-[30px] h-[30px]">
                    <img src="assets/images/twi.png" class="w-[30px] h-[30px]">
                    <img src="assets/images/tk.png" class="w-[30px] h-[30px]">
                    <img src="assets/images/ytb.png" class="w-[30px] h-[30px]">
                </div>
            </div>
        </div>
    </div>

    <div id="recettes" class="mb-10">
        <h2 class="font-bold text-lg text-center">Les meilleures recettes de la saison</h2>
        <div class="flex flex-col justify-center items-center mt-10 gap-4 sm:flex-row sm:flex-wrap">
            <div class="recette relative w-[300px] drop-shadow-md bg-white rounded-lg">
            <img src="assets/images/recette1.png" class="rounded-lg recettesImg">
                <p class="absolute top-[20px] bg-[#E5E5E5] px-2">On vous recommande !</p>
                <h3 class="font-bold ml-3">Courgettes farcies</h3>
                <p class="ml-3">Savourez des courgettes farcies : tendres, garnies de viande hachée, riz et herbes fraîches, gratinées au fromage. Un délice sain et convivial !</p>
                <div class="flex flex-row gap-2 m-5 justify-end text-blue-700">
                    <a href="recettes/recette1.php">J'ai faim !</a>
                    <img class="w-[20px]" src="assets/images/flechepublier.png">
                </div>
            </div>
            <div class="recette relative w-[300px] drop-shadow-md bg-white rounded-lg">
            <img src="assets/images/recette2.jpg" class="rounded-lg recettesImg">
                <p class="absolute top-[20px] bg-[#E5E5E5] px-2">On vous recommande !</p>
                <h3 class="font-bold ml-3">Crumble aux légumes</h3>
                <p class="ml-3">Ce crumble aux légumes allie des légumes dorés et parfumés à une croûte croustillante au parmesan et aux pignons. Accompagné de chèvre frais ou de mozzarella, c'est un délice réconfortant !</p>
                <div class="flex flex-row gap-2 m-5 justify-end text-blue-700">
                    <a href="recettes/recette2.php">J'ai faim !</a>
                    <img class="w-[20px]" src="assets/images/flechepublier.png">
                </div>
            </div>
            <div class="recette relative w-[300px] drop-shadow-md bg-white rounded-lg md:hidden lg:block">
            <img src="assets/images/recette3.jpg" class="rounded-lg recettesImg">
                <p class="absolute top-[20px] bg-[#E5E5E5] px-2">On vous recommande !</p>
                <h3 class="font-bold ml-3">Couscous de printemps</h3>
                <p class="ml-3">Découvrez notre couscous de printemps : léger et parfumé, avec des légumes croquants de saison, des herbes fraîches, et une touche de citron. Un festin coloré et sain, parfait pour accueillir les beaux jours !</p>
                <div class="flex flex-row gap-2 m-5 justify-end text-blue-700">
                    <a href="recettes/recette3.php">J'ai faim !</a>
                    <img class="w-[20px]" src="assets/images/flechepublier.png">
                </div>
            </div>
            <div class="recette relative w-[300px] drop-shadow-md bg-white rounded-lg md:hidden lg:hidden xl:block">
            <img src="assets/images/recette4.jpg" class="rounded-lg recettesImg">
                <p class="absolute top-[20px] bg-[#E5E5E5] px-2">On vous recommande !</p>
                <h3 class="font-bold ml-3">Gratin aux aubergines</h3>
                <p class="ml-3">Découvrez notre gratin aux aubergines : des tranches d'aubergines fondantes, nappées d'une sauce tomate riche et parfumée, le tout gratiné avec du fromage doré et fondant.</p>
                <div class="flex flex-row gap-2 m-5 justify-end text-blue-700">
                    <a href="recettes/recette4.php">J'ai faim !</a>
                    <img class="w-[20px]" src="assets/images/flechepublier.png">
                </div>
            </div>
        </div>

    </div>


    <?php
include('footer.php')
?>