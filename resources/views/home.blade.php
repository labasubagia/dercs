<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @include('layouts.bootstrap')
</head>
<body>
    @include('layouts.navbar')

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <center>
                    <div class="card-header"><h3>{{ __('Dashboard') }}</h3></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <h5>{{ session('status') }}</h5>
                            </div>
                        @endif

                        <h5>{{ __('You are logged in!') }}</h5>
                        <br><br>
                        
                        <form action="/staffDashboard" method="post">
                        @csrf
                            <button type="submit" class="btn btn-warning"><strong>Staff Dashboard</strong></button>
                        </form>
                        <br><br>
                        <form action="/customerHomepage" method="post">
                        @csrf
                            <button type="submit" class="btn btn-warning"><strong>Customer Homepage</strong></button>
                        </form>
                        <br><br>
                        <form action="/riderHomepage" method="post">
                        @csrf
                            <button type="submit" class="btn btn-warning"><strong>Rider Homepage</strong></button>
                        </form>
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>