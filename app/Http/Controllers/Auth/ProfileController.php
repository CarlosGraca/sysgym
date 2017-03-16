<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.profile');
    }

    public function update_avatar(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('avatar')){

            $image = $request->file('avatar');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('uploads/' . $filename);

            if($user->avatar != null && $user->avatar != 'img/avatar.png'){
              if(file_exists($user->avatar)){
                unlink($user->avatar);
              }
            }

            Image::make($image->getRealPath())->resize(200, 200)->save($path);


            $user->avatar = 'uploads/'.$filename;
            $user->save();
         }
         return redirect()->back();
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

    public function getPopEdit($name)
    {
      # code...
      $user = Auth::user();
      switch ($name) {
        case 'name':
          return view('layouts.shared.field',['name'=>$name,'label'=>'Name: ','value'=>$user->name]);
          break;
        case 'email':
          return view('layouts.shared.field',['name'=>$name,'label'=>'Email: ','value'=>$user->email]);
          break;

        default:
          # code...
          break;
      }
    }

    public function updateField(Request $request)
    {
      # code...
      $field = $request->input('field');
      $user = Auth::user();
      switch ($field) {
        case 'name':
          $user->name = $request->input('name');
          $user->save();
          return ['field_value'=>$user->name,'type'=>'success','message'=>'Name updated with success'];
          break;

        case 'email':
          $user->email = $request->input('email');
          $user->save();
          return ['field_value'=>$user->email,'type'=>'success','message'=>'Email updated with success'];
          break;

        default:
            return ['field_value'=>'','type'=>'error','message'=>'#Error: The user '.$field.' cannot saved!'];
          break;
      }
    }
}
