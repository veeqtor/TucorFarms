<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\addProductRequest;
use App\Product;
use App\Purchase;
use App\Thumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        $pending = Purchase::where('received', null)->count();
        $low = Product::where('quantity', '<', '5')->count();

        return view('admin.dashboard', compact('pending', 'low'));
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
        //
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


    /*
     * Begin - Category
     */
    public function category()
    {

        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $input = $request->all();

        $input['CSKU'] = rand(100, 999);

        $c = new Category();

        if ($c->create($input)) {
            session()->flash('cAdd', 'You have successfully added ' . $input['type'] . ' to the catalog');
        } else {
            session()->flash('cAdd', 'Oops! something went wrong could not add category');
        };


        return redirect()->back();
    }

    public function editCategory($id)
    {
        $editCategory = Category::findOrFail($id);

        $categories = Category::all();

        return view('admin.category', compact('editCategory', 'categories'));
    }

    public function updateCategory(Request $request, $id)
    {

        $c = Category::findOrFail($id);;

        if ($c->update($request->all())) {
            session()->flash('cUpdate', 'Update successful');
        } else {
            session()->flash('cUpdate', 'Oops! something went wrong could not update');
        };

        return redirect()->back();
    }

    public function deleteCategory($id)
    {
        $c = Category::findOrFail($id);

        if ($c->product()) {
            $c->product()->delete();
        }

        if ($c->delete()) {
            session()->flash('cDel', 'You have successfully deleted ' . $c->type . ' and all its contents from the catalog');
        } else {
            session()->flash('cDel', 'Oops! something went wrong could not delete');
        };

        return redirect()->back();
    }
    /*
     * End - Category
     */


    /**
     * Begin - Products
     */
    public function products()
    {
        $products = Product::paginate(10);

        $lowProducts = Product::where('quantity', '<', 5)->paginate(10);

        $categories = Category::pluck('type', 'id')->all();

        return view('admin.products', compact('products', 'categories', 'lowProducts'));
    }

    public function addProduct(addProductRequest $request)
    {
        $input = $request->all();

        $file = $request->file('thumbnail');

        $thumbnail = $input['item'] . time() . '.' . $file->getClientOriginalExtension();

        $file->move('img/thumbnails', $thumbnail);

        $thumb = Thumbnail::create(['thumbName' => $thumbnail]);

        $input['thumbnail_id'] = $thumb->id;

        $csku = Category::where('id', $input['category_id'])->firstOrFail();

        $input['SKU'] = $csku['CSKU'] . "" . decoct(random_int(rand(1, 1000), rand(2000, 5000)));

        /**
         * Look up for the category,
         * and then insert the data in to the corresponding tables
         * and check if true, the save a session message
         * */
        $category = Category::findOrFail($input['category_id']);

        if ($category->product()->create($input)) {
            session()->flash('pAdd', "You have successfully added " . $input['item'] . " to the catalog");
        } else {
            session()->flash('pAdd', 'Oops! something went wrong');
        }

        return redirect()->back();
    }

    public function editProduct($id)
    {
        $editProduct = Product::findOrFail($id);

        $products = Product::paginate(10);

        $lowProducts = Product::where('quantity', '<', 5)->paginate(10);

        $categories = Category::pluck('type', 'id')->all();

        return view('admin.products', compact('editProduct', 'categories', 'products', 'lowProducts'));
    }

    public function updateProduct(addProductRequest $request, $id)
    {
        $input = $request->all();
        $p = Product::findOrFail($id);

        if ($request->hasFile('thumbnail')) {

            unlink(public_path() . $p->thumbnail->thumbName);

            $t = Thumbnail::findOrFail($input['thumbnail_id']);

            $file = $request->file('thumbnail');

            $thumbnail = $input['item'] . time() . '.' . $file->getClientOriginalExtension();

            $file->move('img/thumbnails', $thumbnail);

            $t->update(['thumbName' => $thumbnail]);

        }

        DB::table('category_product')
            ->where('category_id', $p->category_id)
            ->update(['category_id' => $input['category_id']]);

        if ($p->update($input)) {
            session()->flash('pUpdate', 'You have successfully updated one item');
        } else {
            session()->flash('pUpdate', 'Oops! something went wrong');
        }

        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        $p = Product::findOrFail($id);

        $thumb_id = $p->thumbnail_id;

        unlink(public_path() . $p->thumbnail->thumbName);

        $pName = $p->item;

        if ($p->delete()) {
            $t = Thumbnail::findOrFail($thumb_id);
            $t->delete();
            session()->flash('pDel', 'You have successfully deleted ' . $pName . ' from the catalog');

        } else {
            session()->flash('pDel', 'Oops! something went wrong');
        };

        return redirect()->back();
    }

    /*
     * End - Products
     */

    public function order()
    {
        return view('admin.order');
    }

    public function ajaxOrderReferenceSearch()
    {
        $input = request()->all();
        $order = DB::table('purchases')
            ->where('reference_id', $input['reference_id'])
            ->get();
        return response()->json($order);
    }

    public function ajaxMarkAsDelivered()
    {
        $input = request()->all();
        DB::table('purchases')
            ->where('id', $input['order_id'])
            ->update(['received' => 2]);

        return response()->json();
    }

    public function ajaxMarkAsShipped()
    {
        $input = request()->all();
        DB::table('purchases')
            ->where('id', $input['order_id'])
            ->update(['received' => 1]);

        return response()->json();
    }

    public function ajaxAllOrdersCount()
    {
        $pending = DB::table('purchases')
            ->select('received')->where('received', null)
            ->count();
        $shipped = DB::table('purchases')
            ->select('received')->where('received', 1)
            ->count();
        $delivered = DB::table('purchases')
            ->select('received')->where('received', 2)
            ->count();

        return response()->json([$pending, $shipped, $delivered]);
    }

    public function ajaxAllPendingOrders()
    {
        $allPending = DB::table('purchases')
            ->where('received', null)
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json($allPending);
    }

    public function ajaxAllProcessedOrders()
    {
        $allProcessed = DB::table('purchases')
            ->where('received', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json($allProcessed);
    }

    public function ajaxAllDeliveredOrders()
    {
        $allDelivered = DB::table('purchases')
            ->where('received', 2)
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json($allDelivered);
    }

    public function ajaxOrderProcessing()
    {
        $input = request()->all();

        $purchase = DB::table('purchases')->select('id', 'purchases', 'reference_id', 'created_at', 'user_id')
            ->whereId($input['order_id'])
            ->first();
        $user = DB::table('users')->select('fname', 'lname', 'address', 'address2', 'phone')
            ->whereId($purchase->user_id)
            ->first();

        return response()->json([$purchase, $user]);
    }
}
