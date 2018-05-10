@extends('layouts.main')

@section('title')
    Mebel shop
@endsection
@section('content')
    <div class="category">
    @foreach($products->chunk(3) as $productChunk)
        <div class="row" >
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{asset("/storage/images/".$product->imagePath)}}" alt="...">
                        <div class="caption image-responsive">
                            <h3>{{$product->title}}</h3>
                            <p class="description">{{$product->description}}</p>
                            <div class="clearfix">
                                <div class="pull-left price"> {{$product->price}} грн</div>
                                <a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn btn-success pull-right" role="button">Добавить</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    </div>
 @endsection