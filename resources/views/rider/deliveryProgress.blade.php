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
        <center><u style="font-size:large;"><h2>Update Task</h2></u></center>
        <br>
        <table border="1px solid black" style="margin-left:auto;margin-right:auto;">
                <tr>
                    <th style="width:200px">Date</th>
                    <th style="width:200px">Time</th>
                    <th style="width:200px">Status</th>
                    <th style="width:200px">Action</th>
                </tr>

                <form action="/updateTrack" method="post">
                @csrf
                <tr>
                    <td><input type="date" name="date" required></td>
                    <td><input type="time" name="time" required></td>
                    <td>
                        @php
                        $status = ['In Progress', 'Picked Up', 'Received'];
                        @endphp
                        <select name="trackProgress">
                            <option value="" disabled></option>
                            @foreach ($status as $item)
                                <option {{$info->trackProgress == $item ? 'selected':''}}>{{$item}}</option>
                            @endforeach
                        </select>
                    </td>
                    <input type="hidden" name="id" value="{{$info->id}}">
                    <td><input type="submit" value="Update" class="btn btn-warning"></td>
                <tr>
                </form>

        </table>
        <br><br>
        <center><a href="/servicePage"><button class="btn btn-warning">Back</button></a></center>
    </div>
</body>
</html>
