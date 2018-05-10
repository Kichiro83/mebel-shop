@extends('layouts.main')
@section('content')
    <h3>Форма добавления товара</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label id="name">Название</label>
            <input type="text"  class=" form-control" name="title" id="name">
            <label id="description">Описание</label>
            <input type="text"  class=" form-control" name="description" id="description">
            <label id="price">Цена</label>
            <input type="text"  class=" form-control" name="price" id="price">
            <select name="categories">
                <option value="1">Мебель для кухни</option>
                <option value="2">Мягкая мебель</option>
                <option value="5">Мебель для спальни</option>
                <option value="7">Мебель для деской</option>
            </select>

            <label id="foto">Фото</label>
            <input type="file"  class=" form-control" name="foto" id="foto">
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