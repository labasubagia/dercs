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
        <u style="font-size:large;"><h2>Tracking List</h2></u>
        <br>
        <table border="1px">
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Device</th>
                    <th style="width:200px">Action</th>
                </tr>
                @php ($i = 1)

                @foreach ($info as $row1)
                <tr>
                    <td><input type="text" value="{{$i}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->username}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->device}}" class="noborder" readonly></td>
                    <td>
                        <form action="sViewProgress" method="post">
                        @csrf
                            <input type="hidden" value="{{$row1->id}}" name="id">
                            <button class="btn btn-warning" type="submit">Status</button>
                        </form>
                    </td>
                <tr>
                @php ($i++)
                @endforeach
            </table>
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
