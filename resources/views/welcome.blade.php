<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')

    <style>
        .heading{
            margin-top: 5%;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container">
        <div class="heading">
            <center><img src="{{url('/images/logo.png')}}" alt="Company Logo" style="width:350px; height:250px"></center><br>
            <center><h1>A place where you wish not to come.</h1></center><br>
            <h5 style="text-align: right; margin-right: 220px">- But you are here right now.</h5>
            <br><br><br>
            
            <div style="text-align: right; margin-right: 220px">
                <a href="home"><button type="button" class="btn btn-warning"><strong>OK</strong></button></a>
            </div>
        </div>
    </div>
</body>
</html>