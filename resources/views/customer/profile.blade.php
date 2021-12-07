<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
        <u style="font-size:large;"><h2>Customer Profile</h2></u>
        <br>       
        <form action="updatedCustomerProfile" method="post">
            @csrf
            @foreach($customerInfo as $row)
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">User ID&emsp;&emsp;&emsp;&ensp;</span>
                </div>
                <input type="text" class="form-control" id="id" name="id" value="{{$row->id}}" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Username&emsp;&emsp;&nbsp;</span>
                </div>
                <input type="text" class="form-control" id="name" name="username" value="{{$row->username}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email Address&ensp;</span>
                </div>
                <input type="text" class="form-control" id="email" name="email" value="{{$row->email}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Phone Number</span>
                </div>
                <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{$row->phoneNo}}">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address&emsp;&emsp;&emsp;</span>
                </div>
                <input type="text" class="form-control" id="address" name="address" value="{{$row->address}}">
            </div>
            <br>
            <center>
                <button type="submit" class="btn btn-warning">Update</button>
            </center>
            @endforeach
        </form>
    </div>
    <a href="/customerHomepage"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>