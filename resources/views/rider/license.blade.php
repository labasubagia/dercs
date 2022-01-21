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
        .homepage {
                position: fixed;
                right: 25px;
                bottom: 15px;
                border-radius: 50%;
        }
        .spacing {
            margin-left: 35%;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <h2 class="font-large">Rider License</h2>
        <p>Please upload your license photo</p>
        <form action="riderLicenseUpload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="status" value="1">

            <input type="file" class="custom-form-input" name="image" id="image"><br><br>
            <button type="submit" class="btn btn-info">Upload</button>
        </form>
        <br>
        @if ($image)
            <p>Current License</p>
            <img width="400px" src="{{ asset('storage/licenseImages/'. $image) }}">
            <br>
            <br>
        @endif
    </div>
    <a href="/riderHomepage"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
    <script>
        var msg = '{{Session::get('msg')}}';
        var exist = '{{Session::has('msg')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>
