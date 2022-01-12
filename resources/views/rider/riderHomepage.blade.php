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
        <u style="font-size:large;"><h2>Rider Homepage</h2></u>
        <br>
        <div class="row">
            <div class="col"><center>
                <h4>Delivery Jobs</h4>
                <i class="fa fa-tasks" aria-hidden="true" style='font-size:36px'></i>
                <h5></h5>
                <br>
                @if ($isRiderActive)
                    <center><a href="servicePage"><button type="button" class="btn btn-warning">View Jobs</button></a></center>
                @else
                    <p class="text-danger">Please Upload Your Driver License</p>
                @endif
            </center></div>

            <div class="col"><center>
                <h4>Manage Profile</h4>
                <i class='fas fa-user-cog' style='font-size:36px'></i>
                <h5>&nbsp;</h5>
                <br>
                <a href="riderProfile"><button class="btn btn-warning">Manage Profile</button></a>
            </center></div>
        </div>
        <br><br><br>
        <div class='row'>
            <div class='col-lg-12'><center>
                <h4>Driving License</h4>
                <i class='fas fa-user-cog' style='font-size:36px'></i>
                <br><br>
                <a href="riderLicenseView"><button class="btn btn-warning">Upload License</button></a>
            </center></div>
        </div>

    </div>
</body>
</html>
