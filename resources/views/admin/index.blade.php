@extends('layouts.app')
@section('title','Админ-панель')
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
<h2>Админ-панель</h2>
@if($appointments->count()>0)
<table class="table">
  <thead>
    <tr>
      <th>Клиент</th><th>Категория</th><th>Бренд</th><th>Номер</th><th>Проблема</th><th>Метод получения</th><th>Статус</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appointments as $a)
    <tr>
        <td>{{$a->user->name}}</td>
      <td>{{$a->category}}</td>
      <td>{{$a->brand}}</td>
      <td>{{$a->number}}</td>
      <td>{{$a->problem}}</td>
      <td>{{$a->method}}</td>
      <td>
        <form action="{{route('admin.updateStatus',$a)}}" method="post">
            @csrf
            @method('PUT')
            <select class="form-select" name="status">
            <option value="Новая"{{$a->status=='Новая'?'selected':''}}>Новая</option>
            <option value="Диагностика"{{$a->status=='Диагностика'?'selected':''}}>Диагностика</option>
            <option value="В работе"{{$a->status=='В работе'?'selected':''}}>В работе</option>
            <option value="Готово к выдаче"{{$a->status=='Готово к выдаче'?'selected':''}}>Готово к выдаче</option>
            </select>
            <button type="submit" class="btn btn-light">Сохранить</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<p class="centerp">Нет заявок.</p>
@endif
@endsection