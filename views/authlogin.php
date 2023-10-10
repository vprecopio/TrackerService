<body>
    <?php require __DIR__ . '/components/template/navbar.php'; ?>

    <div id="main-content" class="relative flex items-center justify-center flex-wrap flex-col w-full h-full overflow-y-auto bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="flex justify-center">
            <a href="#"><img class="h-20 mb-6" src="/public/src/img/logo.png" alt="logo" /></a>    
        </div>
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="/auth/login/" method="POST">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Ingrese a su cuenta</h5>
                <div>
                    <label for="email" class="block pl-2.5 mb-2 text-sm font-bold text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nombre@compañía.com" required>
                </div>
                <div>
                    <label for="password" class="block pl-2.5 mb-2 text-sm font-bold text-gray-900 dark:text-white">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800">
                        </div>
                        <label for="remember" class="ml-2 text-sm font-bold text-gray-900 dark:text-gray-300">Recordarme</label>
                    </div>
                    <a href="/auth/forgot/" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">¿Olvidó su contraseña?</a>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ingresar</button>
                <div class="text-sm font-bold text-gray-500 dark:text-gray-300">
                    ¿No tiene cuenta? <a href="/auth/register/" class="text-blue-700 hover:underline dark:text-blue-500">Registrarse</a>
                </div>
            </form>
        </div>

    </div>

</body>