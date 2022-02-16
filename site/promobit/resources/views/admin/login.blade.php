@extends('layouts.app')

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

@section('content')
<form class="form-signin" method="post" action="{{route('admin.login.do')}}">
    @csrf
    <img class="mb-4" src="https://www.w3schools.com/howto/img_avatar2.png" alt="">

    @if($errors->all())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
            </div>
        @endforeach
    @endif

    <h1 class="h3 mb-3 font-weight-normal text-center">Login</h1>

    <label for="email" class="sr-only">Email</label>
    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus>

    <label for="password" class="sr-only">Senha</label>
    <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Senha" required>

    <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Entrar</button>
    <p class="mt-4 mb-3 text-muted text-center">&copy; Promobit 2022</p>
</form>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection
