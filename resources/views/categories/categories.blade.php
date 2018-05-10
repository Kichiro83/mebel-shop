@extends('layouts.main')
@section('title')
    Mebel shop
@endsection
@section('content')
    @foreach($categories->chunk(3) as $categoryChunk)
        <div class="row" style="margin-bottom: 25px;">
            @foreach($categoryChunk as $category)
                <div class="col-sm-6 col-md-4">
                    <div class="btn btn-default category">
                        <a href="{{route('category.profile',['categories_id'=>$category->id])}}" >{{$category->name}}</a>

                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
    @endsection