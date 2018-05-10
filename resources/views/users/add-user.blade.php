@extends('layouts.main')
@section('content')
    <form action="" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label id="name">ФИО</label>
            <input type="text" class="form-control" id="name" name="name"/>
            <label id="email">Email</label>
            <input type="email" class="form-control " id="email"  name="email">
            <label id="phone">Телефон</label>
            <input type="tel" name="phone" id="phone" class ="form-control" >
            <label id="adress">Адрес</label>
            <input type="text" name="adress" id="adress" class ="form-control">
            <label id="password">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <input type="submit" class="btn btn-primary ">

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