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
        th {
            text-align: center;
        }
        td {
            text-align: center;
        }
        input {
                text-align: center;
        }
        .noborder {
            border: 0px none;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <u style="font-size:large;"><h2>Request Service List</h2></u> 
        <br> 
        <table border="1px">
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Device</th>
                    <th style="width:200px">Action</th>
                </tr>
                @php ($i = 1)

                
                <tr>
                    <td><input type="text" value="{{$i}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$info1->username}}" name="username" class="noborder" readonly></td>
                    <td><input type="text" value="{{$info1->device}}" name="device" class="noborder" readonly></td>
                    <td>
                        <form action="viewUpdateForm" method="post">
                        @csrf
                            <input type="hidden" value="{{$info1->id}}" name="id">
                            <button type="submit">View</button>
                        </form>
                        <form action="displayUpdateForm" method="post">
                        @csrf
                        @if($info1->paymentStatus != 1)
                            <input type="hidden" value="{{$info1->id}}" name="id">
                            <button class="btn btn-warning" type="submit">Update</button>    
                        @endif                    
                        </form>
                        
                    </td>
                <tr>
                @php ($i++)
                
            </table> 
        <table border="1px">
    </div>
    <a href="/staffDashboard"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>