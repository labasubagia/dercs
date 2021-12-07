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
        .noborder {
            border: 0px none;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        
        <center><div style="font-size:large;"><h2>Thank you for trusting us!</h2></div></center>
        <br>       
            @foreach($info as $row)
            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                    <th>Service ID</th>
                    <td><input type="text" name="serviceID" value="{{$row->id}}" class="noborder"></td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td><input type="text" name="total" value="{{$row->total}}" class="noborder"></td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td><input type="text" name="paymentMethod" value="{{$row->paymentMethod}}" class="noborder"></td>
                </tr>
            </table>
            @endforeach
            <center>
                <a href="/customerHomepage"><button class="btn btn-warning">OK</button></a>
            </center>
            
    </div>
</body>
</html>