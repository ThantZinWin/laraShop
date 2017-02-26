<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\DeleteCategroyRequest;
use Flash;
use Image;

class CategoryController extends Controller
{
	public function index(){
		$categories = Category::paginate(10);

		return view('backend.categories.index')->with(array("categories"=>$categories));
	}

	public function create(){
		$parent_categories= ["0"=>""]+Category::where("parent_id",0)->pluck("title","id")->toArray();
		return view("backend.categories.create")
		->with(array("parent_categories"=>$parent_categories));
	}

	public function store(CreateCategoryRequest $request){
		$data = $request->all();

		$img= Image::make($_FILES['icon_image']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpeg";
		$img->save(public_path("uploads/categories/".$img_name));
		$data["icon_image"]=$img_name;

		$category = Category::create($data);
		return redirect()->route('admin.categories.index')->withFlashSuccess("Category Created Successfully.");
	}

	public function show(){

	}

	public function edit($id){
		$category = Category::find($id);

		$parent_categories= ["0"=>""]+Category::where("parent_id",0)->pluck("title","id")->toArray();

		if(!$category)
			abort(404);

		return view("backend.categories.edit")->with(array("category"=>$category,"parent_categories"=>$parent_categories));
	}

	public function update($id, UpdateCategoryRequest $request){
		$data = $request->all();

		$category = Category::find($id);

		if(!$category)
			abort(404);

		$img= Image::make($_FILES['icon_image']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpeg";
		$img->save(public_path("uploads/categories/".$img_name));
		$data["icon_image"]=$img_name;

		$category->title = $data["title"];
		$category->icon_image = $data["icon_image"];
		$category->parent_id = $data["parent_id"];

		$category->save();

		return redirect()->back()->with("flash_success", "Updated Successfully.");
	}

	public function destroy($id,DeleteCategroyRequest $request){
		
		$category= Category::find($id);

		if(!$category)
			return redirect (route('admin.categories.index'))->with("flash_waning","Project not found");
	
		$category->delete();
        return redirect(route("admin.categories.index"))->with("flash_success","Delete successfully!");
    }    
}
