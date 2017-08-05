<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use Input;
use Response;

class SearchController extends Controller
{
	//SEARCH PATIENT AUTO COMPLETE
	public function client(){
		$term = Input::get('term');
		
		$results = array();
		
		$queries = DB::table('clients')
			->where('name', 'LIKE', '%'.$term.'%')
			->take(5)->get();
		
		foreach ($queries as $query)
		{
		    $results[] = [ 'id' => $query->id, 'value' => $query->name];
		}
		return Response::json($results);
	}

	//SEARCH DOCTOR AUTO COMPLETE
	public function employee(){
		$term = Input::get('term');

		$results = array();

		$queries = DB::table('employees')
			->where('name', 'LIKE', '%'.$term.'%')
			->take(5)->get();

		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->name];
		}
		return Response::json($results);
	}

	//SEARCH PROCEDURE AUTO COMPLETE
	public function modality(){
		$term = Input::get('term');

		$results = array();

		$queries = DB::table('modalities')
			->where('name', 'LIKE', '%'.$term.'%')
			->take(5)->get();

		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->name];
		}
		return Response::json($results);
	}

    //SEARCH PROCEDURE AUTO COMPLETE
    public function employee_category(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('category')
//			->where('doctor',1)
            ->where('name', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name];
        }
        return Response::json($results);
    }
}
