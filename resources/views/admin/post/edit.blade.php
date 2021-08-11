@extends('master.admin')
@section('title')
    {{$title}}
@endsection
@section('link')
    {{route('post.create')}}
@endsection

@section('content')
    <div class="col">
        <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="form-control-label" for="input-address">تایتل</label>
                <input name="title" id="input-address" class="form-control" value="{{$post->title}}" type="text">
            </div>

            <div class="form-group">
                <label class="form-control-label" for="input-address">تصویر</label>
                <input name="pic" id="input-address" class="form-control" value="{{$post->pic}}" type="file">
            </div>
            <div class="form-group">
                <label class="form-control-label">نوشته شما </label>
                <textarea name="body" rows="4" class="form-control"> {{$post->body}}</textarea>
            </div>
            <div class="form-check">
                <input @if($post->status == 1)checked @endif class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" >
                <label class="form-check-label" for="exampleRadios1">
                    ارسال
                </label>
            </div>
            <div class="form-check">
                <input @if($post->status == 0)checked @endif class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
                <label  class="form-check-label" for="exampleRadios2">
                    پیش نویس
                </label>
            </div>
            <div class="form-check">
                <input type="submit" class="btn btn-outline-success" value="ارسال پست">
            </div>

        </form>
@endsection
