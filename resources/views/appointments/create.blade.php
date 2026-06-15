@extends('layouts.app')
@section('title','Создание заявки')
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
<h2>Создание заявки</h2>
<form action="{{route('appointments.store')}}" method="post">
    @csrf
    <select class="form-select" name="category">
    <option value="">Категория техники</option>
    <option value="Ноутбук">Ноутбук</option>
    <option value="Планшет">Планшет</option>
    <option value="Моноблок">Моноблок</option>
    </select>
    <select class="form-select" name="brand">
    <option value="">Бренд</option>
    <option value="Apple">Apple</option>
    <option value="Samsung">Samsung</option>
    <option value="Huawei">Huawei</option>
    <option value="Lenovo">Lenovo</option>
    <option value="Asus">Asus</option>
    </select>
    <div class="mb-3">
    <label class="form-label">Серийный номер устройства</label>
    <input type="text" name="number" class="form-control">
    </div>
    <div class="mb-3">
    <label class="form-label">Опишите поломку</label>
    <input type="text" name="problem" class="form-control">
    </div>
   <select class="form-select" name="method">
    <option value="">Способ получения</option>
    <option value="Самовывоз">Самовывоз</option>
    <option value="Доставка курьером">Доставка курьером</option>
    </select>
    <button type="submit" class="btn btn-light">Отправить</button>
</form>
@endsection