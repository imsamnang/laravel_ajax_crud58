<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
	public function index()
	{
		$cats = Category::get();
		return view('category.index',compact('cats'));
	}

	public function get()
	{
		$cats = Category::get();
		return view('category.cat_list',compact('cats'));
	}

	public function store(Request $request)
	{
		$cat = new Category();
		$image = $request->file('image');
		$new_name = rand().'-'.$image->getClientOriginalName();
		$image->move(public_path('Upload/Category/'),$new_name);
		$cat->name = $request->name;
		$cat->image = $new_name;
		if($cat->save()){
			\LogActivity::addToLog('My Testing Add To Log.');
			return "Successful";	
		}
	}

	public function edit(Request $request)
	{
		$cat = Category::findOrFail($request->id);
		return response($cat);
	}

	public function update(Request $request)
	{
		$old_image = $request->old_image;
		if($image = $request->file('image')){
			$new_name = rand().'-'.$image->getClientOriginalName();
			$image->move(public_path('upload/category/'),$new_name);
			File::delete(public_path('upload/category/'.$old_image));
		} else {
			$new_name = $old_image;
		}
		$form_data = array(
			'name' => $request->name,
			'image' => $new_name
		);
		$output = Category::findOrFail($request->cat_id)->update($form_data);
		\LogActivity::addToLog('My Testing Add To Log.');
		return response(Category::findOrFail($request->cat_id));
	}

	public function destroy(Request $request)
	{
		$cat = Category::findOrFail($request->id);
		File::delete(public_path('upload/category/'.$cat->image));
		if($cat->delete()){
			\LogActivity::addToLog('My Testing Add To Log.');
			return response($cat);
		}
	}
}
