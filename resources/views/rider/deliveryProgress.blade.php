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
        <h2 class="text-center">Update Task</h2>
        <br>
        <table class="table">
                <tr class="bg-info text-white">
                    <th style="width:200px">Date</th>
                    <th style="width:200px">Time</th>
                    <th style="width:200px">Status</th>
                    <th style="width:200px">Action</th>
                </tr>

                <form action="/updateTrack" method="post">
                @csrf
                <tr>
                    <td><input class="form-control" type="date" name="date" required></td>
                    <td><input class="form-control" type="time" name="time" required></td>
                    <td>
                        @php
                        $status = ['In Progress', 'Picked Up', 'Received'];
                        @endphp
                        <select class="form-control" name="trackProgress">
                            <option value="" disabled></option>
                            @foreach ($status as $item)
                                <option {{$info->trackProgress == $item ? 'selected':''}}>{{$item}}</option>
                            @endforeach
                        </select>
                    </td>
                    <input type="hidden" name="id" value="{{$info->id}}">
                    <td><input type="submit" value="Update" class="btn btn-info"></td>
                <tr>
                </form>

        </table>
        <br><br>
        <center><a href="/servicePage"><button class="btn btn-info">Back</button></a></center>
    </div>
</body>
</html>
