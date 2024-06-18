<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/css/output.css">
    <script src="../assets/js/alertes.js"></script>
</head>

<body>
<?php
session_start();
include '../alertes.php';
session_destroy();
?>
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="" src="../assets/images/login.jpg" class="absolute inset-0 h-full w-full object-cover opacity-80" />

                <div class="hidden lg:relative lg:block lg:p-12">


                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Bienvenue chez UniVert 🌱
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                    En vous inscrivant vous pourrez louer des parcelles de jardins ou bien proposer les votres. Vous pourrez également échanger des outils ou vos récoltes avec d'autres jardiniers.
                    </p>
                </div>
            </section>

            <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <div class="relative -mt-16 block lg:hidden">
                        <a class="inline-flex size-16 items-center justify-center rounded-full bg-white text-[#0b2b1c] sm:size-20" href="#">
                            <span class="sr-only">Home</span>
                        </a>

                        <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Bienvenue chez UniVert 🌱
                        </h1>

                        <p class="mt-4 leading-relaxed text-gray-500">
                            En vous inscrivant vous pourrez louer des parcelles de jardins ou bien proposer les votres. Vous pourrez également échanger des outils ou vos récoltes avec d'autres jardiniers.
                        </p>
                    </div>

                    <form action="validFormInscription.php" method="post" enctype="multipart/form-data" class="mt-8 grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="prenom" class="block text-sm font-medium text-gray-700">
                                Prénom<span class="text-red-500">*</span>
                            </label>

                            <input type="text" id="prenom" name="prenom" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="nom" class="block text-sm font-medium text-gray-700">
                                Nom de famille<span class="text-red-500">*</span>
                            </label>

                            <input type="text" id="nom" name="nom" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6">
                            <label for="mail" class="block text-sm font-medium text-gray-700"> Email<span class="text-red-500">*</span> </label>

                            <input type="email" id="mail" name="mail" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6">
                            <label for="tel" class="block text-sm font-medium text-gray-700"> Numero de telephone <span class="text-red-500">*</span> </label>

                            <input type="text" id="tel" name="tel" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6">
                            <label for="ville" class="block text-sm font-medium text-gray-700"> Ville<span class="text-red-500">*</span> </label>

                            <input type="text" id="ville" name="ville" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="pseudo" class="block text-sm font-medium text-gray-700"> Pseudo<span class="text-red-500">*</span> </label>

                            <input type="text" id="pseudo" name="pseudo" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="motdepasse" class="block text-sm font-medium text-gray-700">
                                Mot de passe<span class="text-red-500">*</span>
                            </label>

                            <input type="password" id="motdepasse" name="motdepasse" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6">
                        <p class="block text-sm font-medium text-gray-700">Photo de profil</p>
                            <label for="pdp" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                                
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Cliquez pour choisir</span> or glissez-déposez</p>
                                    <p class="text-xs text-gray-500">PNG ou JPG</p>
                                </div>
                                <input id="pdp" name="pdp" type="file" class="hidden" />
                            </label>
                        </div>

                        <div class="col-span-6">
                            <p class="text-sm text-gray-500">
                                Les champs marqués d'un <span class="text-red-500">*</span> sont obligatoires.
                            </p>
                        </div>

                        <div class="col-span-6">
                            <p class="text-sm text-gray-500">
                                En créant un compte vous acceptez
                                <a href="#" class="text-gray-700 underline">la politique de confidentialité</a>.
                            </p>
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            
                            <input type="submit" value="Créer un compte" class="inline-block shrink-0 rounded-md border border-[#0b2b1c] bg-[#0b2b1c] px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#0b2b1c] focus:outline-none focus:ring active:text-[#0b2b1c]">
</input>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Vous avez déjà un compte?
                                <a href="formConnexion.php" class="text-gray-700 underline">Se connecter</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>

</body>