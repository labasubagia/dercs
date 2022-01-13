<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin Dashboard</title>
    @include('layouts.bootstrap')
    <style>
        .topmargin {
            margin-top: 5%;
        }
        th {
            width: 200px;
            padding: 15px;
            font-size: 17px;
        }
        .noborder {
            border: 0px none;
        }
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
    <div class="container topmargin">
        <u style="font-size:large;"><h2>Item Information</h2></u>
        <br>
            <table>
                
                <tr>
                    <th>Username :</th>
                    <td><input type="text" value="{{$info->username}}" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Device :</th>
                    <td><input type="text" value="{{$info->device}}" name="device" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Symptom :</th>
                    <td><input type="text" value="{{$info->symptom}}" name="symptom" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Status :</th>
                    <td><input type="text" value="{{$info->repairStatus}}" name="repairStatus" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Progress :</th>
                    <td><input type="text" value="{{$info->repairProgress}}" name="repairProgress" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Estimate Cost :</th>
                    <td><input type="text" value="{{$info->estimateCost}}" name="estimateCost" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Reason:</th>
                    <td><input type="text" value="{{$info->reason}}" name="reason" class="noborder" readonly></td>
                </tr>
                <tr>
                    <th>Detail :</th>
                    <td><input type="text" value="{{$info->detail}}" name="detail" class="noborder" readonly></td>
                </tr>
               
            </table>
            <br>
        <center><a href="viewRepairServiceList"><button class="btn btn-warning">Okay</button></a></center><br><br><br>
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
