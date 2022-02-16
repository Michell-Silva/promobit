@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Atualizar Tag</h1>
        <form action="{{route('admin.tags.update', ['tag' => $tag->id])}}" method="post">
            @csrf
            @method("PUT")

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$tag->name}}">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-lg mt-3 btn-primary">Atualizar Tag</button>
                <a type="button" class="btn btn-lg mt-3 btn-secondary float-end"  href="{{ route('admin.tags.index') }}">Volta</a>

            </div>
        </form>
    </div>
@endsection
