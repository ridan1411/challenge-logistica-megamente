<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-900 dark:text-gray-900">
        <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-900">
            <tr>
                <th scope="col" class="px-4 py-3">Usuario</th>
                <th scope="col" class="px-4 py-3">Rol</th>
                <th scope="col" class="px-4 py-3">Creado</th>
                <th scope="col" class="px-4 py-3">Editado</th>
                <th scope="col" class="px-4 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @php
                    $uuid = 'user-'.$user->id;
                @endphp
                <tr class="border-b dark:border-gray-200" wire:key="{{ $uuid }}">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                        {{ $user->name }}</th>
                    <td class="px-4 py-3">
                        {{ $user->getRoleNames()->isNotEmpty() ? $user->getRoleNames()->first() : 'Sin rol asignado' }}
                    </td>
                    <td class="px-4 py-3">{{ $user->created_at }}</td>
                    <td class="px-4 py-3">{{ $user->updated_at }}</td>

                    <td class="px-4 py-3 flex items-center justify-end space-x-2">
                        <!-- Show -->
                        <a href="{{ route('admin.users.show', $user->id) }}"
                            class="text-blue-500 hover:text-blue-700"
                            title="Mostrar usuario">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('admin.users.edit', $user->id) }}"
                            class="text-green-500 hover:text-green-700"
                            title="Editar usuario">

                            <svg class="w-6 h-6 text-green-800 dark:text-pink" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>

                        </a>

                        @if(auth()->user()->hasRole('Administrador'))
                            <button type="button"
                                    class="text-red-500 hover:text-red-700"
                                    title="Eliminar usuario"
                                    wire:click.prevent="confirmDelete({{ $user->id }})">
                                <svg class="w-6 h-6 text-red-800 dark:text-red" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </button>
                        @else
                            <button type="button"
                                    class="text-gray-300 cursor-not-allowed"
                                    title="No tienes permiso para eliminar usuarios"
                                    disabled>
                                <svg class="w-6 h-6 text-gray-300 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </button>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $users->links('components.admin.users.pagination') }}
@include('components.admin.modals.confirmation-delete')
