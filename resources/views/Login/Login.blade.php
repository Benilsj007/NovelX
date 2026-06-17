@extends('Layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="c">

<h2>Login</h2>

<form action="/login/auth" method="POST">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div >
        <button type="button" class="btn btn-warning" onclick="sendOtp()">
            Generate OTP
        </button>
    </div>

    <div class="mb-3" id="otpSection" style="display:none;">
        <label class="mt-2">OTP</label>
        <input type="text" name="otp" class="form-control">
    </div>

    <div class="button">
        <button type="submit" class="btn btn-primary">
        Login
    </button>
    <a href="/register" class="btn btn-link">
        if you don't have an account, Register here </a>
    </div>
    

</form>

</div>

<script>
function sendOtp()
{
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    if(email == '' || password == '')
    {
        toastr.info('Enter Email and Password first');
        return;
    }

    fetch('/send-otp', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {

        if(data.status)
        {
            toastr.success(data.message);
            document.getElementById('otpSection').style.display = 'block';
        }
        else
        {
            toastr.error(data.message);
        }

    })
    .catch(error => {
        toastr.error('Something went wrong');
        console.log(error);
    });
}
</script>

@endsection