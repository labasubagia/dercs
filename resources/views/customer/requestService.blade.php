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
        <u style="font-size:large;"><h2>Repair Service Request Form</h2></u>
        <br>       
        <form action="saveRequest" method="post">
            @csrf
            @foreach($info as $row)
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Username</span>
                </div>
                <input type="text" class="form-control" value="{{$row->username}}" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address&ensp;&nbsp;</span>
                </div>
                <input type="text" class="form-control" value="{{$row->address}}" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Device&emsp;&nbsp;</span>
                </div>
                <input type="text" class="form-control" id="device" name="device" value="" placeholder="Samsung/IPhone" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Symptom</span>
                </div>
                <input type="text" class="form-control" id="symptom" name="symptom" value="" placeholder="What is wrong?" required>
            </div>
            <input type="hidden" name="id" value="{{$row->id}}">
            <input type="hidden" name="username" value="{{$row->username}}">
            <input type="hidden" name="address" value="{{$row->address}}">
            <br>
            <div style="text-align: right">
                <button type="submit" class="btn btn-warning">Submit</button>
            </div>
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