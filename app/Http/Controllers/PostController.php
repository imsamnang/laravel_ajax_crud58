<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::get();
		return view('post.index',compact('posts'));
	}

	public function getPost()
	{
		$posts = Post::get();
		return view('post.post_list',compact('posts'));
	}
	public function create()
	{
			//
	}

	public function store(Request $request)
	{
		if($request->ajax()){
			if($request->button_action=='insert'){
				$image = $request->file('image');
				$new_name = rand().'-'.$image->getClientOriginalName();
				$image->move(public_path('Upload/Post/'),$new_name);
				$form_data = array(
					'title' => $request->title,
					'body'	=> $request->body,
					'slug'	=> str_slug($request->title),
					'image' => $new_name
				);
				$output = Post::create($form_data);
			}
			if($request->button_action=='update'){
				$old_image = $request->old_image;
				$image = $request->file('image');
				if ($image) {
					File::delete(public_path('Upload/Post/'.$old_image));
					$new_name = rand().'-'.$image->getClientOriginalName();
					$image->move(public_path('Upload/Post/'),$new_name);
				} else {
					$new_name =$old_image;
				}
				$form_data = array(
					'title' => $request->title,
					'body'	=> $request->body,
					'slug'	=> str_slug($request->title),
					'image' => $new_name
				);
				$output = Post::findOrFail($request->post_id)->update($form_data);
			}
			echo json_encode($output);
		}
	}

	public function show(Request $request)
	{

	}

	public function edit(Request $request)
	{
		$post = Post::findOrFail($request->id);
		echo json_encode($post);
	}

	public function update(Request $request, Post $post)
	{
			//
	}

	public function destroy(Request $request)
	{
		$post = Post::findOrFail($request->id);
		File::delete(public_path('Upload/Post/'.$post->image));
		$post->delete();
	}
}
