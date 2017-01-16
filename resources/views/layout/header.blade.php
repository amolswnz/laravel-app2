<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyBlog using Laravel</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <style type="text/css"> body {font-family: 'Slabo 27px'; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; text-shadow: 1px 1px 1px rgba(0,0,0,0.04); } </style>
<body>
@include('partials.nav')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>@yield('page-title')</h1>
        </div>
    </div>
    <hr>
    @yield('main-content')
</div>
@include('partials.footer')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>