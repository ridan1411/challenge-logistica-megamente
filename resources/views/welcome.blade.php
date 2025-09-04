<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div>
            <div>
                <nav class="bg-white border-gray-200 dark:bg-gray-900">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="{{ Vite::asset('resources/images/challenge_icon.svg') }}" class="h-10"
                                alt="Challenge Carlos Ridan Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LTIN.
                                CARLOS RIDAN
                            </span>
                        </a>

                        <div class="flex md:order-2">
                            <div class="relative hidden md:block">
                                <div class="">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                            aria-current="page">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="inline-flex py-2 px-3 text-gray-900 rounded-sm hover:bg-pink-100 md:hover:bg-transparent md:hover:text-pink-700 md:p-0 md:dark:hover:text-pink-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="white" class="bi bi-box-arrow-in-right mr-2" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                            </svg>
                                            Iniciar Sesión
                                        </a>
                                    @endauth
                                </div>
                            </div>
                            <button data-collapse-toggle="navbar-search" type="button"
                                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                aria-controls="navbar-search" aria-expanded="false">
                                <span class="sr-only">Menú</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                        </div>
                        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                            id="navbar-search">
                            <ul
                                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-3 text-white bg-pink-700 rounded-sm md:bg-transparent md:text-pink-700 md:p-0 md:dark:text-pink-500"
                                        aria-current="page">Home</a>
                                </li>
                            </ul>
                            <div class="relative mt-3 md:hidden justify-end text-right">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                                        aria-current="page">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Iniciar
                                        Sesión</a>

                                @endauth
                            </div>
                        </div>
                    </div>
                </nav>
                <main class="relative min-h-screen bg-gray-50">
                    <section class="sm:flex sm:items-center sm:justify-center py-4 sm:py-12 lg:py-16">
                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div class="mt-6 text-center">
                                <h1
                                    class="text-4xl font-bold text-gray-900 dark:text-dark sm:text-5xl md:text-6xl lg:text-7xl">
                                    Bienvenido a mi Challenge.
                                </h1>
                                <p class="mt-6 text-lg text-gray-600 dark:text-gray-600">
                                    Este es el desafío técnico para la posición de desarrollador backend en Logística
                                    Megamente desarrollado por Lic. Carlos A. Ridan Jardines.
                                </p>
                                <div class="mt-6">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                            class="inline-block px-5 py-3 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                            Ir al Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="inline-block px-5 py-3 font-medium text-white bg-pink-600 rounded-lg hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                            Iniciar Sesión
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                                <h2 id="accordion-flush-heading-1">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                        data-accordion-target="#accordion-flush-body-1" aria-expanded="false"
                                        aria-controls="accordion-flush-body-1">
                                        <span>Introducción</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="false"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                    <div class="py-5 border-b border-dark-200 dark:border-dark-700">
                                        <p class="mb-2 text-dark-500 dark:text-dark-400">
                                            Este documento tiene como objetivo presentar el reto técnico “challenge” desarrollado por el Lic. Carlos Alberto Ridan Jardines
                                            y qué es propuesto por la empresa Logística Megamente que servirá como elemento en la preselección de candidatos para el puesto de
                                            Programador Web.
                                        </p>
                                    </div>
                                </div>
                                <h2 id="accordion-flush-heading-2">
                                    <button type="button"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3"
                                        data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                        aria-controls="accordion-flush-body-1">
                                        <span>Objetivo</span>
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="false"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                                    <div class="py-5 border-b border-pink-200 dark:border-pink-700">
                                        <p class="mb-2 text-pink-500 dark:text-pink-400">
                                            Construir un sistema web desde cero que permita:
                                            <ul class="list-disc list-inside mt-2">
                                                <li>Iniciar sesión con credenciales.</li>
                                                <li>Administrar usuarios mediante un CRUD (crear, leer, actualizar, eliminar).</li>
                                                <li>Manejar roles de acceso (Administrador / Usuario).</li>
                                            </ul>
                                        </p>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </section>

                </main>

                <footer class="bg-white rounded-lg shadow-sm m-4 dark:bg-gray-800">
                    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
                        <span class="text-sm text-pink-500 sm:text-center dark:text-pink-400">© 2023 <a
                                href="https://flowbite.com/" class="hover:underline">Mi Challenge LTIN Carlos Ridan -
                                Logística Megamente</a>. All Rights Reserved.
                        </span>
                        <ul
                            class="flex flex-wrap items-center mt-3 text-sm font-medium text-pink-500 dark:text-pink-400 sm:mt-0">
                            <li>
                                <a href="/" class="hover:underline me-4 md:me-6">Home</a>
                            </li>
                        </ul>
                    </div>
                </footer>

            </div>
        </div>
    </div>
</body>

</html>
