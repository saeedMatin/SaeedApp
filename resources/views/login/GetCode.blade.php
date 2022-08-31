

@extends('layouts.master')
@section('title',$title)
@section('content')

<script src="{{asset('js/confirm.js')}}" language="JavaScript" type="text/javascript" defer></script>
<link rel="stylesheet" href="{{asset('css/login/login.css')}}">

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card " style="border-radius: 1rem;" id="div_frm">

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
