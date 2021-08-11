@extends('master.admin')
@section('title')
    {{$title}}
@endsection
@section('link')
    {{route('post.create')}}
@endsection

@section('content')

    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">شماره</th>
                <th scope="col">نویسنده</th>
                <th scope="col">تایتل</th>
                <th scope="col">تصویر</th>
                <th scope="col"></th>


            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->user->name}}</td>

                    <td>{{$post->title}}</td>
                    <td><img src="/images/{{$post->pic}}"
                             style="border-radius: 50%;border: 1px solid #ddd;  width: 50px; height:50px;" alt="">
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn @if($post->status== 1 )btn-outline-secondary @else btn-outline-danger @endif ">@if($post->status == 1)فعال@elseغیر فعال@endif</button>
                            <a type="button" href="{{route('post.edit',$post->id)}}" class="btn btn-outline-info">ادیت کردن</a>
                            <a onclick="document.getElementById('post-delete-{{$post->id}}').submit()" type="button"  class="btn btn-outline-secondary">پاک کردن</a>
                            <form method="post" action="{{route('post.destroy', $post->id)}}" id="post-delete-{{$post->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
