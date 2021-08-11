@extends('master.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="col">
        <form action="{{route('caffe.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-control-label" for="input-address">تایتل</label>
                <input name="title" id="input-address" class="form-control" placeholder="تایتل" type="text">
            </div>
            <div class="form-group">
                <label class="form-control-label" for="input-address">نام کاف</label>
                <input name="name" id="input-address" class="form-control" placeholder="نام کافه" type="text">
            </div>
            <div class="form-group">
                <label class="form-control-label" for="input-address">ادرس کافه</label>
                <input name="address" id="input-address" class="form-control" placeholder="ادرس کافه" type="text">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="input-address">شماره تلفن کافه</label>
                <input name="phone" id="input-address" class="form-control" placeholder="شماره تلفن کافه" type="text">
            </div>


            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="1">
                <label class="form-check-label" for="exampleRadios2">
                    ارسال
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                <label class="form-check-label" for="exampleRadios2">
                    پیش نویس
                </label>
            </div>
            <div class="form-check">
                <input type="submit" class="btn btn-outline-success" value="ارسال پست">
            </div>

        </form>
    </div>
@endsection
