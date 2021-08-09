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
                                    <img src="../assets/img/theme/team-4.jpg" class="rounded-circle">
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
                                Jessica Jones<span class="font-weight-light">, 27</span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
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
                                <h3 class="mb-0">اپدیت پروفایل</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">تنظیمات</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/admin/profile/{{$user->id}}">
                            @csrf
                            {{ method_field('PUT') }}
                            <h6 class="heading-small text-muted mb-4">اطلاعات شما</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">نام کاربری</label>
                                            <input name="username" disabled type="text" id="input-username"
                                                   class="form-control"
                                                   value="{{$user->username}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">ادرس ایمیل</label>
                                            <input name="email" disabled type="email" id="input-email"
                                                   class="form-control"
                                                   value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">نام</label>
                                            <input name="first_name" type="text" id="input-first-name"
                                                   class="form-control" value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">نام خانوادگی</label>
                                            <input name="last_name" type="text" id="input-last-name"
                                                   class="form-control" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">اطلاعات تماس</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">ادرس</label>
                                            <input name="address" id="input-address" class="form-control"
                                                   value="{{$user->address}}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">شهر</label>
                                            <input name="city" type="text" id="input-city" class="form-control"
                                                   value="{{$user->city}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">کد پستی</label>
                                            <input name="postal_code" type="number" id="input-postal-code"
                                                   value="{{$user->postal_code}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">شماره تلفن</label>
                                            <input disabled name="mobile" type="number" id="input-postal-code"
                                                   class="form-control" value="{{$user->mobile}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">درباره من</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">درباره من </label>
                                    <textarea name="about_me" rows="4"
                                              class="form-control">{{$user->about_me}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">پروفایل کاری</label>
                                <input type="file" class="form-control-file" name="avatar" id="">
                            </div>

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">ارسال اطلاعا</label>
                                    <input type="submit" class="btn btn-outline-success" value="ارساال ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
