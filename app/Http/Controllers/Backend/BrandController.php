<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Requests\DeleteBrandRequest;
use Flash;
use Image;


class BrandController extends Controller
{
    public function index(){
    	$brands = Brand::paginate(5);
    	
    	return view('backend.brands.index')
    	->with(array('brands'=>$brands));
    }
    public function create(){
    	return view('backend.brands.create');
    }
    public function store(CreateBrandRequest $request){
    	$data = $request->all();

		$img= Image::make($_FILES['logo']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpeg";
		$img->save(public_path("uploads/brands/".$img_name));
		$data["logo"]=$img_name;

		$brand = Brand::create($data);
		return redirect()->route('admin.brands.index')->withFlashSuccess("Brand Created Successfully.");
	}
    
    public function show(){

    }
    public function edit($id){
    	$brand = Brand::find($id);

		if(!$brand)
			abort(404);

		return view("backend.brands.edit")->with(array("brand"=>$brand));
    }
    public function update($id,UpdateBrandRequest $request){
    	$data = $request->all();

		$brand = Brand::find($id);

		if(!$brand)
			abort(404);

		$img= Image::make($_FILES['logo']['tmp_name']);
		$img->resize(800,640);
		$img_name=time().".jpeg";
		$img->save(public_path("uploads/brands/".$img_name));
		$data["logo"]=$img_name;

		$brand->name = $data["name"];
		$brand->logo = $data["logo"];

		$brand->save();

		return redirect()->back()->with("flash_success", "Updated Successfully.");
    }
    public function destroy($id, DeleteBrandRequest $request){
    	$brand= Brand::find($id);

		if(!$brand)
			return redirect (route('admin.brands.index'))->with("flash_waning","Brand not found");
	
		$brand->delete();
        return redirect(route("admin.brands.index"))->with("flash_success","Delete successfully!");
    }
}
