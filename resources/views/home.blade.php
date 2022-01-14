<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DERSC</title>
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
                    <div class="card-header"><h3>Welcome {{ \Auth::user()->userType }}</h3></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <h5>{{ session('status') }}</h5>
                            </div>
                        @endif

                        {{-- <h5>{{ __('You are logged in!') }}</h5> --}}
                        @if (\Auth::user()->userType == 'Staff')
                            <form action="/staffDashboard" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info text-white"><strong>Let Starts</strong></button>
                            </form>
                            
                        @elseif (\Auth::user()->userType == 'Rider')
                        <form action="/riderHomepage" method="post">
                            @csrf
                            <button type="submit" class="btn btn-info text-white"><strong>Let Starts</strong></button>
                        </form>
                        
                        @elseif (\Auth::user()->userType == 'Customer')
                            <form action="/customerHomepage" method="post">
                                @csrf
                                <button type="submit" class="btn btn-info text-white"><strong>Let Starts</strong></button>
                            </form>
                        @endif
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