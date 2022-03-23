<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body class="container">
    <form class="p-5" action="{{route('bill.bill_store')}}"  method="post">
        @csrf
        <h3 class="text-center">Make Bill</h3>
        <div class="form-group">
            <label for="client">Client</label>
            <select class="form-control" id="client" name="client" class="client">
                @foreach($clients as $key => $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>

            <label for="exampleInputAddress">Store money</label>
            <select class="form-control" id="store_money" name="store_money">
                @foreach($stores as $key => $store)
                <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>


        <!-- add item -->
        <h3 class="text-center">Add items</h3>
        <label for="item">Item</label>
        <select class="form-control" name="item" class="item" id="item">
            @foreach($items as $key => $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" placeholder="quantity" name="quantity" value="1">
        </div>
        <input type="hidden" name="final_money" id="final_money" value='0'>

        <div class="text-center mb-3">
            <button type="button" class="btn btn-primary" id="ADDITEM">ADD ITEM</button>
        </div>


        <table class="table list_item">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">quantity</th>
                    <th scope="col">cost price</th>
                    <th scope="col">sales price</th>
                    <th scope="col">total price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th>total</th>
                    <th id="total">0</td>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <input type="hidden" name="table_data" id="input_hidden_field">
        <button type="submit" class="btn btn-primary p-3 mt-5" id="save">Save the Bill</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/bill.js') }}"></script>
</body>

</html>