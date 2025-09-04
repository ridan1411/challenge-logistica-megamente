<!-- Modal de confirmación Delete -->
<div x-data="{ open: @entangle('confirmingDelete') }">
    <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg max-w-sm w-full p-6">
            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-100 mb-4">
                Confirmar eliminación
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                ¿Estás seguro de que deseas eliminar al usuario
                <span class="font-semibold">{{ $selectedUser ? $selectedUser->name : '' }}</span>?
                Esta acción no se puede deshacer.
            </p>
            <div class="flex justify-end space-x-3">
                <button @click="open = false; $wire.cancelDelete()"
                        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Cancelar
                </button>
                <button wire:click="deleteUser"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                    Eliminar
                </button>
            </div>
        </div>
    </div>
</div>
