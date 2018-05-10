@extends('layouts.main')
@section('content')

    <table class="table">
        <tr>
            <td>id</td>
            <td>title</td>
            <td>unit</td>
            <td>price</td>
            <td>user_id</td>

            <td></td>
            <td></td>
        </tr>
        @foreach($orders as $order)

            @foreach($order->cart->items as $item)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$item['item']['title']}}</td>
                <td>{{$item['qty']}}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{$order->user_id}}</td>
            </tr>
            @endforeach
        @endforeach
    </table>

@endsection