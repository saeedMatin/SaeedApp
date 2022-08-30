

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

                        <form action="/login/CheckCode" method="POST" class="form-group">
                        {{-- <form class="form-group"> --}}
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <p class="a">به مای آرمان خوش آمدید</p><br>
                                <p class="right b">ورود | ثبت نام</p><br>
                                <p class="right c">کد تایید برای {{$PhoneNumber}} پیامک شده است <a href="/login">تغییر شماره موبایل</a></p>
                                <div class="form-outline right mb-4">
                                    <div class="input-number">
                                        <input style="display:none" type="text" maxlength="11" name="PhoneNumber" id="PhoneNumber" value={{$PhoneNumber}} />
                                        <input type="text" maxlength="5" name="CodeNumber" id="CodeNumber" autocomplete="off"/>
                                    </div>

                                    <span id="error_li" class="right error"></span>
                                    @if ($errors->any())
                                        <ul id="validate_ul">
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @isset($myerrors)
                                        <div id="validate_ul">
                                            <span class="right error">{{$myerrors}}</span>
                                        </div>
                                    @endisset
                                </div>
                                <div id="timer_div">
                                    <label class="form-label lable" >ارسال مجدد کد :<span id="timer">n</span> ثانیه دیگر</label>
                                </div>
                                {{-- <button class="btn  btn-secondary btn-lg px-5 mb-4 form-control form-control-lg" disabled="true" id="btn_confirm" type="submit"><span class="btn-txt">تائید شماره همراه</span></button> --}}
                                <button class="btn  btn-secondary btn-lg px-5 mb-4 form-control form-control-lg" disabled="true" id="btn_confirm" type="submit"><span class="btn-txt">تائید شماره همراه</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
