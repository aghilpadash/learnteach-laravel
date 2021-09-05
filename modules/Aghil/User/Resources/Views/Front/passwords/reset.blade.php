@extends('User::Front.master')
<title>تغییر رمز عبور</title>

@section('content')
    <form method="post" action="{{route('password.update')}}" class="form">
        @csrf
        <a class="account-logo" href="/">
            <img src="/img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">

            <input id="password" type="password" class="txt txt-l @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password" placeholder="رمز عبور جدید *">

            <input id="password_confirm" type="password" class="txt txt-l @error('password') is-invalid @enderror"
                   name="password_confirmation" required autocomplete="new-password"
                   placeholder="تایید رمز عبور جدید *">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror

            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            <button class="btn btn-recoverpass">تغییر رمز عبور</button>
        </div>

    </form>
@endsection