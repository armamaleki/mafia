@extends('master.admin')


@section('title')
    {{$title}}
@endsection


@section('link')
    {{route('menu.create')}}
@endsection

@section('content')
    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">ایدی</th>
                <th scope="col">نام کافه</th>
                <th scope="col">محصول</th>
                <th scope="col">توضیحات محصول</th>
                <th scope="col">تصویر محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($menus as $menu)
                <tr>
                    <th scope="row">{{$menu->id}}</th>
                    <th>{{$menu->caffe->name}}</th>
                    <td>{{$menu->product}}</td>
                    <td>{{$menu->product_discretion}}</td>
                    <th><img src="/assets/img/menu/{{$menu->image}}" height="50" width="50" alt=""></th>
                    <td>{{$menu->price}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-white">@if($menu->status ==1 ) فعال @else غیر فعال @endif</button>
                            <a  onclick="document.getElementById('menu-destroy-{{$menu->id}}').submit()"
                                class="btn btn-outline-info">پاک کردن</a>
                            <form action="{{route('menu.destroy',$menu->id)}}" id="menu-destroy-{{$menu->id}}" method="post">
                                @csrf
                                @method('delete')
                            </form>


                            <a type="button" href="{{route('menu.edit', $menu->id)}}" class="btn btn btn-outline-white">ادیت کردن</a>

                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
