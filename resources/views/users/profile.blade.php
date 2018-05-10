@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <h1>Личный  кабинет: {{ Auth::user()->name }}</h1>
            <hr>
            <h2>Мои заказы</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($order->cart->items as $item)
                            <li class="list-group-item">
                                <span>{{$item['item']['title']}} | {{$item['qty']}} шт</span>
                                <span class="badge">{{ $item['price'] }} грн </span>

                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="panel-footer">
                    <strong>Итого: {{ $order->cart->totalPrice }} </strong>
                    <a href="{{ route('deleteOrder',['id'=>$order->id]) }}" class="btn btn-danger">Удалить</a>
                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection