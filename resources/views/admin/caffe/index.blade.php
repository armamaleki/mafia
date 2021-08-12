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
                <th></th>
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
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn @if($caffe->status== 1 )btn-outline-secondary @else btn-outline-danger @endif ">@if($caffe->status == 1)فعال@elseغیر فعال@endif</button>
                            <a href="{{route('caffe.edit',$caffe->id)}}" class="btn btn-outline-success">ادیت کردن</a>
                            <a onclick="document.getElementById('form-delete-{{$caffe->id}}').submit()"
                               class="btn btn-outline-danger">پاک کردن</a>
                            <form method="post" id="form-delete-{{$caffe->id}}"
                                  action="{{route('caffe.destroy', $caffe->id)}}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
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
