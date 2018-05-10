@extends('layouts.main')
@section('content')

    <table class="table">
        <tr>
            <td>id</td>
            <td>title</td>
            <td>description</td>
            <td>price</td>
            <td>imagePath</td>
            <td>created_at</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->imagePath}}</td>
                <td>{{$product->created_at}}</td>
                <td><a href="{{route('editProduct',['id'=>$product->id])}}" class="btn btn-primary btn-up" >Редактировать</a></td>
                <td><a href="{{route('deleteProduct',['id'=>$product->id])}}" class="btn btn-danger btn-up">Удалить</a></td>

            </tr>
        @endforeach
    </table>

@endsection
