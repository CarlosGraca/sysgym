<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use Input;
use Response;

class SearchController extends Controller
{
    /**
     * Search the specified resource in storage.
     *
     * @param  string $field
     * @return \Illuminate\Http\Response
     */
    public function search($field){

        $term = Input::get('term');
        $results = [];
        $queries = null;

        switch ($field){
            case 'client':
                $queries = DB::table('clients')
                    ->where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])
                    ->where('name', 'LIKE', '%'.$term.'%')
                    ->take(5)->get();
                break;
            case 'employee':
                $queries = DB::table('employees')
                    ->where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])
                    ->where('name', 'LIKE', '%'.$term.'%')
                    ->take(5)->get();
                break;
            case 'employee-category':
                $queries = DB::table('employees_category')
                    ->where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])
                    ->where('name', 'LIKE', '%'.$term.'%')
                    ->take(5)->get();
                break;
            case 'modality':
                $queries = DB::table('modalities')
                    ->where(['branch_id'=>\Auth::user()->branch_id,'tenant_id'=>\Auth::user()->tenant_id])
                    ->where('name', 'LIKE', '%'.$term.'%')
                    ->take(5)->get();
                break;
            case 'menu':
                $queries = DB::table('menus')
                    ->where('title', 'LIKE', '%'.$term.'%')
                    ->take(5)->get();

                foreach ($queries as $query)
                {
                    $results[] = [ 'id' => $query->id, 'value' => $query->title];
                }
                return Response::json($results);

                break;
        }

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->name];
        }
        return Response::json($results);

    }



    //SEARCH PROCEDURE AUTO COMPLETE
//    public function employee_category(){
//        $term = Input::get('term');
//
//        $results = array();
//
//        $queries = DB::table('category')
////			->where('doctor',1)
//            ->where('name', 'LIKE', '%'.$term.'%')
//            ->take(5)->get();
//
//        foreach ($queries as $query)
//        {
//            $results[] = [ 'id' => $query->id, 'value' => $query->name];
//        }
//        return Response::json($results);
//    }
}
