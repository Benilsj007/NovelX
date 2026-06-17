@extends('Layout.app')
@section('content')

<h2>Edit Student</h2>

<form action="/students/update/{{ $UserDetails->id }}" method="POST">
    @csrf
    @method('PUT')

    <input class="form-control mb-2" type="text" name="title" value="{{ $UserDetails->title }}">

    <input class="form-control mb-2" type="text" name="name" value="{{ $UserDetails->name }}">

    <input class="form-control mb-2" type="email" name="email" value="{{ $UserDetails->email }}">

    <input class="form-control mb-2" type="password" name="password" value="{{ $UserDetails->password }}">

    <input class="form-control mb-2" type="text" name="phone" value="{{ $UserDetails->phone }}">

    <input class="form-control mb-2" type="text" name="course" value="{{ $UserDetails->course }}">

    <input class="form-control mb-2" type="text" name="gender" value="{{ $UserDetails->gender }}">

    <input class="form-control mb-2" type="date" name="date_of_birth" value="{{ $UserDetails->date_of_birth }}">

    <input class="form-control mb-2" type="text" name="address" value="{{ $UserDetails->address }}">

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection