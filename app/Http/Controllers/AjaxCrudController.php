<?php

namespace App\Http\Controllers;

use App\AjaxCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AjaxCrudController extends Controller
{
  public function index()
	{
		$data = AjaxCrud::all();
		return view('ajax_crud.index',compact('data'));
	}

	public function saveData(Request $req)
	{
		if ($req->ajax()) {
			$rules = array(
				'title' => 'required',
				'body' => 'required',
			);
			// return response()->json($req->all());
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				return Response::json(array('errors'=>$validator->getMessageBag()->toArray()));
			} else {
				$addNew = new AjaxCrud();
				$addNew->title = $req->title;
				$addNew->body = $req->body;
				$addNew->save();
				return response()->json($addNew);
			}
		}
	}
}
