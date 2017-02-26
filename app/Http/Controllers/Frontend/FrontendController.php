<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Input;
use App\Http\Requests\SendEmailMessageContactRequest;
use Mail;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$categories = Category::nested()->get();
		// dd($categories);
		//$categoriesHTML = Category::renderAsHtml();
		//dd($categoriesHTML);

		//$categories = Category::where('parent_id',0)->get();


		$products =Product::where('category_id', 3)->take(4)->get();
		
		return view('frontend.index')
		->with(array('products'=>$products));
	}
	public function products(){
		// $categories = Category::where('parent_id',0)->get();


		$category_id = Input::get('category');
		$category = null;
		$category = Category::find($category_id);
		$keyword = Input::get('q');
		$products = Product::join('categories','categories.id','=','products.category_id');
		if ($category) {
			$products = $products->where('products.category_id',$category_id);
		}
		if ($keyword) {
			$products = $products->where('products.title','like','%'.$keyword.'%');
		}


		$products = $products->orderBy('products.created_at','Desc')
		->select('products.*','categories.title as category_title')
		->paginate(8);

		// if ($category) {
		// 	$products = Product::where('category_id',$category_id)->paginate(8);
		// }
		// else{
		// 	$products = Product::paginate(8);
		// }

		//$products = Product::join('categories','categories.id','=','products.category_id')->paginate(8);

		// $foodbeverages = Product::where('category_id', 1)->take(4)->get();
		// $tvs = Product::where('category_id', 2)->take(4)->get();
		// $healthbeauties = Product::where('category_id', 3)->take(4)->get();

		return view('frontend.products.index')
		->with(array('products'=>$products))
		->with(array('category'=>$category));
	}

	public function product_details($id){
		// $categories = Category::where('parent_id',0)->get();

		$product=Product::join("users","users.id","=","products.user_id")
			->join("categories","categories.id","=","products.category_id")
			->leftjoin("brands","brands.id","=","products.brand_id");
		$product=$product->select("products.*","users.name AS user","categories.title AS category","brands.name AS brand")
		->where("products.id",$id)
		->first();

		return view('frontend.products.product_details')
		->with(array("product"=>$product));
	}

	public function about(){

		return view('frontend.about.index');
	}

	public function contact(){
		// $categories = Category::where('parent_id',0)->get();

		return view('frontend.contact.contact');
	}

	public function send_message(SendEmailMessageContactRequest $request){
		$data = $request->all();

		Mail::send("frontend.email.contactmessage",$data,
		function ($message){
			$recepient = "thantzin.mya@gmail.com";
			$message->to($recepient);
			$message->subject("Message from LaraShop.com.mm");
		});

		return redirect(route('frontend.contact'))
		->with('flash_success','Your Submitted Email Send Successfully!');

	}



	public function faqs(){
		// $categories = Category::where('parent_id',0)->get();

		return view('frontend.faqs.faqs');
	}

	public function services(){
		// $categories = Category::where('parent_id',0)->get();

		return view('frontend.services.services');
	}
	
}
