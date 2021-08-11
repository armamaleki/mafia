@extends('master.admin')
@section('title')
    {{$title}}
@endsection
@section('link')
    {{route('post.create')}}
@endsection

@section('content')
        <div class="col">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-control-label" for="input-address">تایتل</label>
                    <input name="title" id="input-address" class="form-control" placeholder="تایتل" type="text">
                </div>

                <div class="form-group">
                    <label class="form-control-label" for="input-address">تصویر</label>
                    <input name="pic" id="input-address" class="form-control" type="file">
                </div>
                <div class="form-group">
                    <label class="form-control-label">نوشته شما </label>
                    <textarea name="body" rows="4" class="form-control"
                              placeholder="برنامه نویسی یکی از پر در امد ترین شغل های دنییاست.."></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
                    <label class="form-check-label" for="exampleRadios1">
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
@endsection
