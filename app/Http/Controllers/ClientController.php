<?php

namespace App\Http\Controllers;

use App\Company;
use App\File;
use App\Island;
use App\Client;
use Illuminate\Support\Facades\Auth;
use Request;
use Image;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{

    /**
     * Create a new controller instance.
     *
     *
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
        $clients = Client::all();

        if (\Request::wantsJson()) {
            return $clients;
        } else {
            return view('clients.index',compact('clients'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $island = Island::pluck('name','id');
//        $secure_agency = SecureAgency::pluck('name','id');
        if (\Request::ajax()) {
            return view('clients.create_ajax',compact('island'));
        }
        return view('clients.create',compact('island'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $default = new Defaults();
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->mobile = $request->mobile;
        $client->nif = $request->nif;
        $client->zip_code = $request->zip_code;
        $client->genre = $request->genre;
        $client->civil_state = $request->civil_state;
        $client->island_id = $request->island_id;
        $client->city = $request->city;
        $client->website = $request->website;
        $client->user_id = Auth::user()->id;
        $client->work_address = $request->work_address;
        $client->work_phone = $request->work_phone;
        $client->profession = $request->profession;
        $client->facebook = $request->facebook;
        $client->nationality = $request->nationality;
        $client->birthday = $request->birthday;
        $client->parents = $request->parents;
        $client->bi = $request->bi;
        $client->note = $request->note;


        if ($request->hasFile('avatar')){
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);
            $client->avatar = $filename;
        }

//        if($request->has_secure == 1){
//            $card = new SecureCard();
//            $card->start_date = $request->start_date;
//            $card->end_date = $request->end_date;
//            $card->note = $request->note_card;
//            $card->secure_number = $request->secure_number;
//            $card->secure_agency_id = $request->secure_agency;
//            $card->save();
//            $client->secure_card_id = $card->id;
//        }

        $client->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_client');
            return ['id'=>$client->id,'message'=>$message,'form'=>'client'];
        }else{
             return view('clients');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $Files = File::where(['item_id'=>$client->id,'flag'=>1])->get();
//        $consult_agenda = ConsultAgenda::where('client_id',$client->id)->orderby('date','desc')->get();
//        $matriculation = Matriculation::where('client_id',$client->id)->get();
        
        if (Request::wantsJson()){
            return ['name'=>$client->name,'mobile'=>$client->mobile,'phone'=>$client->phone,'email'=>$client->email,'avatar'=>$client->avatar];
        }elseif (Request::Ajax()){
            return view('people.show_ajax',['people'=>$client, 'type_people'=>'client']);
        }else{
           return view('clients.show',compact('client','Files'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $island = Island::pluck('name','id');
//        $secure_agency = SecureAgency::pluck('name','id');
//        $card = SecureCard::where('id',$client->secure_card_id)->first();
        return view('clients.edit',compact('client','island'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        //
        $default = new Defaults();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->mobile = $request->mobile;
        $client->nif = $request->nif;
        $client->zip_code = $request->zip_code;
        $client->genre = $request->genre;
        $client->civil_state = $request->civil_state;
        $client->island_id = $request->island_id;
        $client->city = $request->city;
        $client->website = $request->website;
        $client->user_id = \Auth::user()->id;
        $client->work_address = $request->work_address;
        $client->work_phone = $request->work_phone;
        $client->profession = $request->profession;
        $client->facebook = $request->facebook;
        $client->nationality = $request->nationality;
        $client->birthday = $request->birthday;
        $client->parents = $request->parents;
        $client->bi = $request->bi;
        $client->note = $request->note;



        if ($request->hasFile('avatar')){
            
            $img_base64 = $request->avatar_crop;
            $filename = 'uploads/' .time().'.png';
            $default->base64_to_png($img_base64, $filename);

            if($client->avatar && $client->avatar != 'img/avatar.png'){
                if(file_exists($client->avatar)){
                    unlink($client->avatar);
                }
            }

            $client->avatar = $filename;
        }

//        $card = SecureCard::where('id',$client->secure_card_id)->first();
//        if(isset($card)){
//            $card->start_date = $request->start_date;
//            $card->end_date = $request->end_date;
//            $card->note = $request->note_card;
//            $card->secure_number = $request->secure_number;
//            $card->secure_agency_id = $request->secure_agency;
//            $card->save();
//        }else{
//            if($request->has_secure == 1){
//                $card = new SecureCard();
//                $card->start_date = $request->start_date;
//                $card->end_date = $request->end_date;
//                $card->note = $request->note_card;
//                $card->secure_number = $request->secure_number;
//                $card->secure_agency_id = $request->secure_agency;
//                $card->save();
//                $client->secure_card_id = $card->id;
//            }
//        }

        $client->save();

        if (Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_client');
            return ['values'=>$client,'message'=>$message,'form'=>'client'];
        }else{
             return view('clients.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
//        if(!$this->can_disable(\Input::get('id'))){
//            $message = trans('adminlte_lang::message.msg_error_disable_client');
//            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'client', 'type'=>'error'];
//        }

        $client = Client::where('id',\Input::get('id'))->first();
        $client->status = 0;

        if (Request::wantsJson() && $client->save()){
            $message = trans('adminlte_lang::message.msg_success_disable_client');
            return ['status_color'=>'bg-danger','message'=>$message,'form'=>'client', 'type'=>'success'];
        }else{
            return redirect('clients');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        $client = Client::where('id',\Input::get('id'))->first();
        $client->status = 1;

        if (Request::wantsJson() && $client->save()){
            $message = trans('adminlte_lang::message.msg_success_enable_client');
            return ['status_color'=>'bg-success','message'=>$message,'form'=>'client'];
        }else{
            return redirect('clients');
        }
    }

    /**
     * Show the form for print PDF the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function _print($id)
    {
        $client = Client::where('id',$id)->first();
        $company = Company::all()->first();
        return view('report.profile_print',['people'=>$client, 'company'=> $company , 'type_people' => 'client']);
    }

    private function can_disable($id){

        $consult_agenda = \DB::select( \DB::raw("SELECT id FROM consult_agenda WHERE client_id = $id AND status NOT IN (0,3) ") );

        if(count($consult_agenda) > 0){
            return false;
        }

        return true;

    }

    


}
