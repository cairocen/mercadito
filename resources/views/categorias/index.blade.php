<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Categorías</title>
</head>

<body>
    <div class="pointer-events-none relative inset-y-auto inset-x-96 flex max-w-full pl-10">
        <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                    <div class="flex items-center justify-center">
                        <h2 class="text-3xl font-medium text-gray-900" id="slide-over-title">Categorías</h2>
                    </div>

                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                @foreach ($categorias as $categoria)
                                    <li class="flex py-6">
                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="#">{{ $categoria['descripcion'] }}</a>
                                                    </h3>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $categoria['codigoCategoria'] }}</p>
                                            </div>
                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                <a href="{{ route('categoria.edit', $categoria['codigoCategoria']) }}"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Editar</a>
                                                    <div class="flex">
                                                        <form
                                                            action="{{ route('categoria.delete', $categoria['codigoCategoria']) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="font-medium text-indigo-600 hover:text-indigo-500">Eliminar</button>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <!-- More products... -->
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                    <div class="mt-6">
                        <a href="{{ route('categoria.new') }}"
                            class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Agregar
                            Nueva Categoría de Producto</a>
                    </div>
                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                        <p>
                            or
                            <a href="{{route('welcome')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Regresar
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
        <div>
            <h2>Categorías</h2>
            <div class="mt-8 bg-white dark:bg-gray-200 overflow-hidden shadow sm:rounded-lg">
                <div>
                    <div>
                    <p>
                        <a href="{{ route('categoria.new') }}" class="btn btn-primary">Agregar nuevo</a>
                    </p>
                    <table class="table-auto">
                        <thead>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </thead>
                        <tbody>
                               @foreach ($categorias as $categoria)
<tr>
                                <td>{{ $categoria['codigoCategoria'] }}</td>
                                <td>{{ $categoria['descripcion'] }}</td>
                                <td>
                                    <a href="{{ route('categoria.edit', $categoria['codigoCategoria']) }}">
                                        Editar
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('categoria.delete', $categoria['codigoCategoria']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                         <button type="submit">Eliminar</button>
                                     </form>
                                </td>
                            </tr>
@endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    !-->
</body>

</html>
