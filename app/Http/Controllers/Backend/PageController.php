<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\DeletePageRequest;

class PageController extends Controller
{
    public function index(){
    	$pages = Page::paginate(5);

    	return view('backend.pages.index')
    	->with(array('pages'=>$pages));
    }
    public function create(){
    	return view('backend.pages.create');
    }
    public function store(CreatePageRequest $request){
    	$data = $request->all();

    	$page = Page::create($data);
    	return redirect()->route('admin.pages.index')->withFlashSuccess("Page Created Successfully.");
    }
    public function show(){

    }
    public function edit($id){
    	$page = Page::find($id);

		if(!$page)
			abort(404);

		return view("backend.pages.edit")->with(array("page"=>$page));
    }
    public function update($id, UpdatePageRequest $request){
    	$data = $request->all();

		$page = Page::find($id);

		if(!$page)
			abort(404);
		$page->title = $data["title"];
		$page->slug = $data["slug"];
		$page->description = $data['description'];
		$page->save();

		return redirect()->back()->with("flash_success", "Page Updated Successfully.");
    }
    public function destroy($id, DeletePageRequest $request){
    	$page = Page::find($id);

    	if (!$page) {
    		return redirect (route('admin.pages.index'))->with("flash_waning","Page not found");
    	}
    	$page->delete();
    	return redirect(route("admin.pages.index"))->with("flash_success","Page Delete successfully!");
    }
}
