@extends('master.admin')


@section('title')
    {{$title}}
@endsection
@section('link')
{{route('mafia.create')}}
@endsection

@section('content')
    {{-------------------show--------------------}}
    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">شماره</th>
                <th scope="col">برگذار کننده</th>
                <th scope="col">تایتل</th>
                <th scope="col">قیمت</th>
                <th scope="col">نفرات حاظر در برنامه</th>
                <th scope="col">زمان برگذاری برنامه</th>
                <th scope="col">وضعیت</th>
                <th scope="col">پاک کردن</th>
                <th scope="col">ادیت کردن</th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <th scope="row">{{$game->id}}</th>
                    <td>{{$game->user->name}}</td>
                    <td>{{$game->title}}</td>
                    <td>{{$game->price}}</td>
                    <td>{{$game->member}}</td>
                    <td>{{$game->time}}</td>
                    <td>
                        @if($game->status == 1)
                            <button type="button" class="btn btn-outline-light">فعال</button>

                        @else
                            <button type="button" class="btn btn-outline-dark">غیر فعال</button>

                        @endif
                    </td>
                    <td>
                        <a  onclick="document.getElementById('mafia-destroy-{{$game->id}}').submit()"
                           class="btn btn-outline-danger">پاک کردن</a>
                        <form action="{{route('mafia.destroy',$game->id)}}" id="mafia-destroy-{{$game->id}}" method="post">
                            @csrf
                            @method('delete')

                        </form>

                    </td>
                    <td>
                        <a href="{{route('mafia.edit',$game->id)}}" type="button" class="btn btn-outline-success">ادیت
                            کردن</a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div>
            {{$games->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection
