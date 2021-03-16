@extends('layouts.master')
@section('title')
    {{ 'User' }}
@endsection
@section('css')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <h1>Users</h1>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>Email</th>
            <th>About</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'email', name: 'email'},
                {data: 'about', name: 'about'},
                {data: function (data) {
                    let url = '{{route("users.index")}}' + '/' + data.id;
                        return '<a href="'+url+'">View</a>';
                    }, name: 'id'},
            ]
        });
    });
</script>
@endsection
