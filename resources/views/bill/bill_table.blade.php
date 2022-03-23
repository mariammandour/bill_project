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
    <h1 class="text-center">Bills</h1>
    <table class="table list_item">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">client name </th>
                <th scope="col">total bills</th>
                <th scope="col">items count</th>
                <th scope="col">date and time</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($bills as $key => $bill)
            <tr>
                <td>{{$bill->id }}</td>
                <td>{{ $bill->name }}</td>
                <td>{{ $bill->total_bills }}</td>
                <td>{{ $bill->item_count }}</td>
                <td>{{ $bill->updated_at }}</td>
                <td><a href="{{route('bill.detail',[$bill->id])}}" class='btn btn-primary m-r-1em'>Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/bill.js') }}"></script>
</body>

</html>