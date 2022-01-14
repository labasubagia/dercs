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
        <p style="font-size:large;"><h2>Customer Homepage</h2></p>
        <br>       
        <div class="row">
            <div class="col-6 mb-5"><center>
                <i class="fa fa-laptop" aria-hidden="true" style='font-size:36px'></i><i class="fa fa-desktop" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="/requestService"><button type="button" class="btn btn-info text-white">Request Service</button></a></center>
            </center></div>

            <div class="col-6 mb-5"><center>
                <i class="fa fa-map-marker-alt" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="cTrackList"><button type="button" class="btn btn-info text-white">Track Item</button></a></center>
            </center></div>

            <div class="col-6 mb-5"><center>
                <i class="fa fa-list-ul" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                <center><a href="viewItemList"><button type="button" class="btn btn-info text-white">View Item List</button></a></center>
            </center></div>  

            <div class="col-6 mb-5"><center>
                <i class='fas fa-user-cog' style='font-size:36px'></i>
                <h5></h5>
                <br>
                <a href="/customerProfile"><button class="btn btn-info text-white">Manage Profile</button></a>
            </center>
            </div>
        </div>
    </div>
</body>
</html>