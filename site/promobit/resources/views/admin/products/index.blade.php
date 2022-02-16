@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-4">Criar Produto</a>
        <a type="button" class="btn btn-secondary mt-4 float-end"  href="{{route('admin.dashboard')}}">Volta</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr style="font-size: 15px">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td width="15%">
                        <div class="btn-group">
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary" href="{{ route('admin.products.edit', $product->id) }}">Editar</a>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

