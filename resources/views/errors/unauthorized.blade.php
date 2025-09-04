<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso No Autorizado</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md text-center">
        <svg class="mx-auto mb-4 w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M4.93 4.93a10 10 0 1114.14 14.14A10 10 0 014.93 4.93z" />
        </svg>

        <h1 class="text-2xl font-bold mb-2 text-gray-800">Acceso No Autorizado</h1>
        <p class="text-gray-600 mb-6">No tienes permisos para acceder a esta sección.</p>

        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center px-6 py-3 bg-pink-700 text-white font-medium rounded-lg hover:bg-pink-800 transition duration-150">
            Volver al Dashboard
        </a>
    </div>

</body>
</html>
