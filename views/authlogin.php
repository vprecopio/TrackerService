<body>

    <div class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100">
        <a href="#"><img class="h-[60px] w-[60px] mb-6" src="/public/src/img/logo.png" alt="logo" /></a>

        <main>
            <div class="bg-white shadow-xl p-10 flex flex-col gap-6 text-sm w-96">
                <h1 class="text-xl font-bold text-center mb-6">
                    Ingrese a su cuenta
                </h1>
                <form action="/auth/login/" method="POST">
                    <div class="mb-2">
                        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="email" name="email" placeholder="Correo electrónico" />
                    </div>
                    <div class="mb-2">
                        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="password" name="password" placeholder="Contraseña" />
                    </div>
                    <div class="flex">
                        <div class="w-2/5">
                            <input type="checkbox" name="remeberMe" />
                            <label for="remeberMe">Recordarme</label>
                        </div>
                        <div class="w-3/5 text-end">
                            <a class="text-blue-600 hover:underline" href="/auth/reset/">¿Olvidaste tu contraseña?</a>
                        </div>
                    </div>
                    <div>
                        <input class="bg-[#4fd1c5] w-full py-2 mt-4 rounded-md text-white font-bold cursor-pointer hover:bg-[#34a49a]" type="submit" value="Ingresar" />
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        No tenés cuenta? <a href="/auth/register/" class="text-blue-600 hover:underline">Registrarse</a>
                    </div>

                </form>

            </div>
        </main>

    </div>

</body>