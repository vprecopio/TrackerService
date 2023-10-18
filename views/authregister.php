<body>
    <div id="main-content" class="relative flex items-center justify-center flex-wrap flex-col w-full h-full overflow-y-auto bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="flex justify-center">
            <a href="#"><img class="h-[60px] w-[60px] mb-6" src="/public/src/img/logo.png" alt="logo" /></a>
        </div>
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="/auth/register/" method="POST">
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Registrarte</h5>
                <div class="flex flex-row mb-2">
                    <div class="w-1/2 mr-1">
                        <label for="nombre" class="block pl-2.5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Fabian" autocomplete="off" required>
                    </div>
                    <div class="w-1/2">
                        <label for="apellido" class="block pl-2.5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                        <input type="text" name="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Lopez" autocomplete="off" required>

                    </div>
                </div>

                <div>
                    <label for="email" class="block pl-2.5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nombre@compañía.com" autocomplete="off" required>
                </div>
                <div>
                    <label for="password" class="block pl-2.5  mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                    <input type="password" name="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="off" required>

                </div>
                <div>
                    <label for="password_con" class="block pl-2.5  mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar contraseña</label>
                    <input type="password" name="password_con" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" autocomplete="off" required>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Registrarte">Registrarte</button>
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Ya tiene una cuenta? <a href="/auth/login/" class="text-blue-600 hover:underline">Ingresar</a>
                </div>

            </form>
        </div>

    </div>

</body>