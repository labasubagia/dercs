<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Admin Dashboard</title>
    @include('layouts.bootstrap')
    <style>
        .topmargin {
            margin-top: 5%;
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
        <u style="font-size:large;"><h2>Customer List</h2></u>
        <br>
            <table border="1px">
                <tr>
                    <th>No.</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Delete</td>
                    <th>Ban</td>
                </tr>
                @php ($i = 1)

                @foreach ($goodCustomer as $row1)
                <tr>
                    <td><input type="text" value="{{$i}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->id}}" name="id" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->username}}" name="username" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->email}}" name="email" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->phoneNo}}" name="phone" class="noborder" readonly></td>
                    <form action="deleteCustomer" method="post">
                    @csrf
                        <input type="hidden" value="{{$row1->id}}" name="id">
                        <td><button class="btn btn-light" onclick="return confirm('Confirm Delete?');"><i class="material-icons" style="font-size:36px; color:red">delete_forever</i></button></td>
                    </form>
                    <form action="banCustomer" method="post">
                    @csrf
                        <input type="hidden" value="{{$row1->id}}" name="id">
                        <td><button class="btn btn-light" onclick="return confirm('Confirm ban?');"><i class="fa fa-crosshairs" style="font-size:36px; color:red"></i></button></td>
                    </form>
                <tr>
                @php ($i++)
                @endforeach
            </table>
            <br>
        <u style="font-size:large;"><h2>Banned Customer List</h2></u>
        <br>
            <table border="1px">
                <tr>
                    <th>No.</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Phone Number</th>
                    <th>Unban</td>
                </tr>
                @php ($i = 1)

                @foreach ($badCustomer as $row2)
                <form action="unbanCustomer" method="post">
                @csrf
                    <tr>
                        <td><input type="text" value="{{$i}}" class="noborder" readonly></td>
                        <td><input type="text" value="{{$row2->id}}" name="id" class="noborder" readonly></td>
                        <td><input type="text" value="{{$row2->username}}" name="username" class="noborder" readonly></td>
                        <td><input type="text" value="{{$row2->email}}" name="email" class="noborder" readonly></td>
                        <td><input type="text" value="{{$row2->phoneNo}}" name="phone" class="noborder" readonly></td>
                        <td><button type="submit" class="btn btn-light" onclick="return confirm('Confirm removing banned?');"><i class="fas fa-hand-holding-heart" style="font-size:36px; color:red"></i></button></td>
                    <tr>
                    @php ($i++)
                </form>
                @endforeach
            </table>
            <br>
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
