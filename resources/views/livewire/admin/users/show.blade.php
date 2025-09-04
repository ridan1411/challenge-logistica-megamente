<div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6 sm:p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Información del Usuario
        </h2>

        <div class="space-y-5">

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-800">
                    Nombre completo
                </label>
                <input type="text" value="{{ $user->name }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-3" />
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-800">
                    Correo electrónico
                </label>
                <input type="text" value="{{ $user->email }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-3" />
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-800">
                    Rol del usuario
                </label>
                <input type="text" value="{{ $user->getRoleNames()->first() ?? 'Sin rol asignado' }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-3" />
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-800">
                    Creado
                </label>
                <input type="text" value="{{ $user->created_at }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-3" />
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-800">
                    Editado
                </label>
                <input type="text" value="{{ $user->updated_at }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg block w-full p-3" />
            </div>

        </div>

        <div class="flex gap-3 mt-6">
            <a href="{{ route('dashboard') }}"
                class="flex-1 text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-150">
                Regresar
            </a>
            <a href="{{ route('admin.users.edit', $user->id) }}"
                class="text-white bg-pink-700 hover:bg-pink-800 font-medium rounded-lg text-sm px-5 py-3 text-center">
                Editar Usuario
            </a>
        </div>
    </div>
</div>
