@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar tag</h1>
        <form action="{{route('admin.tags.store')}}" method="post">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                @error('name') <div class="invalid-feedback"> {{$message}} </div> @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-lg btn-primary mt-3">Criar Tag</button>
                <a type="button" class="btn btn-lg mt-3 btn-secondary float-end"  href="{{ route('admin.tags.index') }}">Volta</a>

            </div>
        </form>
    </div>
@endsection
