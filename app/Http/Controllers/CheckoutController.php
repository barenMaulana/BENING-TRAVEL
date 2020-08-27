<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Carbon\Carbon;
use App\travelPackages;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with([
            'travel_package', 'user', 'details'
        ])->findOrFail($id);

        return view('pages.checkout', [
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $item = travelPackages::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $item->id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $item->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5),
            'country' => "ID"
        ]);

        return redirect()->route('checkout', $transaction->id);
    }



    public function remove(Request $request, $detail_id)
    {
        $items = TransactionDetail::findOrFail($detail_id);
        $transaction = Transaction::with(['travel_package', 'details'])->findOrFail($items->transactions_id);

        if ($items->is_visa) {
            $transaction->transaction_total -= 100;
            $transaction->additional_visa -= 100;
        }
        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();
        $items->delete();

        return redirect()->route('checkout', $items->transactions_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'country' => 'required|string',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data["transactions_id"] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->findOrFail($id);

        if ($request->is_visa) {
            $transaction->transaction_total += 100;
            $transaction->additional_visa += 100;
        }
        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout', $transaction->id);
    }

    public function success(Request $request, $id)
    {
        $item = Transaction::findOrFail($id);
        $item->transaction_status = "PENDING";
        $item->save();
        return view("pages.success");
    }
}
