@extends('master.admin')

@section('title')
    ویرایش کافه
@endsection

@section('content')
    <form action="{{route('caffe.update',$caffe->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-control-label" for="input-address">تایتل</label>
            <input name="title" id="input-address" class="form-control" value="{{$caffe->title}}" type="text">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="input-address">نام کاف</label>
            <input name="name" id="input-address" class="form-control"  value="{{$caffe->name}}" type="text">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="input-address">ادرس کافه</label>
            <input name="address" id="input-address" class="form-control" value="{{$caffe->address}}" type="text">
        </div>

        <div class="form-group">
            <label class="form-control-label" for="input-address">شماره تلفن کافه</label>
            <input name="phone" id="input-address" class="form-control" value="{{$caffe->phone}}" type="text">
        </div>


        <div class="form-check">

            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0"  @if($caffe->status == 0) checked="checked" @endif>
            <label   class="form-check-label" for="exampleRadios2">
                پیش نویس
            </label>

            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" @if($caffe->status == 1) checked="checked" @endif >
            <label class="form-check-label" for="exampleRadios1">
                ارسال
            </label>

        </div>
        <div class="form-check">
            <input type="submit" class="btn btn-outline-success" value="ارسال پست">
        </div>

    </form>
@endsection
