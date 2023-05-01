<!DOCTYPE html>
<html class="h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Cliente</title>

</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 text-white">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">{{ $cliente['nombre'] }}</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Información del Cliente</p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Código de Cliente</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $cliente['codigoCliente'] }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Nombre</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $cliente['nombre'] }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $cliente['telefono'] }}
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Correo</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $cliente['correo'] }}
                        </dd>
                    </div>
                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                        <p>
                            <a href="{{ route('cliente.index') }}"
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
        <h3>{{ $cliente['nombre'] }}</h3>

        <div class="mt-8 bg-white dark:bg-gray-200 overflow-hidden shadow sm:rounded-lg">

            <div class="grid grid-cols-1 md:grid-cols-2">

                <div class="p-6">

                    <table class="table">
                        <thead>
                            <th scope="col">Codigo</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                        </thead>
                        <tbody>


                            <tr>
                                <td>{{ $cliente['codigoCliente'] }}</td>
                                <td>{{ $cliente['nombre'] }}</td>
                                <td>{{ $cliente['telefono'] }}</td>
                                <td>{{ $cliente['correo'] }}</td>

                            </tr>

                        </tbody>
                    </table>


                    <a href="{{ route('cliente.index') }}" class="btn btn-info">Regresar</a>
                </div>

            </div>
        </div>
    </div>
    !-->
</body>

</html>
