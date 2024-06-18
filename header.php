<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Univert</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/assets/js/flowbite.min.js"></script>
    <script src="/assets/js/datepicker.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/output.css">
    <link rel="stylesheet" href="/assets/css/polices.css">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    <script>
        function afficherMenuUser() {
        var menu = document.querySelector('.menuUser');
        menu.classList.toggle('hidden');
    }

    function afficherMenuBurger() {
    var menu = document.getElementById('navbas');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'flex';
    } else {
        menu.style.display = 'none';
    }
}

let scrolle = 0; //jverifie si on à déjà scrollé pour eviter que le menu disparaisse à nouveau quand l'affiche avec la fonction du dessus
    //ON DETECTE SI L'UTILISATEUR SCROLL DE 150PX
    addEventListener('scroll', function() {
      if (window.scrollY >= 150 || document.documentElement.scrollTop >= 150) {
        if (scrolle === 0) {
          var nav = document.getElementById('navbas');
          nav.style.display = 'none';
          var scrollez = document.getElementById('scrollez');
          scrollez.style.display = 'none';
          scrolle=1;
        }

    }
    });

    window.addEventListener('scroll', function() {
    if (window.scrollY === 0 || document.documentElement.scrollTop === 0) {
        //EN HAUT DE PAGE
        var nav = document.getElementById('navbas');
        nav.style.display = 'flex';
        scrolle=0;
    }
});
    </script>
    <script src="/assets/js/alertes.js"></script>
</head>

<body>
    <nav class="fixed w-full z-50 top-0">
        <div id="navhaut" class="w-full bg-[#11492e] flex flex-row items-center justify-between p-3 pl-5 pr-2">
            <div id="menuburger" class="hover:cursor-pointer" onclick="afficherMenuBurger();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-12">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
</svg>

            </div>
            <div id="logo" class="absolute left-1/2 transform -translate-x-1/2 top-3">
              <img src="/assets/images/logofixed.png" alt="logo" onclick="window.location.href='/index.php'" class="h-[40px] hover:cursor-pointer">
            </div>
            <div id="connexion" class="flex flex-row items-center hover:cursor-pointer">
                <?php
                session_start();
                if(isset($_SESSION['utilisateur_pseudo'])){
                    if($_SESSION['utilisateur_pseudo'] != "" or $_SESSION['utilisateur_pseudo'] != null){
                        echo "<a class='hidden md:block bg-[#7AA843] text-white p-2 pl-4 pr-4 rounded-md mr-4 hover:bg-lime-700' href='/Usager/publier.php'>Publier</a>";
                        echo "<div id='pdp' class='flex flew-row items-center gap-[5px]' onclick='afficherMenuUser();'>";
                        
                        if($_SESSION['utilisateur_admin'] == 1){
                            echo '<svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24" stroke-width="1.5" stroke="none" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                          </svg>
                          ';
                        }
                        echo "<p class='hidden sm:block text-white'>".$_SESSION['utilisateur_pseudo']."</p>";
                        echo "<div id='photosmenu'>";
                        echo "<img src='/assets/Uploads/".$_SESSION['utilisateur_photo']."' alt='pdp' class='w-[30px] h-[30px] rounded-full'>";
                        echo "</div>";
                        echo "</div>";
                        echo '<div class="relative" onclick="afficherMenuUser();">
                        <div class="inline-flex items-center overflow-hidden rounded-md">
                      
                          <button class="bg-transparent h-full p-2 text-gray-600">
                            <span class="sr-only">Menu</span>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-4 w-4"
                              viewBox="0 0 20 20"
                              fill="white"
                            >
                              <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                              />
                            </svg>
                          </button>
                        </div>
                      
                        <div
                          class="menuUser hidden absolute end-0 z-10 mt-2 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
                          role="menu"
                        >
                          <div class="p-2">
                            <a
                              href="/Usager/profil.php"
                              class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 bg-transparent"
                              role="menuitem"
                            >
                              Mon profil
                            </a>
                          </div>';

                          echo '<div class="p-2">
                          <form method="post" action="/Usager/publier.php">
                            <button
                              type="submit"
                              class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-lime-700 hover:bg-green-50 hover:cursor-pointer"
                              role="menuitem"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

                          
                    
                              Publier...
                            </button>
                          </form>
                        </div>';

                          

                          if($_SESSION['utilisateur_admin'] == 1){
                            echo'
                            <div class="p-2">
                            <form method="post" action="/admin/gestion.php">
                              <button
                                type="submit"
                                class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-orange-500 hover:bg-orange-50 hover:cursor-pointer"
                                role="menuitem"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
</svg>

                            
                      
                                Gestion
                              </button>
                            </form>
                          </div>
                            ';}
                              

                          echo'

                      
                          <div class="p-2">
                            <form method="POST" action="/Usager/deconnexion.php">
                              <button
                                type="submit"
                                class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
                                role="menuitem"
                              >
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>
                            
                      
                                Déconnexion
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>';
                    }
                } else {
                    echo "<a href='/Usager/formConnexion.php' class='bg-[#7AA843] text-white p-2 pr-3 pl-3 mr-4 rounded-md hover:bg-lime-700'>S'identifier</a>";
                }

                ?>
            </div>
            </div>
            
        </div>
        <div id="navbas" class="bg-[#11492E] text-white flex flex-row border-t-2 border-white justify-between items-center h-[60px] sm:h-[40px]">
            <div class="col hover:bg-lime-800 w-full self-stretch text-center flex items-center justify-center border-l-2 p-4">
          <a href="/annonces.php">Annonces</a>
            </div>
            <div class="col hover:bg-lime-800 w-full self-stretch text-center flex items-center justify-center border-l-2 border-l-2 p-4">
          <a href="/jardins.php">Jardins potager</a>
            </div>
            <div class="col hover:bg-lime-800 w-full self-stretch text-center flex items-center justify-center border-l-2 border-l-2 p-4">
          <a href="/recettes.php">Recettes</a>
            </div>
            <div class="col hover:bg-lime-800 w-full self-stretch text-center flex items-center justify-center border-l-2 border-l-2 p-4">
          <a href="/contact.php">Contact</a>
            </div>
        </div>
        </div>
    </nav>
    <div class="separateur mt-[132px] sm:mt-[112px]"></div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/alertes.php';

?>