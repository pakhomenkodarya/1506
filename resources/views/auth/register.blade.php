@extends('layouts.app')
@section('title','Регистрация')
@section('main')
<!--Start success-->
    @if(session('error'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="Alert">
    {{session('error')}}
    
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  id="closeBtn"></button>
    </div>
    @endif<!--End success-->
    <!--Start success-->
    @if($errors->any())
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="Alert">
        @foreach($errors->all() as $error)
    {{$error}}<br>
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  id="closeBtn"></button>
    </div>
    @endif<!--End success-->
<h2>Регистрация</h2>
<form action="{{route('register')}}" method="post">
    @csrf
    <div class="mb-3">
    <label class="form-label">Логин</label>
    <input type="text" name="login" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">ФИО</label>
    <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Адрес</label>
    <input type="text" name="addres" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Телефон</label>
    <input type="tel" name="tel" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control">
    </div>
    <button type="submit" class="btn btn-light">Зарегистрироваться</button>
    <p class="centerp">Уже есть аккаунт?<a href="{{route('login')}}">Войти</a></p>
</form>
@endsection