@extends('master.admin')


@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="col">
        <form action="{{route('mafia.update',$game->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-control-label" for="input-address">موضوع</label>
                <input name="title" id="input-address" class="form-control" value="{{$game->title}}" type="text">
            </div>
            <div class="form-group">
                <label class="form-control-label">توضیحات</label>
                <textarea name="description" rows="4" class="form-control">{{$game->description}}</textarea>
            </div>

            <div class="form-check">
                <input @if($game->status == 1)checked @endif class="form-check-input" type="radio" value="1" name="status">
                <label class="form-check-label" for="flexRadioDefault1">
                    فعال
                </label>
            </div>
            <div class="form-check">
                <input @if($game->status == 0)checked @endif class="form-check-input" type="radio" name="status" value="0" >
                <label class="form-check-label">
                    غیر فعال
                </label>
            </div>
            <div class="form-group">
                <label class="form-control-label">قیمت</label>
                <input name="price" class="form-control" value="{{$game->price}}" type="number">
            </div>

            <div class="form-group">
                <label>تصویر برنامه</label>
                <input type="file" name="avatar" class="form-control-file">
            </div>
            <div class="form-group">
                <label class="form-control-label">تعداد نفرات برنامه</label>
                <input name="member" class="form-control" value="{{$game->member}}" type="number">
            </div>
            <div class="form-group">
                <label class="form-control-label">ساعت</label>
                <input name="time" class="form-control" value="{{$game->time}}" type="time">
            </div>
            <div class="form-group">
                <label>ویدو</label>
                <input type="file" name="movie" value="{{$game->movie}}" class="form-control-file">
            </div>
            <div class="form-group">
                <label>ارسال</label>
                <input type="submit" value="ارسال" class="btn btn-outline-success btn-block">
            </div>
        </form>
    </div>

@endsection
