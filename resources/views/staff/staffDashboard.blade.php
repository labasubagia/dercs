<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
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
            <div class="col"><center>
                <h4> Customer Account</h4>
                <i class="fa fa-user" aria-hidden="true" style='font-size:36px'></i>
                <h5>{{$countuser}}</h5>
                <center><a href="manageUsers"><button type="button" class="btn btn-warning">View Accounts</button></a></center>
            </center></div>

            <div class="col"><center>
                <h4>Requested Item List</h4>
                <i class="fa fa-list-alt" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="viewRepairServiceList"><button type="button" class="btn btn-warning">View Requests</button></a></center>
            </center></div>

            <div class="col"><center>
                <h4>Track Items</h4>
                <i class="fa fa-map-marker" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="sTrackList"><button type="button" class="btn btn-warning">Track Item</button></a></center>
            </center></div>
        </div>
        <br><br><br>

        <div class='row'>
            <div class='col-lg-12'><center>
                <h4>Manage Profile</h4>
                <i class='fas fa-user-cog' style='font-size:36px'></i>
                <br><br>
                <a href="staffProfile"><button class="btn btn-warning">Manage Profile</button></a>
            </center></div>
        </div>       
    </div>
</body>
</html>