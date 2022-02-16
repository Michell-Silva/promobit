@extends('layouts.app')

<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

@section('content')

    <!-- The sidebar -->
    <div class="sidebar">
        <a class="@if(request()->is('admin')) active @endif" href="{{route('admin.dashboard')}}">Home</a>
        <a href="{{route('admin.products.index')}}">Produtos</a>
        <a href="{{route('admin.tags.index')}}">Tags</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <h1 class="text-center">Paínel Administrativo</h1>
        <hr>
       <h2>Bem vindo, <span style="color: cornflowerblue">{{ Auth::user()->name }}</span></h2>
    </div>
@endsection
