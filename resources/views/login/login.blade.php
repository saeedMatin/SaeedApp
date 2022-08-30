
@extends('layouts.master')
@section('title',$title)
@section('content')

<script src="{{asset('js/Login.js')}}" language="JavaScript" type="text/javascript" defer></script>
<link rel="stylesheet" href="{{asset('css/login/login.css')}}">

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card " style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form action="/login/createcode" method="POST" class="form-group">
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <p class="a">به مای آرمان خوش آمدید</p><br>
                                <p class="right b">ورود | ثبت نام</p><br>
                                <p class="right c">لطفاً شماره موبایل‌ خود را وارد کنید تا کد فعال‌سازی برای‌تان ارسال شود.</p>
                                <div class="form-outline right mb-4">
                                    <label class="form-label lable" >شماره تلفن همراه</label>
                                    <div class="input-number">
                                        <input type="text" maxlength="11" name="PhoneNumber" id="PhoneNumber" class="form-control form-control-lg" autocomplete="off" placeholder="مثلا 09128405772"/>
                                        <i class="fa fa-backspace"></i>
                                    </div>
                                    <span id="error_li" class="right error"></span>
                                    @if ($errors->any())
                                        <div id="validate_ul">
                                            @foreach ($errors->all() as $error)
                                                <span class="right error">{{$error}}</span><br>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <button class="btn  btn-secondary btn-lg px-5 mb-4 form-control form-control-lg" disabled="true" id="btn_next" type="submit"><span class="btn-txt">بعدی</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
