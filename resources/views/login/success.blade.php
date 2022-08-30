

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
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <p class="a">به مای آرمان خوش آمدید</p><br>
                            <p class="right b">ورود | ثبت نام</p><br>
                            <p class="right c">ثبت نام کامل شد</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
