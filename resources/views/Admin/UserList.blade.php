@extends('Layout.app')

@section('content')

<div class="container mt-4">

    <h3 class="mb-3">User Details</h3>


    <table class="table table-bordered table-striped" id="users-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>

</div>

@endsection


@push('scripts')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('/students-data') }}",

        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'course', name: 'course' },
            { data: 'gender', name: 'gender' },
            { data: 'date_of_birth', name: 'date_of_birth' },
            { data: 'address', name: 'address' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush