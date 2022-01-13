<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <p style="font-size:large;"><h2>
            <a href="/customerHomepage" class="text-secondary"><i class="text-secondary fas fa-arrow-left"></i></a> Repair Service Request Form</h2></p>
        <br>       
        <form action="saveRequest" method="post">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Username</span>
                </div>
                <input type="text" class="form-control" name="username" value="{{$info->username}}" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Address&ensp;&nbsp;</span>
                </div>
                <input type="text" class="form-control" name="address" value="{{$info->address}}" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Device&emsp;&nbsp;</span>
                </div>
                <input type="text" class="form-control" id="device" name="device" value="{{ old('device') }}" placeholder="Samsung/IPhone" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Symptom</span>
                </div>
                <input type="text" class="form-control" id="symptom" name="symptom" value="{{ old('symptom') }}" placeholder="What is wrong?" required>
            </div>
            <input type="hidden" name="id" value="{{$info->id}}">
            <br>
            <div style="text-align: right">
                <button type="submit" class="btn btn-info text-white">Submit</button>
            </div>
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