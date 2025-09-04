<div class="min-h-screen flex items-center justify-center bg-gray-100 p-4" x-data="passwordGenerator()">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6 sm:p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
            Editar Usuario
        </h2>

        <!-- Mensajes de éxito -->
        @if (session()->has('message'))
            <div class="mb-4 p-3 text-green-800 bg-green-100 rounded-lg border border-green-200">
                {{ session('message') }}
            </div>
        @endif

        <!-- Errores de validación -->
        @if ($errors->any())
            <div class="mb-4 p-3 text-red-800 bg-red-100 rounded-lg border border-red-200">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-5" wire:submit.prevent="update">
            @csrf

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-800">
                    Nombre completo
                </label>
                <input type="name" id="name" placeholder="Nombre..." required
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition duration-150"
                    wire:model.defer="name"
                    />
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-800">
                    Correo electrónico
                </label>
                <input type="email" id="email" placeholder="correo@ejemplo.com" required
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition duration-150"
                    wire:model.defer="email"
                    />
            </div>

            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-800">
                    Contraseña
                </label>
                <div class="flex relative gap-2">

                    <input :type="show ? 'text' : 'password'" wire:model.defer="password"
                        placeholder="******** (dejar vacío para no cambiar)"
                        class="flex-1 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition duration-150" />

                    <button type="button" @click="show = !show"
                        class="bg-gray-200 px-2 rounded-lg hover:bg-gray-300 text-gray-700 transition duration-150">
                        <span x-text="show ? '🙈' : '👁️'"></span>
                    </button>

                    <button type="button" @click="generate(); @this.set('password', password)"
                        class="bg-pink-700 text-white px-3 rounded-lg hover:bg-pink-800 ...">
                        Generar
                    </button>

                </div>
            </div>

            <div>
                <label for="role" class="block mb-2 text-sm font-medium text-gray-800">
                    Rol del usuario
                </label>
                <select id="role" required
                    wire:model.defer="selectedRole"
                    class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-3 transition duration-150">
                    <option value="">Seleccione un rol</option>
                    @foreach($roles as $roleName)
                        <option value="{{ $roleName }}">{{ $roleName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="flex-1 text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-150">
                    Actualizar Usuario
                </button>
                <a href="{{ route('dashboard') }}"
                    class="flex-1 text-white bg-gray-400 hover:bg-gray-500 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-3 text-center transition duration-150">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <script>
        function passwordGenerator() {
            return {
                password: '',
                show: false,
                generate() {
                    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+';
                    let pass = '';
                    for (let i = 0; i < 12; i++) {
                        pass += chars.charAt(Math.floor(Math.random() * chars.length));
                    }
                    this.password = pass;
                }
            }
        }
    </script>
</div>
