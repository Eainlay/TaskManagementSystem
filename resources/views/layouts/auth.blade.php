<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task MSI Tracking System</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <img src="{{asset('images\auth.png')}}" alt="authentication" width="100%" height="75%">
        </div>
        <div class="col-md-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
