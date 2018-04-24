<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{


//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        //
//        $aProducts = Product::where('availability', 1)->get();
//        return view('user.delivery', compact('aProducts'));
//
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
////        $user = User::findOrFail($id);
////        $aProducts = Product::where('availability', 1)->get();
////
////
////
////        return view('user.address', compact('aProducts', 'user'));
//
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request $request
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }


    /**
     * Custom functions
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function billing($id)
    {
        //
        $user = User::findOrFail($id);
        $aProducts = Product::all();


        return view('user.address', compact('aProducts', 'user'));

    }

    public function delivery($id)
    {

        //
        $user = User::findOrFail($id);
        $aProducts = Product::all();


        return view('user.delivery', compact('aProducts', 'user'));
    }

    public function payment($id)
    {
        //
        $user = User::findOrFail($id);
        $aProducts = Product::all();

        return view('user.payment', compact('aProducts', 'user'));
    }

    public function review($id)
    {

        //
        $user = User::findOrFail($id);
        $aProducts = Product::all();


        return view('user.review', compact('aProducts', 'user'));
    }

    public function CheckoutReview(Request $request, $id)
    {


    }

    public function addressUpdate(Request $request, $id)
    {
        //
        $input = $request->all();
        $user = User::findOrFail($id);
        $user->update($input);


        return redirect(route('checkout.delivery', $user->id));

    }

    public function deliveryUpdate(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);

        if ($user->update($input)) {

            return redirect(route('checkout.payment', $id));
        }
        return null;
    }

    public function PaymentUpdate(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);

        if ($user->update($input)) {

            return redirect(route('checkout.review', $id));
        }
        return null;
    }

    public function print()
    {
        return view('user.print');
    }

    /**
     * Ajax Calls
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxRequest()
    {
        $user = Auth::user();

        $purchases = DB::table('purchases')
            ->select('purchases', 'reference_id')
            ->where('user_id', $user['id'])
            ->latest()
            ->first();


        return response()->json($purchases);
    }


    public function ajaxRequestPost()
    {
        $input = request()->all();

        $user = Auth::user();
//        dd($input);
        $reference_id = bin2hex(random_bytes(5));

        Purchase::create(['user_id' => $user->id, 'purchases' => $input, 'reference_id' => $reference_id]);

        return response()->json();
    }
}
