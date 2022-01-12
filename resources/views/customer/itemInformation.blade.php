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
        .zxc {
            text-decoration: underline;
            color: blue;
        }
    </style>
    
</head>
<body>
    @include('layouts.navbar')
    <div class="container topmargin">
        <p style="font-size:large;"><h2>
            <a href="/viewItemList"><i class="text-secondary fas fa-arrow-left"></i></a> Item Information</h2></p>
        <br>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table">
                @foreach ($info as $row)
                    <tr>
                        <th>Username :</th>
                        <td><input type="text" value="{{$row->username}}" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Device :</th>
                        <td><input type="text" value="{{$row->device}}" name="device" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Symptom :</th>
                        <td><input type="text" value="{{$row->symptom}}" name="symptom" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td><input type="text" value="{{$row->repairStatus}}" name="repairStatus" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Progress :</th>
                        <td><input type="text" value="{{$row->repairProgress}}" id="repairProgress" name="repairProgress" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Estimate Cost :</th>
                        <td><input type="text" value="{{$row->estimateCost}}" name="estimateCost" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Reason:</th>
                        <td><input type="text" value="{{$row->reason}}" name="reason" class="noborder" readonly></td>
                    </tr>
                    <tr>
                        <th>Detail :</th>
                        <td><input type="text" value="{{$row->detail}}" name="detail" class="noborder" readonly></td>
                    </tr>
                   
                </table>
            </div>
        </div>
        <br>
            <center>
                <form action="displayPayment" method="post">
                @csrf
                    <input type="hidden" value="{{$row->id}}" name="id">
                    @if($row->paymentStatus != 1)
                    @if($row->repairProgress == 'Done')
                        <input type="submit" class="btn btn-info text-white" value="Payment">
                    @endif
                    @endif
                </form>
            </center>
            @endforeach
    </div>
</body>
</html>
