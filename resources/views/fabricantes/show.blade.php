<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Fabricantes</title>

</head>

<body>

    <body class="h-full">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 text-white">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="px-4 sm:px-0">
                    <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $fabricante['descripcion'] }}</h3>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Información del Fabricante</p>
                </div>
                <div class="mt-6 border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Código de Fabricante</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $fabricante['codigoFabricante'] }}</dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Descripción</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $fabricante['descripcion'] }}
                            </dd>
                        </div>
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-gray-900">Fecha de inicio de Operación</dt>
                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                {{ $fabricante['fechaInicioOperacion'] }}
                            </dd>
                        </div>
                        <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                            <p>
                                <a href="{{ route('fabricante.index') }}"
                                    class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Regresar
                                    <span aria-hidden="true"> &rarr;</span>
                                </a>
                            </p>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    <!--
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h3>{{ $fabricante['descripcion'] }}</h3>
        <div class="mt-8 bg-white dark:bg-gray-200 overflow-hidden shadow sm:rounded-lg">

            <div class="grid grid-cols-1 md:grid-cols-2">

                <div class="p-6">

                    <table class="table">
                        <thead>
                            <th scope="col">Codigo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fecha de inicio de operacion</th>
                        </thead>
                        <tbody>


                            <tr>
                                <td>{{ $fabricante['codigoFabricante'] }}</td>
                                <td>{{ $fabricante['descripcion'] }}</td>
                                <td>{{ $fabricante['fechaInicioOperacion'] }}</td>

                            </tr>

                        </tbody>
                    </table>


                    <a href="{{ route('fabricante.index') }}" class="btn btn-info">Regresar</a>
                </div>
            </div>
        </div>
    </div>
!-->

</body>

</html>
