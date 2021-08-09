@extends('master.admin')


@section('title')
    {{$title}}
@endsection
@section('link')
    {{route('menu.create')}}
@endsection

@section('content')
    <div class="col">
        <form action="{{route('menu.update' , $menus->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="exampleInputEmail1">محصول</label>
                <input type="text" name="product" class="form-control" id="" value="{{$menus->product}}">
                <small id="emailHelp" class="form-text text-muted">نام محصول مورد نظر خود را وارد کنید</small>
            </div>
            <div class="form-group">
                <label for="">توضیحات مربوط به هر محصول</label>
                <textarea name="product_discretion" class="form-control" id=""
                          rows="3"> {{$menus->product_discretion}}</textarea>
            </div>
            <div class="form-group">
                <label for="">تصویر محصولات</label>
                <input type="file" name="product_pic" class="form-control-file" id="">
            </div>
            <div class="form-group">
                <label for="">بک گراند منو</label>
                <input type="file" name="image" class="form-control-file" id="">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">قیمت</label>
                <input type="text" name="price" class="form-control" id="" value="{{$menus->price}}">
                <small id="emailHelp" class="form-text text-muted">قیمت هر محصول را وارد کنید</small>
            </div>
            <div class="form-check">
                <input @if($menus->status == 1)checked @endif class="form-check-input" type="radio" name="status" id=""
                       value="1">
                <label class="form-check-label" for="">
                    فعال
                </label>
            </div>
            <div class="form-check">
                <input @if($menus->status == 0)checked @endif class="form-check-input" type="radio" name="status" id=""
                       value="0">
                <label class="form-check-label" for="">
                    غیر فعال
                </label>
            </div>
            <div class="form-gro">
                <input class="btn btn-outline-success btn-block" type="submit" value="ارسال منو">
            </div>
        </form>
    </div>
@endsection

