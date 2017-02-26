<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\product;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\DeleteOrderRequest;
use Auth;

use App\Models\OrderItem;

use App\Models\Order;
use Illuminate\Http\Request;
use Flash;

class OrderController extends Controller
{
    public function index(){
    	$orders=Order::join("users","users.id","=","orders.customer_id");
		$orders=$orders->select("orders.*","users.name AS user")
		->orderBy("orders.created_at","ASC")->paginate(5);
    	return view('Backend.orders.index')->with(array("orders"=>$orders));
    }

    public function create(){
    	$users=User::all()->pluck("name","id");
    	$products=Product::all()->pluck("title","id");
        
		return view("Backend.orders.create")
			->with(array("users"=>$users))
			->with(array("products"=>$products));
    }

    public function store(CreateOrderRequest $request){
    	$data=$request->all();
    	$order= Order::create($data);


    	$products=$data["product_id"];
    	//dd($products);
    	if (is_array($products)) {
    		foreach ($products as $product) {
    			OrderItem::create([
    					"order_id"=>$order->id,
    					"product_id"=>$product,
    					"order_item_amount"=>0
    				]);
    		}
    	}

    	return redirect(route('admin.orders.index'));
    }

    public function show($id){
    	$order_items=OrderItem::join("products","products.id","=","order_items.product_id")
    		->join("orders","orders.id","=","order_items.order_id")
    		->join("users","users.id","=","orders.customer_id")
    		->where("order_items.order_id",$id)
    		->select("order_items.*","users.name AS customer","products.title AS product_title","products.price AS product_price","orders.order_amount AS order_amount")
    		->paginate(10);


    	return view('Backend.orders.show')
    	->with(array("order_items"=>$order_items));
    }
    public function edit($id){
    	$order= Order::find($id);
		if(!$order){
			abort(404);
		}

		$users=User::all()->pluck("name","id");
		$products=Product::all()->pluck("title","id");

		return view("Backend.orders.edit")
		->with(array("order"=>$order,"users"=>$users,"products"=>$products));
    }
    public function update($id, UpdateOrderRequest $request){
    	$data = $request->all();

		$order = Order::find($id);
		if (!$order) 
			abort(404);

		

		$order->update($data);

		return redirect()->back()->with("flash_success", "Updated Successfully.");
    }

    public function destroy($id, DeleteOrderRequest $request){
    	$order= Order::find($id);

		if(!$order)
			return redirect (route('admin.orders.index'))->with("flash_waning","Order not found");
	
		$order->delete();
        return redirect(route("admin.orders.index"))->with("flash_success","Delete successfully!");
    }
}
