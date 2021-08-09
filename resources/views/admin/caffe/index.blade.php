@extends('master.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="col-6">
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
    <div class="col-6">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">شماره</th>
                <th scope="col">برگذار کننده</th>
                <th scope="col">تایتل</th>
                <th scope="col">نام</th>
                <th scope="col">ادرس</th>
                <th scope="col">وضعیت</th>
                <th scope="col">پاک کردن</th>
                <th scope="col">ادیت کردن</th>
            </tr>
            </thead>
            <tbody>
            @foreach($caffes as $key => $caffe)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$caffe->user->name}}</td>
                    <td>{{$caffe->title}}</td>
                    <td>{{$caffe->name}}</td>
                    <td>{{$caffe->address}}</td>
                    <td>
                        @if($caffe->status == 1)
                            <button type="button" class="btn btn-outline-light">فعال</button>
                        @else
                            <button type="button" class="btn btn-outline-dark">غیر فعال</button>
                        @endif
                    </td>
                    <td>
                        <a onclick="document.getElementById('form-delete-{{$caffe->id}}').submit()"
                           class="btn btn-outline-danger">پاک کردن</a>
                        <form method="post" id="form-delete-{{$caffe->id}}"
                              action="{{route('caffe.destroy', $caffe->id)}}">
                            @csrf
                            @method('delete')
                        </form>

                    </td>
                    <td>
                        <a href="{{route('caffe.edit',$caffe->id)}}" class="btn btn-outline-success">ادیت کردن</a>

                    </td>
                </tr>
            @endforeach



            </tbody>
        </table>
        <div>
            {{$caffes->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection
