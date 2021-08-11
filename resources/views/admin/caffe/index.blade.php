@extends('master.admin')

@section('title')
    {{$title}}
@endsection
@section('link')
    {{route('caffe.create')}}
@endsection

@section('content')

    <div class="col">
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
