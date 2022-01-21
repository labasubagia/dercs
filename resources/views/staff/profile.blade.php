<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')
    <style>
        .homepage {
                position: fixed;
                right: 25px;
                bottom: 15px;
                border-radius: 50%;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <u style="font-size:large;"><h2>Staff Profile</h2></u>
        <br>
        <p style="font-size:large;"><h2>
            <a href="/staffDashboard"><i class="text-secondary fas fa-arrow-left"></i></a> Back To Dashboard</h2></p>
            <br>
        <form action="updatedCustomerProfile" method="post">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">User ID&emsp;&emsp;&emsp;&ensp;</span>
                </div>
                <input type="text" class="form-control" id="id" name="id" value="{{$staffInfo->id}}" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Username&emsp;&emsp;&nbsp;</span>
                </div>
                <input type="text" class="form-control" id="name" name="username" value="{{$staffInfo->username}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email Address&ensp;</span>
                </div>
                <input type="text" class="form-control" id="email" name="email" value="{{$staffInfo->email}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number</span>
                </div>
                <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{$staffInfo->phoneNo}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address&emsp;&emsp;&emsp;</span>
                </div>
                <input type="text" class="form-control" id="address" name="address" value="{{$staffInfo->address}}">
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-info text-white">Update</button>
            </center>
        </form>
    </div>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>
