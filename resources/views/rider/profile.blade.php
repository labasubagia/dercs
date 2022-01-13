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
        <h2>Rider Profile</h2>
        <br>
        <form action="updatedCustomerProfile" method="post">
            @csrf
            @foreach($riderInfo as $row)
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
            <center>
                <button type="submit" class="btn btn-info">Update</button>
            </center>
            @endforeach
        </form>
    </div>
    <a href="/riderHomepage"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>
