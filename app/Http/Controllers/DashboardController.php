<?php

namespace App\Http\Controllers;

use App\Models\Matriculation;
use App\Models\Modality;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Auth;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_a = Client::where('status', 1)->where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_i = Client::where('status', 0)->where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_m = Modality::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();
        $total_mt = Matriculation::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();

        /*PAYMENTS*/
        $total_p = Payment::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id])->count();

        $free = Payment::where(['branch_id'=>Auth::user()->branch_id,'tenant_id'=>Auth::user()->tenant_id,'free'=>1])->count();

        $amounts =DB::table('payments')->where(['branch_id'=>Auth::user()->branch_id,
                                   'tenant_id'=>Auth::user()->tenant_id,
                                   'free'=>0 ])
                                 ->select(DB::raw('SUM(value_pay-((value_pay*discount)/100)) as total_payments'))
                                 ->get();

        
        $amountmodalities =  DB::table('modalities as a ')
                           ->leftjoin('matriculation as b' , function($join){
                              $join->on('a.id', '=', 'b.modality_id') ;  
                           }) 
                           ->leftjoin('payments as c', function($join){
                             $join->on('b.id', '=', 'c.item_id')
                              ->where('c.free',0);  
                           }) 
                           ->where(['a.status'=>1,'a.tenant_id'=>Auth::user()->tenant_id])
                           ->select('a.name', DB::raw('SUM(value_pay-((value_pay*discount)/100)) as total_payments'))
                           ->groupby('a.name')
                           ->get();

        $clientmodalities =  DB::table('modalities as a ')
                           ->leftjoin('matriculation as b' , function($join){
                              $join->on('a.id', '=', 'b.modality_id') ;  
                           }) 
                           ->leftjoin('clients as c', function($join){
                             $join->on('b.client_id', '=', 'c.id')
                              ->where('c.status',1);  
                           }) 
                           ->where(['a.status'=>1,'a.tenant_id'=>Auth::user()->tenant_id])
                           ->select('a.name', DB::raw('count(a.id) as total_clients'))
                           ->groupby('a.name')
                           ->get();

        $paymentsperdates = DB::table('payments as a')
                        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                        ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"),  DB::raw('SUM(value_pay-((value_pay*discount)/100)) as total_payments'))
                        ->where(['a.free'=>0,'tenant_id'=>Auth::user()->tenant_id])
                        ->get();     

        $clientsperdates = DB::table('clients as a')
                        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
                        ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"),   DB::raw('count(a.id) as total_clients'))
                        ->where(['a.status'=>1,'tenant_id'=>Auth::user()->tenant_id])
                        ->get();            

        
        $lava = new Lavacharts;

        $amountpermodalities = $lava->DataTable();
        $amountmonth = $lava->DataTable();
        $clientmodality = $lava->DataTable();
        $clientDates = $lava->DataTable();
        
        ////////////////////////////////////////////////////////
        $data = array();
        $amountpermodalities->addStringColumn('Name');
        $amountpermodalities->addNumberColumn('Amounts');       
       
        foreach ($amountmodalities as $key => $value) {
           array_push($data, [$value->name,$value->total_payments]);
        }   

        $amountpermodalities->addRows($data);

        $lava->PieChart('PaymentPerModality', $amountpermodalities, [
            //'width' => 400,
            'pieSliceText' => 'value'
        ]);

        ////////////////////////////////////////////////////////
        $data = array();
        foreach ($paymentsperdates as $key => $value) {
           array_push($data, [$value->date,$value->total_payments]);
        }  
        $amountmonth->addDateColumn('Date')
                    ->addNumberColumn('Total')
                    ->setDateTimeFormat('Y-m-d');

        $amountmonth->addRows($data);

        $lava->ColumnChart('PaymentPerDate', $amountmonth, [
            'title' => 'Payment Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
        ////////////////////////////////////////////////////////

        $clientmodality->addStringColumn('Name');
        $clientmodality->addNumberColumn('Total');
       
        $data = array();
        foreach ($clientmodalities as $key => $value) {
           array_push($data, [$value->name,$value->total_clients]);
        }   

        $clientmodality->addRows($data);

        $lava->PieChart('ClientModality', $clientmodality, [
            //'width' => 400,
            'pieSliceText' => 'value'
        ]);

        ////////////////////////////////////////////////////////
        $data = array();
        foreach ($clientsperdates as $key => $value) {
           array_push($data, [$value->date,$value->total_clients]);
        }  
        $clientDates->addDateColumn('Date')
                    ->addNumberColumn('Total')
                    ->setDateTimeFormat('Y-m-d');

        $clientDates->addRows($data);

        $lava->ColumnChart('ClientPerDate', $clientDates, [
            'title' => 'Clients Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('dashboard.index',compact('total_a','total_i','total_m','total_mt','total_p','amounts','free','lava'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
