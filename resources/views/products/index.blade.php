@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Productos</div>
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-primary">Editar</a>
                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td col-span="4">No se encontraton productos</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
