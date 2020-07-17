<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transactions;
use App\TransactionDetails;
use App\TravelPackages;

use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $id)
    {
        return view('pages.checkout',[
            'item' => Transactions::with('details','tp','user')->findOrFail($id)
        ]);
    }

    public function process(Request $request , $id)
    {
        $tp = TravelPackages::findOrFail($id);

        $transaction = Transactions::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $tp->price,
            'transaction_status' => 'IN_CART',
        ]);

        TransactionDetails::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout',$transaction->id);
    }

    public function remove(Request $request , $detail_id)
    {
        $item = TransactionDetails::findOrFail($detail_id);

        $transaction = Transactions::with(['details','tp'])->findOrFail($item->transactions_id);

        if($item->is_visa){
            $transaction->transaction_total  -= 190;
            $transaction->additional_visa  -= 190;
        }

        $transaction->transaction_total -= $transaction->tp->price;
        $transaction->save();
        $item->delete();

        return redirect()->route('checkout',$item->transactions_id);
    }

    public function create(Request $request , $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetails::create($data);

        $transaction = Transactions::with(['tp'])->find($id);

        if($request->is_visa){
            $transaction->transaction_total  += 190;
            $transaction->additional_visa  += 190;
        }

        $transaction->transaction_total += $transaction->tp->price;
        $transaction->save();

        return redirect()->route('checkout',$id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transactions::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();
        return view('pages.success');
    }

   
}
