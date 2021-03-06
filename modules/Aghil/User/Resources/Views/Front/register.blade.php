@extends('User::Front.master')
<title>ثبت نام</title>

@section('content')
    <form action="" class="form" method="post">
        <a class="account-logo" href="index.html">
            <img src="img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" class="txt @error('name') is-invalid @enderror" placeholder="نام و نام خانوادگی *"
                       name="name" value="{{ old('name') }}"
                       required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input class="txt txt-l @error('email') is-invalid @enderror" placeholder="ایمیل *" id="email"
                       type="email" name="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input class="txt txt-r @error('mobile') is-invalid @enderror" placeholder="موبایل" id="mobile"
                       type="text" name="mobile" maxlength="11"
                       value="{{ old('mobile') }}" autocomplete="mobile">

                @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" class="txt txt-l @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password" placeholder="رمز عبور *">

                <input id="password_confirm" type="password" class="txt txt-l @error('password') is-invalid @enderror"
                       name="password_confirmation" required autocomplete="new-password" placeholder="تایید رمز عبور *">

                <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>

                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror

                <br>
                <button class="btn continue-btn">ثبت نام و ادامه</button>
            </form>
            <div class="form-footer">
                <a href="{{route('login')}}">صفحه ورود</a>
            </div>
        </div>

    </form>
@endsection
