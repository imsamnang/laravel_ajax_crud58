<?php

namespace App\Http\Controllers;

use App\XEditTable;
use Illuminate\Http\Request;

class XEditTableController extends Controller
{
	public function getUsers()
	{
		$users = XEditTable::all();
		return view('x-edit-table',compact('users'));
	}

	public function updateUser(Request $request)
	{
		XEditTable::find($request->pk)->update([$request->name => $request->value]);
		return response()->json(['success'=>'done']);
	}

	public function index()
	{
			//
	}

	public function create()
	{
			//
	}

	public function store(Request $request)
	{
			//
	}

	public function show(XEditTable $xEditTable)
	{
			//
	}

	public function edit(XEditTable $xEditTable)
	{
			//
	}

	public function update(Request $request, XEditTable $xEditTable)
	{
			//
	}

	public function destroy(XEditTable $xEditTable)
	{
			//
	}
}
