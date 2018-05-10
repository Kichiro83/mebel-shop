@extends('layouts.main')
@section('content')

     <table class="table">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>phone</td>
            <td>adress</td>
            <td>password</td>
            <td>created_at</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->adress}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->created_at}}</td>
                <td><a href="{{route('editUser',['id'=>$user->id])}}" class="btn btn-primary btn-up" >Редактировать</a></td>
                <td><a href="{{route('deleteUser',['id'=>$user->id])}}" class="btn btn-danger btn-up">Удалить</a></td>

            </tr>
        @endforeach
    </table>

@endsection
