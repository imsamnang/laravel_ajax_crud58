<?php

namespace App\Http\Controllers;

use App\KeyWords;
use Illuminate\Http\Request;

class KeyWordsController extends Controller
{
	public function getKeyWords(Request $request){
		$keywordsObj = new KeyWords();
		$keywordsObj->setConnection($request->connection);
		$keywords = $keywordsObj->getKeyWords();
		foreach (json_decode($keywords) as $keyword){
				echo $keyword->keyword;
				echo '</br>';
		}
	}
}
