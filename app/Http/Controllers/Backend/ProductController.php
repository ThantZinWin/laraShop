<?php

namespace App\Http\Controllers\Backend; 

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Models\Category;
use App\Models\Brand;
use Auth;

use Illuminate\Http\Request;
use App\Models\Product;
use Flash;
use Image;

class ProductController extends Controller
{
    
	public function index(){
		$products=Product::join("users","users.id","=","products.user_id")
			->join("categories","categories.id","=","products.category_id")
			->leftjoin("brands","brands.id","=","products.brand_id");
		$products=$products->select("products.*","users.name AS user","categories.title AS category","brands.name AS brand")->orderBy("products.created_at","ASC")->paginate(5);
		
		return view("Backend.products.index")->with(array("products"=>$products));
	}

	public function create(){
		$categories=Category::all()->pluck("title","id");
		$brands=Brand::all()->pluck("name","id");
		return view("Backend.products.create")->with(array("categories"=>$categories,"brands"=>$brands));
	}

	public function store(CreateProductRequest $request){
		$data = $request->all();

		if(!empty($_FILES['image']['name'])){
		$img= Image::make($_FILES['image']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpg";
		$img->save(public_path("uploads/products/".$img_name));
		$data["image"]=$img_name;
		}

		$data['user_id']=Auth::id();
		$pd= Product::create($data);

		return redirect(route('admin.products.index'));
	}

	public function show(){

	}

	public function edit($id){
		
		$product= Product::find($id);
		if(!$product){
			abort(404);
		}

		$categories=Category::all()->pluck("title","id");
		$brands = Brand::all()->pluck("name","id");

		return view("Backend.products.edit")
		->with(array("product"=>$product,"categories"=>$categories,"brands"=>$brands));

	}

	public function update($id, UpdateProductRequest $request){
		
		$data = $request->all();

		$product = Product::find($id);
		if (!$product) 
			abort(404);

		if(!empty($_FILES['image']['name'])){
		$img= Image::make($_FILES['image']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpg";
		$img->save(public_path("uploads/products/".$img_name));
		$data["image"]=$img_name;
		}

		$product->update($data);

		return redirect()->back()->with("flash_success", "Updated Successfully.");
	}

	public function destroy($id,DeleteProductRequest $request){
		
		$product= Product::find($id);

		if(!$product)
			return redirect (route('admin.products.index'))->with("flash_waning","Product not found");
	
		$product->delete();
        return redirect(route("admin.products.index"))->with("flash_success","Delete successfully!");
    }    
}
