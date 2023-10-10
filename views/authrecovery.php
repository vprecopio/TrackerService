<body>
    <?php require __DIR__ . '/components/template/navbar.php'; ?>

    <div id="main-content" class="relative flex items-center justify-center flex-wrap flex-col w-full h-full overflow-y-auto bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="flex justify-center">
            <a href="#"><img class="h-[60px] w-[60px] mb-6" src="/public/src/img/logo.png" alt="logo" /></a>
        </div>
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="#" method="POST">
                <p class="text-sm font-medium text-center text-white">¡Está a un paso de su nueva contraseña!</p>
                <div>
                    <label for="password" class="block pl-2.5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva contraseña</label>
                    <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••" required>
                </div>
                <div>
                    <label for="password_con" class="block pl-2.5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar contraseña</label>
                    <input type="password" name="password_con" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="••••••••" required>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Cambiar">Cambiar</button>
            </form>
        </div>

    </div>

</body>