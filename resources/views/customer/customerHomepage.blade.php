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
        <u style="font-size:large;"><h2>Customer Homepage</h2></u>
        <br>       
        <div class="row">
            <div class="col"><center>
                <h4>Request Service</h4>
                <i class="fa fa-laptop" aria-hidden="true" style='font-size:36px'></i><i class="fa fa-desktop" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="/requestService"><button type="button" class="btn btn-warning">Request Service</button></a></center>
            </center></div>

            <div class="col"><center>
                <h4>Track Items</h4>
                <i class="fa fa-map-marker" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="cTrackList"><button type="button" class="btn btn-warning">Track Item</button></a></center>
            </center></div>

            <div class="col"><center>
                <h4>Item List</h4>
                <i class="fa fa-list-ul" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="viewItemList"><button type="button" class="btn btn-warning">View Item List</button></a></center>
            </center></div>  
        </div>
        <br><br><br>
        <div class='row'>
            <div class='col-lg-12'><center>
                <h4>Manage Profile</h4>
                <i class='fas fa-user-cog' style='font-size:36px'></i>
                <br><br>
                <a href="/customerProfile"><button class="btn btn-warning">Manage Profile</button></a>
            </center></div>
        </div>       
    </div>
</body>
</html>