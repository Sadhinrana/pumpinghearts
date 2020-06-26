<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pumping Hearts | Order Invoice</title>
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">
</head>

<body>

<!-- Print Button -->
<a href="javascript:window.print()" class="print-button">Print this invoice</a>

<!-- Invoice -->
<div id="invoice">

    <!-- Header -->
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('home')}}"><div id="logo"><img src="{{asset('images/Logo-red-200px.png')}}" alt=""></div></a>
        </div>

        <div class="col-md-6">

            <p id="details">
                <strong>Order:</strong> {{$order->id}} <br#
            </p>
        </div>
    </div>


    <!-- Client & Supplier -->
    <div class="row">
        <div class="col-md-12">
            <h2>Invoice</h2>
        </div>

        <div class="col-md-6">
            <strong class="margin-bottom-5">Trainer</strong>
            <p>
                {{$trainer->title}}
            </p>
        </div>

        <div class="col-md-6">
            <strong class="margin-bottom-5">Customer</strong>
            <p>
                {{Auth::User()->name}}
            </p>
        </div>
    </div>


    <!-- Invoice -->
    <div class="row">
        <div class="col-md-12">
            <table class="margin-top-20">
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>

                <tr>
                    <td>{{$package->name}}</td>
                    <td>1</td>
                    <td>${{$package->price}}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-4 col-md-offset-8">
            <table id="totals">
                <tr>
                    <th>Total Due</th>
                    <th><span>${{$package->price}}</span></th>
                </tr>
            </table>
        </div>
    </div>


    <!-- Footer -->
    <div class="row">
        <div class="col-md-12">
            <ul id="footer">
                <li><span>www.pumpinghearts.net</span></li>
                <li>info@pumpinghearts.net</li>
                <li>(123) 123-456</li>
            </ul>
        </div>
    </div>

</div>


</body>
</html>
