<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{

    public function index()
    {
			$articles = Article::get();
      return view('article.index',compact('articles'));
    }

    public function create()
    {
			return view('article.create');
    }

    public function store(Request $request)
    {
			$request->validate([
				'title' => 'required|min:3',
				'body' => 'required|min:3'
			]);
			// $validator = Validator::make($request->all(),[
			// 	'title' => 'required|min:3',
			// 	'body' => 'required|min:3'				
			// ]);
			// if ($validator->fails()) {
			// 	return back()->with('error',$validator->messages()->all()[0])->withInput();
			// }
      $article = Article::create([
				'title' => $request->title,
				'body' => $request->body,
				'image' => $request->image
			]);
			return redirect()->route('articles.index')->with('success','Article Create');
    }

    public function show(Article $article)
    {
      return view('article.delete',compact('article'));
    }

    public function edit(Article $article)
    {
      return view('article.edit',compact('article'));
    }


    public function update(Request $request, Article $article)
    {
			$article->update($request->all());
			return  redirect()->route('articles.index')->with('toast_success','Article has been updated');
    }

    public function destroy(Article $article)
    {
			$article->delete();
			return redirect()->route('articles.index')->with('success','Article has been deleted');
    }
}
