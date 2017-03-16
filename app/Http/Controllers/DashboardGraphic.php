<?php

namespace App\Http\Controllers;

use App\ConsultAgenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Test;
use App\Sheet;

class DashboardGraphic extends Controller
{
    //
    public function getData(Request $request)
    {
      # code...
      $start_time = $request->input('start_time');
      $endDate = $request->input('endDate');

    //  echo $request->input('start_time');
     //echo $start_time;
     //echo $endDate;

      $consult_agenda = ConsultAgenda::select(\DB::raw('MONTHNAME(date) as month'), \DB::raw("DATE_FORMAT(date,'%Y-%m') as monthNum"), DB::raw('count(*) as agenda_count'))//->where('status','1')
      ->whereBetween(\DB::raw("DATE_FORMAT(date,'%Y-%m-%d')"), [$start_time, $endDate])->orderBy(DB::raw("DATE_FORMAT(date,'%Y-%m')"))->groupBy(DB::raw("MONTHNAME(date)"))->groupBy(DB::raw("DATE_FORMAT(date,'%Y-%m')"))->get();
        /*
              $sheets = Sheet::select(\DB::raw('MONTHNAME(created_at) as month'), \DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthNum"), DB::raw('count(*) as sheet_count'))->where('status','1')
              ->whereBetween(\DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), [$start_time, $endDate])->orderBy(DB::raw("DATE_FORMAT(created_at,'%Y-%m')"))->groupBy(DB::raw("MONTHNAME(created_at)"))->groupBy(DB::raw("DATE_FORMAT(created_at,'%Y-%m')"))->get();
        */
    //  $tests = DB::select("select MONTHNAME(dt_test) as month, DATE_FORMAT(dt_test,'%Y-%m') as monthNum, count(tests.id) as test_count from `tests` group by DATE_FORMAT(dt_test,'%Y-%m'), MONTHNAME(dt_test)");
    //  $sheets = DB::select("select MONTHNAME(created_at) as month, DATE_FORMAT(created_at,'%Y-%m') as monthNum, count(sheets.id) as sheet_count from `sheets` group by DATE_FORMAT(created_at,'%Y-%m'), MONTHNAME(created_at)");

      $data = ['consult_agenda'=>$consult_agenda];

      return $data;
    }
}
