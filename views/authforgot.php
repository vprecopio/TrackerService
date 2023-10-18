<body>
    <div id="main-content" class="relative flex items-center justify-center flex-wrap flex-col w-full h-full overflow-y-auto bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="flex justify-center">
            <a href="#"><img class="h-[60px] w-[60px] mb-6" src="/public/src/img/logo.png" alt="logo" /></a>
        </div>
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="#" method="POST">
                <p class="text-sm font-medium text-center text-white">Si olvidaste/perdiste tu contraseña podés pedirnos una solicitud de recuperación ingresando tu correo electrónico asociado</p>
                <div>
                    <label for="email" class="block pl-2.5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="nombre@compañía.com" required>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Solicitar">Solicitar</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    <a href="/auth/login/" class="text-blue-700 hover:underline dark:text-blue-500">Cancelar</a>
                </div>
            </form>
        </div>

    </div>

</body>