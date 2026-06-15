@extends('layouts.app')
@section('title','Вход')
@section('main')
<!--Start success-->
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Alert">
    {{session('error')}}
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  id="closeBtn"></button>
    </div>
    @endif<!--End success-->
    <!--Start success-->
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Alert">
        @foreach($errors->all() as $error)
    {{$error}}<br>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  id="closeBtn"></button>
    </div>
    @endif<!--End success-->
<h2>Вход</h2>
<form action="{{route('login')}}" method="post">
    @csrf
    <div class="mb-3">
    <label class="form-label">Логин</label>
    <input type="text" name="login" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-light">Войти</button>
    <p class="centerp">Еще не зарегистрированы?<a href="{{route('register')}}" class="a">Создать аккаунт</a></p>
</form>
@endsection