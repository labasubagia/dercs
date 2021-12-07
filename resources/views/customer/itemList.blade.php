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
        <u style="font-size:large;"><h2>Request List</h2></u>
        <br>
            <table border="1px">
                <tr>
                    <th>No.</th>
                    <th>Device</th>
                    <th>Action</th>
                </tr>
                @php ($i = 1)

                @foreach ($info as $row1)
                <tr>
                    <form action="viewItemDetail" method="post">
                    @csrf
                        <td><input type="text" value="{{$i}}" class="noborder" style="width: 150px" readonly></td>
                        <td><input type="text" value="{{$row1->device}}" name="id" class="noborder" readonly></td>
                        <input type="hidden" value="{{$row1->id}}" name="id">
                        <td style="width: 200px"><button class="btn btn-warning" type="submit">View</button></td>
                    </form>
                <tr>
                @php ($i++)
                @endforeach
            </table>
            <br>
    </div>
    <a href="/customerHomepage"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
</body>
</html>
