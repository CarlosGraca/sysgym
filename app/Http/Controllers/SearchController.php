<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use Input;
use Response;

class SearchController extends Controller
{
	public function autocomplete(){
		$term = Input::get('term');
		
		$results = array();
		
		$queries = DB::table('patients')
			->where('name', 'LIKE', '%'.$term.'%')
			->take(5)->get();
		
		foreach ($queries as $query)
		{
		    $results[] = [ 'id' => $query->id, 'value' => $query->name];
		}
		return Response::json($results);
	}
}
