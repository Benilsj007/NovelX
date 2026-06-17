@extends('Layout.app')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Delete Student</h4>
        </div>

        <div class="card-body">

            <p class="fs-5">
                Are you sure you want to delete {{ $UserDetails->name }} ?
            </p>

            <form action="/students/destroy/{{ $UserDetails->id }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Yes Delete
                </button>
            </form>

            <a href="/students-details" class="btn btn-secondary ms-2">
                Cancel
            </a>

        </div>
    </div>

</div>
@endsection