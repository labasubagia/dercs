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
        .noborder {
            border: 0px none;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container topmargin">
        <p style="font-size:large;"><h2>
            <a href="/customerHomepage"><i class="text-secondary fas fa-arrow-left"></i></a> Request List</h2></p>
        <br>
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table">
                        <tr class="bg-info text-white">
                            <th>No.</th>
                            <th>Device</th>
                            <th>Action</th>
                        </tr>
                        @php ($i = 1)
        
                        @foreach ($info as $row1)
                        <tr>
                            <form action="viewItemDetail" method="post">
                            @csrf
                                <td><input type="text" value="{{$i}}" class="noborder"  readonly></td>
                                <td><input type="text" value="{{$row1->device}}" name="id" class="noborder" readonly></td>
                                <input type="hidden" value="{{$row1->id}}" name="id">
                                <td style="width: 200px"><button class="btn btn-info text-white" type="submit">View</button></td>
                            </form>
                        <tr>
                        @php ($i++)
                        @endforeach
                </table>
            </div>
        </div>
            <br>
    </div>
</body>
</html>
