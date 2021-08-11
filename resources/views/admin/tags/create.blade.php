@extends('master.admin')
@section('title')
    {{$title}}
@endsection
@section('link')
    {{route('tags.create')}}
@endsection

@section('content')
    <div class="col">
        <form class="form-group" method="post" action="{{route('tags.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <lable for="title">تایتل</lable>
                <input for="title" placeholder="تگ های شما" type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <lable for="title">توضیحات</lable>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <lable>تصویر شاخص</lable>
                <input name="pic" class="form-control" type="file">
            </div>
            <div class="form-group">
                <lable> اضافه کردن</lable>
                <input type="submit" class="form-control btn btn-outline-success" value="ارسال">
            </div>
        </form>
    </div>
@endsection
