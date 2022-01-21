<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <u style="font-size:large;"><h2>Staff Dashboard</h2></u>
        <br>       
        <div class="row">
            <div class="col-6 mb-5"><center>
                <h4> Customer Account</h4>
                <i class="fa fa-user" aria-hidden="true" style='font-size:36px'></i>
                <h5>{{$countuser}}</h5>
                <center><a href="manageUsers"><button type="button" class="btn btn-info text-white">View Accounts</button></a></center>
            </center></div>

            <div class="col-6 mb-5"><center>
                <h4>Requested Item List</h4>
                <i class="fa fa-list-alt" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="viewRepairServiceList"><button type="button" class="btn btn-info text-white">View Requests</button></a></center>
            </center></div>

            <div class="col-6 mb-5"><center>
                <h4>Track Items</h4>
                <i class="fa fa-map-marker" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="sTrackList"><button type="button" class="btn btn-info text-white">Track Item</button></a></center>
            </center></div>

        
        <div class="col-6 mb-5"><center>
                <h4>Manage Profile</h4>
                <i class='fas fa-user-cog' style='font-size:36px'></i>
                <h5></h5>
                <br>
                <a href="staffProfile"><button class="btn btn-info text-white">Manage Profile</button></a>
            </center></div>
        </div>       
    </div>
</body>
</html>