<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//LOGIN REDIRECT
Route::get('/', 'Auth\LoginController@redirectLogin');
Route::get('/login', 'Auth\LoginController@redirectLogin');

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('password/reset','Auth\ResetPasswordController@reset');

Route::get('forgot/password',function (){
    return view('auth.passwords.email');
});

Route::get('token_password/reset/',function ($token){
    return view('auth.passwords.email',compact('token'));
});

Route::post('setup/password','Auth\UserController@setup_password');

//
Route::group(['middleware' => ['web','auth','check_agenda']], function(){
    $system = \App\System::all()->first();
    \App::setLocale($system->lang);

    Route::resource('patients','PatientController');
    Route::resource('auth/profile', 'Auth\ProfileController');
    Route::resource('company','CompanyController');
    Route::resource('branches','BranchController');
    Route::resource('employees','EmployeeController');
    Route::resource('secure_agency','SecureAgencyController');
    Route::resource('category','CategoryController');
    Route::resource('consult_type','ConsultTypeController');
    Route::resource('system','SystemController');
    Route::resource('consult_agenda','ConsultAgendaController');
    Route::resource('consult','ConsultController');
    Route::resource('users','Auth\UserController');
    Route::resource('secure_comparticipation','SecureComparticipationController');
    Route::resource('budget','BudgetController');
    Route::resource('secure_card','SecureCardController');
    Route::resource('campaign_messages','CampaignMessageController');
    Route::resource('license_generate','Defaults');
    Route::resource('files','FileController');

});

/**/
Route::group(['middleware' => ['license']], function() {
    Route::resource('license','LicenseController');
});



//REPORT TO PATIENTS
Route::get('/patients/{id}/print','PatientController@_print');

//AGENDA
Route::get('agenda',function (){
   return view('calendar.index');
})->middleware('auth');

Route::get('agenda/get_all','ConsultAgendaController@getAllConsultAgenda');
Route::get('agenda/list_agenda','ConsultAgendaController@getTableData');
Route::post('agenda/drop_agenda','ConsultAgendaController@updateConsultAgenda');
Route::get('calendar',function (){
    return view('calendar.index_ajax');
});

Route::post('consult/confirm','ConsultAgendaController@confirm');
Route::post('consult/cancel','ConsultAgendaController@cancel');
Route::post('consult/re_agenda','ConsultAgendaController@re_agenda');



Route::post('consult_procedure/get_consult','SecureComparticipationController@getSecureComparticipation');

//GET CURRENCY VALUES
Route::get('/currency_format/{value}', 'Defaults@currency');

//Route
Route::get('search/autocomplete', 'SearchController@autocomplete');

//
Route::get('/island', 'IslandController@island');

//GET CATEGORY BASE SALARY
Route::get('/category/salary_base/{id}', 'CategoryController@getSalaryBase');

/*
Route::post('/pdf/sendMail/', 'MailController@sendReport');

Route::get('tests/pdf/download/{id}', 'TestController@downloadPDF');

Route::post('tests/pdf/downloadhtml/', 'TestController@downloadHTMLtoPDF');
*/
//Dashboard getData
Route::post('dashboard/graphic', 'DashboardGraphic@getData');

//Change user fields
// usage inside a laravel route
Route::post('upload','Auth\ProfileController@update_avatar');
Route::post('update/user/field/','Auth\ProfileController@updateField');
Route::get('edit/user/field/{name}','Auth\ProfileController@getPopEdit');
Route::get('employee/{id}','EmployeeController@getEmployee');

//BUILD USER
Route::get('build/{id}','Auth\UserController@build');

//RESET PASSWORD
Route::get('reset/password/{id}','Auth\UserController@reset_password');

//SYSTEM SETUP
Route::get('setup/system',function(){
    $default = new \App\Http\Controllers\Defaults();
    $system = \App\System::all()->first();
    $island = \App\Island::pluck('name','id');
    $theme = $default->getTheme();
    $lang = $default->getLang();
    $currency = $default->getCurrency();
    $layout = $default->getLayout();
    $timezone = \App\TimeZone::pluck('name','id');

    return view('system.setup',compact('island','system','theme','lang','currency','layout','timezone'));
});

//EXPIRED LICENSE
Route::get('license_expired',function(){
    return view('license.expired');
});

//MESSAGES
Route::get('mail','SendMailController@sendMail');

//ABOUT SYSTEM
Route::get('about_system','SystemController@aboutSystem');

//HELP
Route::get('help','SystemController@help');

//SCHEDULE
Route::post('schedule','BranchController@schedule');

//USERS SETUP PASSWORD
Route::get('user/setup/password',function(){
    return view('auth.setup_password');
});


//GET ALL EMPLOYEES CATEGORY
Route::get('category_all','CategoryController@getEmployeesCategory');


//DOWNLOAD FILE
Route::get('files/{id}/download','FileController@download');

//PREVIEW FILE
Route::get('files/{id}/preview','FileController@preview');

//REMOVE FILE
Route::get('files/{id}/remove','FileController@remove');

//OWN DOCUMENTS

Route::get('/sistema/Comum.do',function(\Illuminate\Http\Request $request)
{
  if ($request->get("act") == "loadUsuarioPAD") {
    return view('owner.Comum_utilizador');
  }elseif ($request->get("act") == "loadProprietarioPAD") {
    return view('owner.Comum_proprietario');
  }elseif ($request->get("act") == "loadLotePAD") {
    return view('owner.Comum_lote');
  }elseif ($request->get("act") == "loadComunidadePAD") {
    return view('owner.Comum_comunidade');
  }elseif ($request->get("act") == "insertAmanhoPDA") {
    echo "success";
  }
});
