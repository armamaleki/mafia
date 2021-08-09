@extends('master.admin')


@section('title')
    {{$title}}
@endsection

@section('content')

<div class="col">
    <form action="{{route('mafia.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-control-label" for="input-address">موضوع</label>
            <input name="title" id="input-address" class="form-control" placeholder="موضوع" type="text">
        </div>
        <div class="form-group">
            <label class="form-control-label">توضیحات</label>
            <textarea name="description" rows="4" class="form-control"></textarea>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" value="1" name="status">
            <label class="form-check-label" for="flexRadioDefault1">
                فعال
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" value="0" checked>
            <label class="form-check-label">
                غیر فعال
            </label>
        </div>
        <div class="form-group">
            <label class="form-control-label">قیمت</label>
            <input name="price" class="form-control" placeholder="قیمت" type="number">
        </div>

        <div class="form-group">
            <label>تصویر برنامه</label>
            <input type="file" name="avatar" class="form-control-file">
        </div>
        <div class="form-group">
            <label class="form-control-label">تعداد نفرات برنامه</label>
            <input name="member" class="form-control" placeholder="تعداد اعضاء" type="number">
        </div>
        <div class="form-group">
            <label class="form-control-label">ساعت</label>
            <input name="time" class="form-control" placeholder="تعداد اعضاء" type="time">
        </div>
        <div class="form-group">
            <label>ویدو</label>
            <input type="file" name="movie" class="form-control-file">
        </div>
        <div class="form-group">
            <label>ارسال</label>
            <input type="submit" value="ارسال" class="btn btn-outline-success btn-block">
        </div>
    </form>
</div>

@endsection
