<div class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100">
    <a href="#"><img class="h-[60px] w-[60px] mb-6" src="/public/src/img/logo.png" alt="logo" /></a>
    <main>
        <form action='/auth/register/' method="POST">
            <div class="bg-white shadow-xl p-10 flex flex-col gap-6 text-sm w-96">
                <h1 class="text-xl font-bold text-center mb-6">
                    Registrarte
                </h1>
                <div class="flex flex-row mb-2">
                    <div class="w-1/2 mr-1">
                        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="text" name="text" placeholder="Nombre" autocomplete="off" />
                    </div>
                    <div class="w-1/2">
                        <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="text" name="text" placeholder="Apellido" autocomplete="off" />
                    </div>
                </div>
                <div class="mb-2">
                    <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="email" name="email" placeholder="Correo electrónico" />
                </div>
                <div class="mb-2">
                    <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="password" name="password" placeholder="Contraseña" autocomplete="off" />
                </div>
                <div class="mb-2">
                    <input class="border border-gray-400 focus:outline-[#06b6d4] rounded-md w-full shadow-sm px-5 py-2" type="password" name="password_con" placeholder="Confirma tu contraseña" autocomplete="off" />
                </div>
                <div class="mb-2">
                    <input class="bg-[#4fd1c5] w-full py-2 mt-4 rounded-md text-white font-bold cursor-pointer hover:bg-[#34a49a]" type="submit" value="Registrarte" />
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">
                    Ya tiene una cuenta? <a href="/auth/login/" class="text-blue-600 hover:underline">Ingresar</a>
                </div>
            </div>
        </form>
    </main>
</div>