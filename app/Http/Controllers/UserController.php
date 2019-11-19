<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function getUsers(Request $request){
		if(!empty($request->schema)){
			config(["database.connections.$request->connection.database" => $request->schema]);
		}
		$userObj = new User();
		$userObj->setConnection($request->connection);
		$users = $userObj->getUsers();
		foreach ($users as $user){
				echo $user->name;
				echo '</br>';
		}
  }
}
