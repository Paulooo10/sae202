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
                <img alt="" src="../assets/images/login2.jpg" class="absolute inset-0 h-full w-full object-cover opacity-80" />

                <div class="hidden lg:relative lg:block lg:p-12">


                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        Connectez vous 🌱
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                    En vous connectant vous pourrez louer des parcelles de jardins ou bien proposer les votres. Vous pourrez également échanger des outils ou vos récoltes avec d'autres jardiniers.
                    </p>
                </div>
            </section>

            <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">
                    <div class="relative -mt-16 block lg:hidden">
                        <a class="inline-flex size-16 items-center justify-center rounded-full bg-white text-[#0b2b1c] sm:size-20" href="../index.php">
                            <img src="../assets/images/logosimple.png" class='w-[50px] h-[50px]'">
                            <span class="sr-only">index</span>
                        </a>

                        <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                            Connectez-vous 🌱
                        </h1>

                        <p class="mt-4 leading-relaxed text-gray-500">
                            En vous connectant vous pourrez louer des parcelles de jardins ou bien proposer les votres. Vous pourrez également échanger des outils ou vos récoltes avec d'autres jardiniers.
                        </p>
                    </div>

                    <form action="validFormConnexion.php" method="post" class="mt-8 grid grid-cols-6 gap-6">

                        <div class="col-span-6">
                            <label for="mail" class="block text-sm font-medium text-gray-700"> Email </label>

                            <input type="email" id="mail" name="mail" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6 sm">
                            <label for="motdepasse" class="block text-sm font-medium text-gray-700">
                                Mot de passe
                            </label>

                            <input type="password" id="motdepasse" name="motdepasse" class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm focus:border-[#0b2b1c] focus:ring-[#0b2b1c]  " />
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            
                            <input type="submit" value="Se connecter" class="inline-block shrink-0 rounded-md border border-[#0b2b1c] bg-[#0b2b1c] px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#0b2b1c] focus:outline-none focus:ring active:text-[#0b2b1c]">
</input>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                                Vous n'avez pas de compte ?
                                <a href="formInscription.php" class="text-gray-700 underline">Inscrivez-vous</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>

</body>