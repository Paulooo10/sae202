<?php 
if(isset($_SESSION['erreur']) && $_SESSION['erreur'] != ""){
    $erreur = $_SESSION['erreur'];
    echo '  
    <div id="popup" class="fixed w-full h-full bg-black bg-opacity-50 z-50 top-0">
    <div id="popup-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen md:inset-0">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">'.$erreur.'</h3>
                    <button onclick="ciaopopup();" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Ok
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    ';
    $_SESSION['erreur'] = "";
}
?>