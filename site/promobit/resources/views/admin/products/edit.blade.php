@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Atualizar Produto</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nome Produto</label>
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select name="tags[]" id="" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}"
                                @if($product->tags->contains($tag)) selected @endif
                        >{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-lg btn-primary">Atualizar Produto</button>
                <a type="button" class="btn btn-lg btn-secondary float-end"  href="{{ route('admin.products.index') }}">Volta</a>
            </div>
        </form>
    </div>
@endsection
