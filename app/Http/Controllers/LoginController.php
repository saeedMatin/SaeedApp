<?php

namespace App\Http\Controllers;

use App\Http\Requests\OTPRequest;
use App\Http\Requests\OTPCheckRequest;
use Dotenv\Validator;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login', ['title' => 'Login Page']);
    }

    public function CreateCode(OTPRequest $request)
    {
        session(['PhoneNumber' => request('PhoneNumber')]);
        session(['OTPSuccess' => request('false')]);
        $mobileNumber = request('PhoneNumber');
        $validate_data = $request->validated();
        $codeGenerated = $this->CodeGenerate($mobileNumber);

        // if ($codeGenerated == true) {
        return view('login.GetCode', ['PhoneNumber' => $mobileNumber, 'title' => 'login']);
        // } else {
        //     return back()->with('Error', 'مشکلی در ایجاد کد بوجود آمده. دوباره تلاش کنید');
        // }
        // return $this->TestAction();
    }
    public function ConfirmCode()
    {
        $mobileNumber = session('PhoneNumber');
        return view('login.ConfirmCode', ['PhoneNumber' => $mobileNumber, 'title' => 'Confirm']);
    }
    public function CheckCode(OTPCheckRequest $request)
    {
        session(['OTPSuccess' => 'true']);
        return true;
    }
    public function Success()
    {
        if (session('OTPSuccess') == 'true') {
            return view('login.success', ['title' => 'OTP Confirmation Successfull']);
        }
        return redirect('/login');
    }

    public function CodeGenerate($PhoneNumber)
    {
        try {

            $num_str = sprintf("%05d", mt_rand(1, 99999));
            Redis::set($PhoneNumber, $num_str, 'EX', 60);
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function CodeCheck($PhoneNumber)
    {
        try {
            $returnedCode = Redis::get($PhoneNumber);
            return $returnedCode;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
