@extends('User::Front.master')

@section('content')

    <div class="account act">
        <form action="{{route('password.checkVerifyCode')}}" class="form" method="post">
            @csrf
            <input type="hidden" name="email" value="{{request()->email}}">
            <a class="account-logo" href="/">
                <img src="/img/weblogo.png" alt="">
            </a>
            <div class="card-header">
                <p class="activation-code-title">کد فعالسازی به ایمیل <span>{{request()->email}}</span>
                    ارسال شد. درصورت عدم دریافت، پوشه Spam را چک کنید.
                </p>
            </div>
            <div class="form-content form-content1">
                <input class="activation-code-input" name="verify_code" required placeholder="فعال سازی">
                @error('verify_code')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <button class="btn i-t">تایید</button>

                <a href="#" onclick="event.preventDefault();
                document.getElementById('resend-code').submit()">
                    ارسال مجدد کد فعالسازی</a>

            </div>
            <div class="form-footer">
                <a href="{{route(('register'))}}">صفحه ثبت نام</a>
            </div>
        </form>

        <form method="post" action="{{route('verification.resend')}}" id="resend-code">
            @csrf
        </form>
    </div>

    </div>
@endsection

@section('js')
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/activation-code.js"></script>
@endsection
