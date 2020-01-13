<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LiveTableController extends Controller
{
	function index()
	{
		return view('live_table');
	}

	function fetch_data(Request $request)
	{
			if($request->ajax())
			{
					$data = DB::table('tasks')->orderBy('id','desc')->get();
					echo json_encode($data);
			}
	}

	function add_data(Request $request)
	{
			if($request->ajax())
			{
					$data = array(
							'task'    =>  $request->first_name,
							'task'     =>  $request->last_name
					);
					$id = DB::table('tasks')->insert($data);
					if($id > 0)
					{
							echo '<div class="alert alert-success">Data Inserted</div>';
					}
			} 
	}

	function update_data(Request $request)
	{
			if($request->ajax())
			{
					$data = array(
							$request->column_name =>  $request->column_value
					);
					DB::table('tasks')
							->where('id', $request->id)
							->update($data);
					echo '<div class="alert alert-success">Data Updated</div>';
			}
	}

	function delete_data(Request $request)
	{
			if($request->ajax())
			{
					DB::table('tasks')
							->where('id', $request->id)
							->delete();
					echo '<div class="alert alert-success">Data Deleted</div>';
			}
	}

}
