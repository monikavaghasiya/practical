<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page_title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('users.index')}}">Users</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{route('user.create')}}">Create User</a></li>s
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>

</body>
@yield('scripts')
</html>
