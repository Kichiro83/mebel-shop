@extends('layouts.main')
@section('content')
    <h2>Форма редактирования пользователя</h2>
    <form action="" method="POST" action="{{route('editUser', ['id' => $user->id ])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group form">
            <label id="name">ФИО</label>
            <input type="text" name="name" class ="form-control" id="name" value="{{$user->name}}"/>
            <label id="email">Email</label>
            <input type="email" name="email" id="email" class ="form-control" value="{{$user->email}}">
            <label id="phone">Телефон</label>
            <input type="tel" name="phone" id="phone" class ="form-control" value="{{$user->phone}}">
            <label id="adress">Адрес</label>
            <input type="text" name="adress" id="adress" class ="form-control" value="{{$user->adress}}">
            <label id="password">Пароль</label>
            <input type="text" name="password" id="password" class ="form-control" value="{{$user->password}}">
        </div>
            <input type="submit" class="btn btn-primary">

    </form>
    @if ($errors->any())
        <div >
            <ul style="color:red;font-size:16px;list-style-type:none">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection