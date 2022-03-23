<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}" >

</head>

<body>
    <div class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="d-flex flex-row p-2"> <img src="{{asset('images/logo.jpeg')}}" width="88">
                        <div class="d-flex flex-column"> <span class="font-weight-bold">Tax Invoice</span> <small>INV-001</small> </div>
                    </div>
                    <hr>
                    <div class="table-responsive p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>To</td>
                                </tr>
                                <tr class="content">
                                @foreach($bills as $key => $bill)
                                    <td class="font-weight-bold">bill Number:{{ $bill->id }} <br>Data and Time: {{ $bill->updated_at }}  
                                    <br>Client name:{{ $bill->name }}</td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="products p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>Item name</td>
                                    <td>Total Price</td>
                                    <td>Quantity</td>
                                    <td class="text-center">Total</td>
                                </tr>
                                @foreach($items as $key => $item)
                                    <tr class="content">
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->sale_price }}</td>
                                        <td>{{$item->quantity }}</td>
                                        <td class="text-center">{{$item->quantity * $item->sale_price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="products p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td class="text-center">Total</td>
                                </tr>
                                <tr class="content">
                                @foreach($bills as $key => $bill)
                                    <td class="text-center">{{$bill->total_bills}}$</td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="address p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>Bank Details</td>
                                </tr>
                                <tr class="content">
                                    <td> Bank Name : ADS BANK <br> Swift Code : ADS1234Q <br> Account Holder : Jelly Pepper <br> Account Number : 5454542WQR <br> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</html>