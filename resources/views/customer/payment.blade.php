<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
        src="https://www.paypal.com/sdk/js?client-id=AZsNRTgEFaaoseMgYqd3BMUsEb9OTeFkkTX8ZmNYC5652wjkbSFfbUUwVN-KkLckK6GZMAuXoHImnfnR&currency=MYR&disable-funding=credit,card">
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.                                     
    </script>
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')
    <style>
        .topmargin {
            margin-top: 5%;
        }
        th {
            width: 200px;
            padding: 15px;
            font-size: 17px;
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
            <a href="/viewItemList"><i class="text-secondary fas fa-arrow-left"></i></a> Payment Information</h2></p>
        <br>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    @foreach ($info as $row)
                        <tr>
                            <th>Username :</th>
                            <td><input type="text" value="{{$row->username}}" class="noborder" readonly></td>
                        </tr>
                        <tr>
                            <th>Total Price :</th>
                            <td><input type="text" value="{{$row->estimateCost}}" class="noborder" readonly></td>
                        </tr>
                    
    
                            <th>Pay Now :</th>
                            <td>
                            <form action="cod" method="post">
                                @csrf
                                <input type="hidden" name="serviceID" value="{{$row->id}}">
                                <input type="hidden" name="paymentMethod" value="COD">
                                <input type="hidden" name="estimateCost" value="{{$row->estimateCost}}">
                                <button type="submit" class="btn btn-info text-white" style="height: 10%">Confirm</button>
                            </form>
                            </td>
                        </tr>
                        {{-- <tr>
                            <th></th>
                            <td>
                                <div id="paypal-button-container"></div>
                                <script>
                                    paypal.Buttons({
                                        createOrder: function(data, actions) {
                                        // This function sets up the details of the transaction, including the amount and line item details.
                                            return actions.order.create({
                                                purchase_units: [{
                                                    amount: {
                                                        currency_code: 'MYR',
                                                        value: '{{$row->estimateCost}}',
                                                    },
                                                    shipping: {
                                                        name: {
                                                            full_name: '{{$row->username}}'
                                                        },
                                                    address: {
                                                        address_line_1: '{{$row->address}}',
                                                        address_line_2: 'unknown',
                                                        admin_area_2: 'unknown',
                                                        admin_area_1: 'unknown',
                                                        postal_code: 'unknown',
                                                        country_code: 'MY'
                                                    }
                                                    }
                                                    
                                                }]
                                            });
                                        },
                                        onApprove: function(data, actions) {
                                            // This function captures the funds from the transaction.
                                            return actions.order.capture().then(function(details) {
                                                // This function shows a transaction success message to your buyer.
                                                alert('Transaction Successful!');
                                                window.location.href = "/paymentSuccessful/{{$row->id}}/{{$row->estimateCost}}";
                                            });
                                        }
                                    }).render('#paypal-button-container');
                                    //This function displays Smart Payment Buttons on your web page.
                                </script>
                            </td>  
                        </tr>              --}}
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>
