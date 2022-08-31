<script src="{{asset('js/Confirm-Partial.js')}}" language="JavaScript" type="text/javascript" defer></script>
<div class="card-body p-5 text-center">

    <form  method="POST" class="form-group">
        @csrf
        <div class="mb-md-5 mt-md-4 pb-5">
            <p class="a">به مای آرمان خوش آمدید</p><br>
            <p class="right b">ورود | ثبت نام</p><br>
            <p class="right c">کد تایید برای {{$PhoneNumber}} پیامک شده است <a href="/login">تغییر شماره موبایل</a></p>
            <div class="form-outline right mb-4">
                <div class="input-number">
                    <input type="text" maxlength="5" name="CodeNumber" id="CodeNumber" autocomplete="off"/>
                </div>
                <div id="error_li" class="right error"></div>
            </div>
            <div id="timer_div">
                <label class="form-label lable" >ارسال مجدد کد :<span id="timer">n</span> ثانیه دیگر</label>
            </div>
            <button class="btn  btn-secondary btn-lg px-5 mb-4 form-control form-control-lg" disabled="true" id="btn_confirm" type="button"><span class="btn-txt">تائید شماره همراه</span></button>
        </div>
    </form>
</div>


