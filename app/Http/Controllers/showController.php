<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\bill_item;
use App\Models\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class showController extends Controller
{
    public function show()
    {
        $bills = bill::join('clients', 'clients.id', '=', 'bills.client_id')
            ->get(['bills.*', 'clients.name']);

        return view('bill/bill_table', [
            'bills' => $bills,
        ]);
    }
    public function detail($bill_id)
    {
        $bills = bill::where('bills.id', $bill_id)->join('clients', 'clients.id', '=', 'bills.client_id')
            ->get(['bills.*', 'clients.name']);
        $bill = bill::find($bill_id);
        $items = bill_item::where('bill_id', $bill->id)->join('items', 'items.id', '=', 'bill_items.item_id')
        ->get(['bill_items.*', 'items.name','items.sale_price']);;
        
        return view('bill/detail',[
            'bills' => $bills,
            'items' => $items
        ]);
    }
}
