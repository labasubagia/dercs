<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <u style="font-size:large;"><h2>Update Form</h2></u>
        <br>       
        <form action="updateForm" method="post">
            @csrf
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Username&emsp;&ensp;</span>
                </div>
                <input type="text" class="form-control" name="username" value="{{$info->username}}" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Device&emsp;&emsp;&emsp;</span>
                </div>
                <input type="text" class="form-control" name="device" value="{{$info->device}}" disabled>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status&emsp;&emsp;&emsp;</span>
                </div>
                <select name="repairStatus" class="form-control" required>
                    <option value="{{$info->repairStatus}}">{{$info->repairStatus}}</option>
                    <option value=""></option>
                    <option value="Repairable">Repairable</option>
                    <option value="Not Repairable">Not Repairable</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Progress&emsp;&emsp;</span>
                </div>
                <select name="repairProgress" class="form-control" required>
                    <option value="{{$info->repairProgress}}">{{$info->repairProgress}}</option>
                    <option value="" disabled></option>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Done">Done</option>
                </select>            
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">EstimateCost</span>
                </div>
                <input type="text" class="form-control" name="estimateCost" value="{{$info->estimateCost}}" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Reason&emsp;&emsp;&ensp;</span>
                </div>
                <input type="text" class="form-control" name="reason" value="{{$info->reason}}" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Detail&emsp;&emsp;&emsp;</span>
                </div>
                <input type="text" class="form-control" name="detail" value="{{$info->detail}}" required>
            </div>
            <input type="hidden" name="id" value="{{$info->id}}">
            
            <br>
            <center>
                <button type="submit" class="btn btn-warning">Update</button>
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