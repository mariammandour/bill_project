<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\item;
use App\Models\client;
use App\Models\bill_item;
use App\Models\store_money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

class billController extends Controller
{   
    public function index()
    {
        $clients = client::get();
        $stores = store_money::get();
        $items = item::get();
        return view('bill/index', [
            'clients' => $clients,
            'stores' => $stores,
            'items' => $items
        ]);
    }

    public function store(request $request)
    {
        $data = $request->validate([
            'client' => 'required',
            'store_money' => 'required',
            'item' => 'required',
            'quantity' => 'required',
            'final_money' => 'required',
            'table_data' => 'required',
        ]);
        $item = item::find($request->item);
        $total = $item->sale_price * $request->quantity;
        $item_data = [
            'id' => $item->id,
            'item' => $item->name,
            'quantity' => $request->quantity,
            'cost_price' => $item->cost_price,
            'sale_price' => $item->sale_price,
            'total' => $total
        ];
        
        return Response::json($item_data);
    }

    public function bill_store(request $request)
    {   
        $plus = floatval($request->final_money);
        $store_money = store_money::find($request->store_money);
        $old = store_money::where('id', $request->store_money)->value('money_amount');
        $new = $plus + $old;
        $store_money->update([
            'money_amount' => $new,
        ]);
        $element = json_decode($request->table_data, true);

        $number=0;
        for ($i=1; $i < count($element)-1; $i++) {            
            foreach (json_decode($element[$i]) as $key => $x) {
                $number+=$x->quantity;
            }
        }
        $bill=[
            'item_count'=>$number,
            'total_bills'=>$plus,
            'client_id'=>$request->client,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $lastInsertId= DB::table('bills')->insertGetId($bill);
        for ($i=1; $i < count($element)-1; $i++) {            
            
            foreach (json_decode($element[$i]) as $key => $x) {
                $number+=$x->quantity;
                bill_item::create([
                    'bill_id'=>$lastInsertId,
                    'client_id'=>$request->client,
                    'item_id'=>$x->id,
                    'quantity'=>$x->quantity,
                    'total_price'=>$x->total,
                ]);
            }
        }
        return redirect(url('bill/bill_table'));
    }
}
