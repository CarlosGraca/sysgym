<?php

namespace App\Http\Controllers;

use App\File;
use App\PatientFiles;
use Illuminate\Http\Request;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $file = new File();
        $success = false;

        if ($request->hasFile('file')){
            $upload_file = $request->file('file');
            $filename  = time() . date('dmy') .'.' . $upload_file->getClientOriginalExtension();

            $file->name = $filename;
            $file->name_original = $upload_file->getClientOriginalName();
            $file->full_path = 'uploads/'.$filename;
            $file->mime_type = $upload_file->getMimeType();
            $file->media_type = $upload_file->getClientOriginalExtension();
            $file->user_id = \Auth::user()->id;
            $file->flag = $request->flag;
            $file->item_id = $request->item_id;
            $file->description = $request->description;

            //Move Uploaded File
            $destinationPath = 'uploads/';
            $upload_file->move($destinationPath,$filename);

//            if(file_exists($file->full_path)){
//                echo "Existe File <br>";
//            die();
//            }

            if($file->save()){
                /*$patient_files = new PatientFiles();
                $patient_files->file_id = $file->id;
                $patient_files->patient_id = $request->patient_id;
                $patient_files->user_id = \Auth::user()->id;
                $patient_files->save();*/
                $success = true;
            }else{
                $message = trans('adminlte_lang::message.msg_error_patient_files');
                return ['values'=>$file,'message'=>$message,'form'=>'files','type'=>'error'];
            }

            //echo $file->id;
        }

        //echo $success;

        if (\Request::wantsJson() && $success ){
            $message = trans('adminlte_lang::message.msg_success_patient_files');
            return ['values'=>$file,'message'=>$message,'form'=>'files','type'=>'success'];
        }else{
//            print_r();
//            die();
            $message = trans('adminlte_lang::message.msg_error_patient_files').' <br> '.$request->file('file')->getErrorMessage();
            return ['values'=>$file,'message'=>$message,'form'=>'files','type'=>'error'];
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $file = File::where('id',$id)->first();
        // Check if file exists in app/storage/file folder

        $headers = array(
            'Content-Type: '.$file->mime_type,
            'Content-Disposition: attachment; filename='.$file->name_original,
        );
        if ( file_exists( $file->full_path ) ) {
            // Send Download
            return \Response::download( $file->full_path, $file->name_original, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $file = File::where('id',$id)->first();
        // Check if file exists in app/storage/file folder

       return view('files.preview',compact('file'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        //
        $file = File::where('id',$id)->first();
       // $patient_files = PatientFiles::where('file_id',$id)->first();

       // if($patient_files->delete()){
           if($file->delete()){
               if(file_exists($file->full_path)) {
                   unlink($file->full_path);
               }
           }else{
               $message = trans('adminlte_lang::message.msg_error_deleted_patient_files');
               return ['message'=>$message,'form'=>'files'];
           }
        //

        if (\Request::wantsJson()){
            $message = trans('adminlte_lang::message.msg_success_deleted_patient_files');
            return ['message'=>$message,'form'=>'files'];
        }else{
            $message = trans('adminlte_lang::message.msg_success_deleted_patient_files');
            return ['values'=>$file,'message'=>$message,'form'=>'files'];
        }
        
    }
}
