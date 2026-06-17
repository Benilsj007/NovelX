@extends('Layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')

<h1>
    Welcome: {{ session('title') }} {{ session('name') }} !!!
</h1>

<a href="{{ url('/dashboard-pdf') }}" class="btn btn-success">
    Download PDF
</a>

<a href="{{ url('/dashboard-screenshot') }}" class="btn btn-primary">
    Download Screenshot
</a>

<a href="/logout" class="btn btn-danger">
    Logout
</a>
 <hr>
 <div class="welcome-card">
    <div class="welcome-card-body">
        <h3> Welcome to School Management Dashboard</h3>
        <p>
            We are delighted to have you here. This dashboard provides quick
            access to school information, reports, and important updates.
        </p>
    </div>
</div>
<div class="dashboard-stats">

    <div class="stats-box students-box">
        <div class="stats-content">
            <h5>Total Students</h5>
            <h2>500+</h2>
        </div>
    </div>

    <div class="stats-box teachers-box">
        <div class="stats-content">
            <h5>Total Teachers</h5>
            <h2>50+</h2>
        </div>
    </div>

    <div class="stats-box classes-box">
        <div class="stats-content">
            <h5>Active Classes</h5>
            <h2>25+</h2>
        </div>
    </div>

</div>

<div class="announcement-container">
    <div class="announcement-header">
        Latest Announcements
    </div>

    <div class="announcement-body">
        <ul>
            <li> Parent-Teacher Meeting scheduled for next week.</li>
            <li> Annual Day preparations are in progress.</li>
            <li> New library books have been added.</li>
        </ul>
    </div>
</div>

<div class="quote-container">
    <strong>Quote of the Day:</strong>
    <p>
        "Education is the most powerful weapon which you can use to change the world."
        – Nelson Mandela
    </p>
</div>

@endsection