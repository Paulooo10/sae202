<footer class="bg-[#11492e] text-white pt-10 pb-10">
    <div class="flex flex-col gap-4 font-bold justify-center text-center sm:flex-row sm:items-center">
        <a href="publier.php">Déposer une annonce</a>
        <p class="hidden sm:block">-</p>
        <a href="publier.php">Découvrir les annonces</a>
        <p class="hidden sm:block">-</p>
        <a href="publier.php">Découvrir nos recettes & tutos</a>
        <p class="hidden sm:block">-</p>
        <a href="publier.php">Accéder à la communauté</a>
    </div>

    <div class="sm:flex sm:flex-row sm:justify-around sm:mx-auto sm:m-10 sm:px-10">
        <div class="m-10 text-center sm:m-0">
            <h2 class="uppercase font-bold">Contactez nous !</h2>
            <p>contact@univert.fr ou <a href="contact.php" class="underline font-bold">Contact</a></p>
        </div>
        <div class="flex flex-col justify-center mx-auto text-center gap-2 mb-4 sm:mx-0">
            <h2 class="uppercase font-bold">Suivez-nous !</h2>
            <div class="flex flex-row gap-2 justify-center">
            <img src="/assets/images/fb.png" class="w-[30px] h-[30px]">
                    <img src="/assets/images/fb.png" class="w-[30px] h-[30px]">
                    <img src="/assets/images/fb.png" class="w-[30px] h-[30px]">
                    <img src="/assets/images/fb.png" class="w-[30px] h-[30px]">
                    <img src="/assets/images/fb.png" class="w-[30px] h-[30px]">
            </div>
        </div>
    </div>
    <hr class="mx-5 mb-5">
    <?php
    $mentions = '/mentions.php';
    ?>
        <p class="mx-5 text-center"><a href="<?=$mentions?>" class="underline">MENTIONS LÉGALES</a> - Tous droits réservés, <a href="https://mmi23c12.mmi-troyes.fr/agence" class="font-bold underline">Digital Minds</a> (2024)</p>
</footer>    
</body>
</html>