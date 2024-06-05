<header>
	<nav>
    	<ul>
            <?php
   $active = basename($_SERVER['PHP_SELF']);
   switch($active){
       case "index.php" : 
           echo '<li><a class="active" href="index.php">Accueil</a></li>';
           echo '<li><a href="listing.php">Catalogue</a></li>';
           echo '<li><a href="form_recherche.php">Recherche</a></li>';
           echo '<li><a href="admin/backoffice.php">Privé</a></li>';
           break;
       case "listing.php" :
           echo '<li><a href="index.php">Accueil</a></li>';
           echo '<li><a class="active" href="listing.php">Catalogue</a></li>';
           echo '<li><a href="form_recherche.php">Recherche</a></li>';
           echo '<li><a href="admin/backoffice.php">Privé</a></li>';
           break;
       case "form_recherche.php" :
           echo '<li><a href="index.php">Accueil</a></li>';
           echo '<li><a href="listing.php">Catalogue</a></li>';
           echo '<li><a class="active" href="form_recherche.php">Recherche</a></li>';
           echo '<li><a href="admin/backoffice.php">Privé</a></li>';
           break;
       case "backoffice.php" :
           echo '<li><a href="../index.php">Accueil</a></li>';
           echo '<li><a href="../listing.php">Catalogue</a></li>';
           echo '<li><a href="../form_recherche.php">Recherche</a></li>';
           echo '<li><a class="active" href="admin/backoffice.php">Privé</a></li>';
           break;
       default : 
           echo '<li><a class="nav-link" href="../index.php">Accueil</a></li>';
           echo '<li><a class="nav-link" href="../listing.php">Catalogue</a></li>';
           echo '<li><a class="nav-link" href="../form_recherche.php">Recherche</a></li>';
           echo '<li><a class="nav-link" href="admin/backoffice.php">Privé</a></li>';
           break;
   }
   
            ?>
        </ul>
     </nav>
</header>