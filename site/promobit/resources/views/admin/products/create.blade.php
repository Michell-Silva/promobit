@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 xmlns="http://www.w3.org/1999/html">Criar Produto</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-2 p-2">
                <label>Nome Produto</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group mt-2 p-2">
                <label>Tags</label>
                <select name="tags[]" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3 p-2">
                <button type="submit" class="btn btn-lg btn-primary">Criar Produto</button>
                <a type="button" class="btn btn-lg btn-secondary float-end"  href="{{ route('admin.products.index') }}">Volta</a>
            </div>

        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>
    <script>
        $('#price').maskMoney({prefix: '', allowNegative: false, thousands: '.', decimal: ','});
    </script>
@endsection
