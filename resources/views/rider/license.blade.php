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
        .spacing {
            margin-left: 35%;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <u style="font-size:large;"><h2>Rider License</h2></u>
        <br>
        <h4>Please name your license photo as your user ID according to your profile.</h4><br>
        <form action="riderLicenseUpload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" class="spacing" name="image" id="image"><br><br>
            <input type="hidden" name="status" value="1">
            <button type="submit" class="btn btn-warning spacing">Upload</button>
        </form>
        <br><br>
        <ul>
            @foreach($image as $row)
                <li>{{ $row->licensePhoto }}<br><img src="{{ asset('storage/licenseImages/'. $row->licensePhoto) }}"></li>
            @endforeach
        </ul>
    </div>
    <a href="/riderHomepage"><button class="homepage"><i class='fas fa-home' style='font-size:36px'></i></button></a>
    <script>
        var msg = '{{Session::get('success')}}';
        var exist = '{{Session::has('success')}}';
        if(exist){
            alert(msg);
        }
    </script>
</body>
</html>