<?php
include 'header.php';
?>

<div class="hero h-[200px] bg-black relative bg-[url('assets/images/contactbg.jpg')] bg-cover lg:h-[400px]">
  <div class="w-full h-full bg-[rgba(0,0,0,0.4)]">
  <h1 class="pl-20 pb-5 text-white font-bold text-[30px] absolute bottom-0">Contactez-nous !</h1>
  </div>

</div>
    <form action="validFormContact.php" method="post" class="grid grid-cols-6 gap-6 p-20 pt-5">

<div class="col-span-6">
    <label for="mail" class="block text-sm font-medium text-gray-700"> Email </label>

    <?php
    if(isset($_SESSION['utilisateur_id']) && isset($_SESSION['utilisateur_pseudo']) && isset($_SESSION['utilisateur_mail'])){
        echo '<input type="email" id="mail" name="mail" value="'.$_SESSION['utilisateur_mail'].'" class="mt-1 w-full sm:max-w-sm rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]" />';
        echo '<input type="hidden" id="pseudo" name="pseudo" value="'.$_SESSION['utilisateur_pseudo'].'"/>';
        echo '<input type="hidden" id="id" name="id" value="'.$_SESSION['utilisateur_id'].'"/>';
    } else {
        echo '<input type="email" id="mail" name="mail" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />';
        echo '<input type="hidden" id="pseudo" name="pseudo" value="Invité"/>';
        echo '<input type="hidden" id="id" name="id" value="000"/>';
    }
    ?>
</div>

<div class="sm:col-span-3">
          <label for="type" class="block text-sm min-w-[200px] font-medium leading-6 text-gray-900">Type de demande</label>
          <div class="mt-2">
            <select id="type" name="type" class="block w-full min-w-[200px] text-sm rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset pl-3 ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:max-w-sm sm:text-sm sm:leading-6">
            <option value="bug">Signaler un bug</option>
            <option value="probleme">Signaler un problème (arnaque..)</option>
            <option value="suggestion">Faire une suggestion</option>
            <option value="autre">Autre</option>
            </select>
          </div>
        </div>

        <div class="col-span-full">
          <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Message de votre demande</label>
          <div class="mt-2">
            <textarea id="message" name="message" rows="3" class="block w-full pl-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6"></textarea>
          </div>
        </div>

<div class="col-span-6 sm:flex sm:items-center sm:gap-4">
    
    <input type="submit" value="Envoyer un message" class="inline-block shrink-0 rounded-md border border-[#0b2b1c] bg-[#0b2b1c] px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#0b2b1c] focus:outline-none focus:ring active:text-[#0b2b1c]">
</input>
</div>
</form>

<?php
include 'footer.php';
?>