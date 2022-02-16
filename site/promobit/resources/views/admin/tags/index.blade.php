@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="container">
            <a href="{{route('admin.tags.create')}}" class="btn btn-primary mt-2">Criar Tags</a>
            <a type="button" class="btn btn-secondary mt-2 float-end"  href="{{ route('admin.dashboard') }}">Volta</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td width="15%">

                        <div class="btn-group">
                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-primary" href="{{ route('admin.tags.edit', $tag->id) }}">Editar</a>
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
