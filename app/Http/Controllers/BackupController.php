<?php

namespace App\Http\Controllers;

use App\Models\Backup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BackupController extends Controller
{
//    public $menu = [];
    public $tables = [];
    public $fp;
    public $file_name;
    public $_path = null;
    public $back_temp_file = 'db_backup_sysgym_';
    public $path = '_backup/';
    public $db_name = 'sysgym';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = $this->path;
        $backups = [];

        $list_files = glob($path . '*.sql');

        if ($list_files) {
            $list = array_map('basename', $list_files);
            rsort($list);
//            print_r($list);
//            die();
            foreach ($list as $id => $filename) {
                $columns = [];
                $columns['id'] = $id;
                $columns['name'] = basename($filename);
                $columns['size'] = filesize($path . $filename);

                $columns['create_time'] = date('Y-m-d H:i:s', filectime($path . $filename));
                $columns['modified_time'] = date('Y-m-d H:i:s', filemtime($path . $filename));

                $backups[] = $columns;
            }
        }
        return view('backup.index',compact('backups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->file_name = $this->path . $this->back_temp_file . date('Y.m.d_H.i.s') . '.sql';
        $pdo = \DB::getPdo();
        $backup = new DatabaseBackup($pdo);

        $backup->backup($this->file_name);

        $message = trans('adminlte_lang::message.msg_create_success_backup');
        return ['message'=>$message,'form'=>'backup','type'=>'success'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadPopup()
    {
        return view('backup.upload_backup');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {

        $success = false;

        if ($request->hasFile('file')){
            $upload_file = $request->file('file');
//            $filename  = time() . date('dmy') .'.' . $upload_file->getClientOriginalExtension();
            $filename  = $upload_file->getClientOriginalName();

            $destinationPath = '_backup/';

            if(!str_contains($filename, $this->back_temp_file)){
                $message = trans('adminlte_lang::message.msg_error_backup_file_name');
                return ['values'=>null,'message'=>$message,'form'=>'backup','type'=>'error'];
            }

            if(file_exists($destinationPath.$filename)){
                $message = trans('adminlte_lang::message.msg_error_backup_file_exist');
                return ['values'=>null,'message'=>$message,'form'=>'backup','type'=>'error'];
            }

            //Move Uploaded File
            $file = $upload_file->move($destinationPath,$filename);


            if(file_exists($file)){
                $success = true;
            }else{
                $message = trans('adminlte_lang::message.msg_error_upload_backup');
                return ['values'=>$file,'message'=>$message,'form'=>'backup','type'=>'error'];
            }
        }


        if (\Request::wantsJson() && $success ){
            $message = trans('adminlte_lang::message.msg_success_upload_backup');
            return ['values'=>$file,'message'=>$message,'form'=>'backup','type'=>'success'];
        }else{
            $message = trans('adminlte_lang::message.msg_error_upload_backup').' <br> '.$request->file('file')->getErrorMessage();
            return ['values'=>$file,'message'=>$message,'form'=>'backup','type'=>'error'];
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        //
        $sqlFile = $this->path . basename($request->fileName);
        $message = null;
        $type = null;
        if (file_exists($sqlFile)) {
            unlink($sqlFile);
            $type = 'success';
            $message = trans('adminlte_lang::message.msg_success_deleted_backup');
        } else {
            $type = 'error';
            $message = trans('adminlte_lang::message.msg_error_deleted_backup');
        }

        if (\Request::wantsJson()){
            return ['message'=>$message,'form'=>'files','type'=>$type];
        }

        return null;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $fileName
     * @return \Illuminate\Http\Response
     */
    public function download($fileName)
    {
        $sqlFile = $this->path . basename($fileName);

        if ( file_exists( $sqlFile ) ) {
            // Send Download
            return \Response::download($sqlFile, $fileName);
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        $sqlFile = $this->path . basename($request->fileName);
        $pdo = \DB::getPdo();
        $restore = new DatabaseBackup($pdo);

        if($restore->restore($sqlFile)){
            $type = 'success';
            $message = trans('adminlte_lang::message.msg_success_restore_backup');
        }else{
            $type = 'error';
            $message = trans('adminlte_lang::message.msg_error_restore_backup');
        }

        if (\Request::wantsJson()){
            return ['message'=>$message,'form'=>'backup','type'=>$type];
        }
        return null;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backup_list()
    {
        $path = $this->path;
        $backups = [];

        $list_files = glob($path . '*.sql');

        if ($list_files) {
            $list = array_map('basename', $list_files);
            sort($list);
            foreach ($list as $id => $filename) {
                $columns = [];
                $columns['id'] = $id;
                $columns['name'] = basename($filename);
                $columns['size'] = filesize($path . $filename);

                $columns['create_time'] = date('Y-m-d H:i:s', filectime($path . $filename));
                $columns['modified_time'] = date('Y-m-d H:i:s', filemtime($path . $filename));

                $backups[] = $columns;
            }
        }

        $type = 'load';

        return view('backup.list',compact('backups','type'));
    }
}
