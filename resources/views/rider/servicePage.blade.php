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
        <center><u style="font-size:large;"><h2>Unaccepted Task List</h2></u></center>
        <br> 
        <table border="1px" style="margin-left: auto; margin-right: auto;">
                <tr>
                    <th style="width:100px">No.</th>
                    <th style="width:200px">Pick Up Address</th>
                    <th style="width:200px">Customer Phone No.</th>
                    <th style="width:200px">Action</th>
                </tr>
                @php ($i = 1)

                @foreach ($unaccepted as $row)
                <tr>
                    <td><input type="text" value="{{$i}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row->pickupAddress}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row->phoneNo}}" class="noborder" readonly></td>
                    <td>
                        <form action="accept" method="post">
                        @csrf
                            <input type="hidden" value="{{$row->id}}" name="id">
                            <button class="btn btn-warning" type="submit">Accept</button>
                        </form>
                    </td>
                <tr>
                @php ($i++)
                @endforeach
        </table> 
        <br><br>
        <center><u style="font-size:large;"><h2>Accepted Task List</h2></u></center>
        <br> 
        <table border="1px"  style="margin-left: auto; margin-right: auto;">
                <tr>
                    <th style="width:100px">No.</th>
                    <th style="width:200px">Pick Up Address</th>
                    <th style="width:200px">Customer Phone No.</th>
                    <th style="width:200px">Status</th>
                    <th style="width:200px">Action</th>
                </tr>
                @php ($i = 1)

                @foreach ($accepted as $row1)
                <tr>
                    <td><input type="text" value="{{$i}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->pickupAddress}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->phoneNo}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$row1->trackProgress}}" class="noborder" readonly></td>
                    <td>
                        <form action="viewAcceptedTask" method="post">
                        @csrf
                            <input type="hidden" value="{{$row1->id}}" name="id">
                            @if($row1->trackProgress != 'Received' && $row1->trackProgress != 'Confirm Received')
                                <button class="btn btn-warning" type="submit">Update</button>
                            @endif
                        </form>
                    </td>
                <tr>
                @php ($i++)
                @endforeach
        </table> 
    </div>
    <a href="/riderHomepage"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>