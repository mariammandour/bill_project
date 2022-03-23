$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#ADDITEM").on('click', (function (e) {
        e.preventDefault();
        var url = 'store';

        var TableArray = [];
        $("table tr").each(function () {
            var obj = [
                {
                    id: $(this).find('td:eq(0)').text(),
                    name: $(this).find('td:eq(1)').text(),
                    quantity: $(this).find('td:eq(2) input').val(),
                    total: $(this).find('td:eq(5)').text()
                },
            ];
            TableArray.push(JSON.stringify(obj));
        });


        $('#input_hidden_field').val(JSON.stringify(TableArray));
        // var value = $('#input_hidden_field').val();
        // value = JSON.parse(value);
        var formData = {
            client: $('#client').val(),
            store_money: $('#store_money').val(),
            id: $('#item').val(),
            item: $('#item').val(),
            quantity: $('#quantity').val(),
            final_money: $('input[name=final_money]').val(),
            table_data: JSON.parse($('#input_hidden_field').val()),
        };

        var cells = new Array();
        $("table tr td.price").each(function () {
            cells.push($(this).html());
        });
        sum = 0;
        $.each(cells, function () { sum += parseFloat(this) || 0; });
        index++;
        $.ajax({
            url: url,
            data: formData,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                var item = '<tr><td>' + data.id + '</td><td>' + data.item +
                    '</td><td><input type="number" class="form-control" name="quantity" value=' + data.quantity +
                    ' name="quantity"></td><td>' + data.cost_price + '</td><td>' + data.sale_price +
                    '</td><td class="price">' + data.total +
                    '</td><td><button type="button" class="btn btn-danger" id="DeleteButton">Delete</button></td>'
                $('.list_item tbody').append(item);
                $('#total').html(sum + data.total);
            },
            async: false
        });
    }));

    $(document).on('change', 'input[name=quantity]', function () {
        var y = $(this).val();
        var x = $(this).closest("tr").find('td:eq(4)').html();
        $(this).closest("tr").find('td:eq(5)').html(y * x);

        var last = $("table").find('tr:eq(-2)').find('td:eq(5)').html();


        new_sum = 0;
        var cells = new Array();
        $("table tr td.price").each(function () {
            cells.push($(this).html());
        });
        $.each(cells, function () {
            new_sum += parseFloat(this) || 0;
        });
        $('#total').html(new_sum);
    });

    $(".table").on("click", "#DeleteButton", function () {
        $(this).closest("tr").remove();
        var x = $(this).closest("tr").find('td:eq(5)').html();
        var y = $('#total').html();
        $('#total').html(y - x);
    });

    $("#save").on('click', (function () {

        var final = $('#total').html();
        $('input[name=final_money]').val(final);

        var TableArray = [];
        $("table tr").each(function () {
            var obj = [
                {
                    id: $(this).find('td:eq(0)').text(),
                    name: $(this).find('td:eq(1)').text(),
                    quantity: $(this).find('td:eq(2) input').val(),
                    total: $(this).find('td:eq(5)').text()
                },
            ];
            TableArray.push(JSON.stringify(obj));
        });


        $('#input_hidden_field').val(JSON.stringify(TableArray));
        var value = $('#input_hidden_field').val();
        value = JSON.parse(value);

    }));

    //validate form
    $("form").validate({
        rules: {
            quantity: {
                min:1,
                required:true
            },
            client:"required",
            store_money:"required",
            item:"required",
        },
        messages: {
            quantity: {
                min: 'can not be min than 1',
                required:"Please enter the quantity",
            },
            client: "Please enter your client",
            store_money:"Please enter your store_money",
            item:"Please enter your item",
        },
        
        submitHandler: function (form) {
            form.submit();
        }
    });
});

