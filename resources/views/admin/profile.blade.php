@extends('master.admin')

@section('title')
    {{$title}}
@endsection


@section('content')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="/assets/img/users/{{$user->avatar}}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="h3">
                                {{$user->name}}<span class="font-weight-light">, 27</span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{$user->email}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>????????
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{$user->address}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">?????????? ??????????????</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">??????????????</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/profile/{{$user->id}}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <h6 class="heading-small text-muted mb-4">?????????????? ??????</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">?????? ????????????</label>
                                            <input name="username" disabled type="text" id="input-username"
                                                   class="form-control"
                                                   value="{{$user->username}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">???????? ??????????</label>
                                            <input name="email"  type="email" id="input-email"
                                                   class="form-control"
                                                   value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">??????</label>
                                            <input name="first_name" type="text" id="input-first-name"
                                                   class="form-control" value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">?????? ????????????????</label>
                                            <input name="last_name" type="text" id="input-last-name"
                                                   class="form-control" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">?????????????? ????????</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">????????</label>
                                            <input name="address" id="input-address" class="form-control"
                                                   value="{{$user->address}}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">??????</label>
                                            <input name="city" type="text" id="input-city" class="form-control"
                                                   value="{{$user->city}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">???? ????????</label>
                                            <input name="postal_code" type="number" id="input-postal-code"
                                                   value="{{$user->postal_code}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">?????????? ????????</label>
                                            <input disabled name="mobile" type="number" id="input-postal-code"
                                                   class="form-control" value="{{$user->mobile}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">???????????? ????</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">???????????? ???? </label>
                                    <textarea name="about_me" rows="4"
                                              class="form-control">{{$user->about_me}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">?????????????? ????????</label>
                                <input type="file" value="{{asset('assets/img/user'.$user->avatar)}}" class="form-control-file" name="avatar" id="">
                            </div>

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">?????????? ????????????</label>
                                    <input type="submit" class="btn btn-outline-success" value="???????????? ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
