@extends('Layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="tt">
<h2>Register</h2>
<form action="/register/store" method="POST">
    @csrf 

     <label class="form-label ">Select Title</label>
   <select class="form-control mb-2" name="title">
    <option value="">Select Title</option>
    <option value="Mr">Mr</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Miss</option>
    <option value="Dr">Dr</option>
    </select>

    <label class="form-label ">Enter Name</label>
    <input class="form-control mb-2" type="text" name="name" placeholder="Name">

    <label class="form-label ">Enter Email</label>
    <input class="form-control mb-2" type="email" name="email" placeholder="Email">

    <label class="form-label ">Enter Password</label>
    <input class="form-control mb-2" type="password" name="password" placeholder="Password">

    <label class="form-label ">Enter Phone no</label>
    <input class="form-control mb-2" type="number" name="phone" placeholder="Phone">

    <label class="form-label ">Select Course</label>
   <select class="form-control mb-2" name="course">
    <option value="">Select Course</option>
    <option value="computerscience">Computer Science</option>
    <option value="medical">Mdeical</option>
    <option value="arts">Arts</option>
    <!-- <option value="HTML">HTML</option> -->
    </select>
    <label class="form-label ">Gender</label>

     <div class="d-flex gap-2 mb-2">
     <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="Male" id="male">
        <label class="form-check-label" for="male">Male</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="Female" id="female">
        <label class="form-check-label" for="female">Female</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" value="Other" id="other">
        <label class="form-check-label" for="other">Other</label>
    </div>
    </div>
    <label class="form-label ">Select DOB</label>
    <input class="form-control mb-2" type="date" name="date_of_birth" placeholder="date_of_birth">

    <label class="form-label ">Enter Address</label>
    <input class="form-control mb-2" type="text" name="address" placeholder="address">

    <button class="btn bg-primary text-white" type="submit">Register</button>
</form>
</div>
@endsection