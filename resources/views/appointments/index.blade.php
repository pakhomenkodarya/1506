@extends('layouts.app')
@section('title','Заявки')
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
<h2>Заявки</h2>
<div class="buttonc">
    <a class="btn btn-light" href="{{route('appointments.create')}}">Создать заявку.</a>
</div>
@if($appointments->count()>0)
<table class="table">
  <thead>
    <tr>
      <th>Категория</th><th>Бренд</th><th>Номер</th><th>Проблема</th><th>Метод получения</th><th>Статус</th><th>Отзыв</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appointments as $a)
    <tr>
      <td>{{$a->category}}</td>
      <td>{{$a->brand}}</td>
      <td>{{$a->number}}</td>
      <td>{{$a->problem}}</td>
      <td>{{$a->method}}</td>
      <td>{{$a->status}}</td>
      <td>
        @if($a->status==='Готово к выдаче')
        @if(!$a->review)
         <a class="btn btn-light" href="{{route('reviews.create')}}">Оставить отзыв</a>
        @else
        {{$a->review->review}}
        @endif
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p class="centerp">У вас нет заявок. <a class="a" href="{{route('appointments.create')}}">Создать первую заявку.</a></p>
@endif
@endsection