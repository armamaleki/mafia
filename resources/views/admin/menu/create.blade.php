@extends('master.admin')


@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="col">
        <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">محصول</label>
                <input type="text" name="product" class="form-control" id=""
                       placeholder="چای ساده">
                <small id="emailHelp" class="form-text text-muted">نام محصول مورد نظر خود را وارد کنید</small>
            </div>
            <div class="form-group">
                <label for="">توضیحات مربوط به هر محصول</label>
                <textarea name="product_discretion" class="form-control" id="" rows="3"></textarea>
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
                <input type="text" name="price" class="form-control" id="" aria-describedby="emailHelp"
                       placeholder="12.000">
                <small id="emailHelp" class="form-text text-muted">قیمت هر محصول را وارد کنید</small>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="" value="1">
                <label class="form-check-label" for="">
                    active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="" value="0" checked>
                <label class="form-check-label" for="">
                    de active
                </label>
            </div>
            <div class="form-gro">
                <input class="btn btn-outline-success btn-block" type="submit" value="ارسال منو">
            </div>
        </form>
    </div>
    @endsection

