@extends('layouts.main')
@section('title')
    Mebel shop
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h1>Заказ оформлен</h1>
            <h4>Сумма к оплате: {{$total}} грн</h4>
        </div>
    </div>
@endsection