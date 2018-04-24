<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
        //
        $aProducts = Product::all();

        $historys = Purchase::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        return view('user.history', compact('aProducts', 'historys'));
//
//        return view('user.purchases', compact('aProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $aProducts = Product::all();

        return view('user.profile', compact('user', 'aProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $user = User::findOrFail($id);
        $user->update($input);


        if ($input) {
            session()->flash('update-msg', 'You have successfully updated your profile');

            return $this->edit($id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadHistory()
    {
        $history = DB::table('purchases')
            ->select('purchases', 'reference_id', 'created_at')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();


        return response()->json($history);
    }

    public function loadPrint()
    {
        $ref = request()->all();

        $data = DB::table('purchases')
            ->select('purchases', 'created_at')
            ->where('reference_id', $ref['ref'])
            ->get();

        return response()->json($data);
    }

    public function printHistory()
    {

        return view('user.historyPrint');
    }

    public function allHistory()
    {
        return $this->index();
    }

    public function allPurchaseAjax()
    {
        $allPurchases = DB::table('purchases')
            ->select('purchases', 'created_at', 'id')
            ->where('user_id', Auth::user()->id)->get();

        return response()->json($allPurchases);
    }
}



