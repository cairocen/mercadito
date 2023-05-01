<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Productos</title>

</head>

<body>

    <div class="pointer-events-none relative inset-y-auto inset-x-96 flex max-w-full pl-10">
        <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                    <div class="flex items-center justify-center">
                        <h2 class="text-3xl font-medium text-gray-900" id="slide-over-title">Productos</h2>
                    </div>

                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                @foreach ($productos as $producto)
                                    <li class="flex py-6">
                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <h3>
                                                        <a href="{{ route('producto.show', $producto['codigoProducto']) }}">{{ $producto['descripcion'] }}</a>
                                                    </h3>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">
                                                    {{ $producto['codigoProducto'] }}</p>
                                            </div>
                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                <a href="{{ route('producto.edit', $producto['codigoProducto']) }}"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Editar</a>
                                                    <div class="flex">
                                                        <form
                                                            action="{{ route('producto.delete', $producto['codigoProducto']) }}"
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
                        <a href="{{ route('producto.new') }}"
                            class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Agregar
                            Nuevo Producto</a>
                    </div>
                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                        <p>
                            o
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
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <h2>Productos</h2>

        <div class="mt-8 bg-white dark:bg-gray-200 overflow-hidden shadow sm:rounded-lg">

            <div class="grid grid-cols-1 md:grid-cols-2">

                <div class="p-6">

                    <p>
                        <a href="{{ route('producto.new') }}" class="btn btn-primary">Agregar nuevo</a>
                    </p>

                    <table class="table">
                        <thead>
                            <th scope="col">Codigo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Pais</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Ver detalles</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Agregar compradores</th>
                        </thead>
                        <tbody>

                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto['codigoProducto'] }}</td>
                                    <td>{{ $producto['descripcion'] }}</td>
                                    <td>{{ $producto['pais'] }}</td>
                                    <td>{{ $producto['precio'] }}</td>
                                    <td>
                                        <a href="{{ route('producto.show', $producto['codigoProducto']) }}">
                                            ir
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('producto.edit', $producto['codigoProducto']) }}">
                                            editar
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('producto.delete', $producto['codigoProducto']) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">eliminar</button>

                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('producto.buyer', $producto['codigoProducto']) }}">
                                            ir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
-->

</body>

</html>
