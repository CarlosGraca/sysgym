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
Route::get('/', function () {
    return view('welcome');
});



Route::get('auth/register', 'Auth\RegisterController@redirectRegisterTenants');

Route::post('/register_tenant', 'Auth\RegisterController@registerTenants');

Route::get('/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');


//LOGIN REDIRECT
//Route::get('/', 'Auth\LoginController@redirectLogin');
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
Route::group(['middleware' => ['web','auth']], function(){
   // $system = \App\System::all()->first();
   // \App::setLocale($system->lang);
    
    Route::resource('clients','ClientController');
    Route::resource('auth/profile', 'Auth\ProfileController');
    Route::resource('company','CompanyController');
    Route::resource('branches','BranchController');
    Route::resource('employees','EmployeeController');
    Route::resource('category','CategoryController');
    Route::resource('modalities','ModalityController');
    Route::resource('system','SystemController');
    Route::resource('users','Auth\UserController');
    Route::resource('matriculation','MatriculationController');
    Route::resource('secure_card','SecureCardController');
    Route::resource('campaign_messages','CampaignMessageController');
    Route::resource('license_generate','Defaults');
    Route::resource('files','FileController');
    Route::resource('payments','PaymentController');
    Route::resource('roles','RoleController');
    Route::resource('permissions','PermissionController');
    Route::resource('domains', 'DomainController');
    Route::resource('menus', 'MenuController');
});

Route::get('/login-activity', 'LoginActivityController@index')->middleware('auth');

/**/
Route::group(['middleware' => ['license']], function() {
    Route::resource('license','LicenseController');
});

//REPORT PRINT
Route::get('/clients/{id}/print','ClientController@_print');
Route::get('/employees/{id}/print','EmployeeController@_print');

//PATIENT CHANGE STATUS
Route::post('clients/enable','ClientController@enable');
Route::post('clients/disable','ClientController@disable');

//EMPLOYEES CHANGE STATUS
Route::post('employees/enable','EmployeeController@enable');
Route::post('employees/disable','EmployeeController@disable');

//AGENDA
Route::get('agenda',function (){
   return view('calendar.index');
})->middleware(['auth','check_agenda']);

Route::get('agenda/get_all','ConsultAgendaController@getAllConsultAgenda');
Route::get('agenda/list_agenda','ConsultAgendaController@getTableData');
Route::post('agenda/drop_agenda','ConsultAgendaController@updateConsultAgenda');
Route::get('calendar',function (){
    return view('calendar.index_ajax');
});

Route::post('consult/confirm','ConsultAgendaController@confirm');
Route::post('consult/cancel','ConsultAgendaController@cancel');
Route::post('consult/re_agenda','ConsultAgendaController@re_agenda');

//Getting consult list item
Route::get('confirm_list','ConsultAgendaController@confirm_consult_list');
Route::get('cancel_list','ConsultAgendaController@cancel_consult_list');


Route::post('/procedure/secure/co_participation/get','SecureComparticipationController@getSecureComparticipation');


//GET CURRENCY VALUES
Route::get('/currency_format/{value}', 'Defaults@currency');

//SEARCH PATIENT
Route::get('search/client/autocomplete', 'SearchController@client');

//SEARCH DOCTOR
Route::get('search/employee/autocomplete', 'SearchController@employee');

//SEARCH PROCEDURE
Route::get('search/modality/autocomplete', 'SearchController@modality');

//SEARCH EMPLOYEE CATEGORY
Route::get('search/employee-category/autocomplete', 'SearchController@employee_category');

//
Route::get('/island', 'IslandController@island');

//GET CATEGORY BASE SALARY
Route::get('/category/salary_base/{id}', 'CategoryController@getSalaryBase');


//Dashboard getData
Route::post('dashboard/graphic', 'DashboardGraphic@getData');

//Change user fields
// usage inside a laravel route
Route::post('upload','Auth\ProfileController@update_avatar');
Route::get('employee/{id}','EmployeeController@getEmployee');


//POPOVER FIELD
Route::post('/edit/{popover}/field','Defaults@GetPopOver');
Route::post('/update/{popover}/field','Defaults@SetPopOver');

//PAYMENT PROCEDURE
Route::post('modalities/client','ModalityController@getClientModality');

//BUDGET PROCEDURE
Route::post('matriculation/modality','MatriculationController@modality');

//GENERATE BUDGET PAYMENT
Route::post('matriculation/payment','MatriculationController@generate_matriculation_payment');


//BUDGET CHANGE STATUS
Route::post('matriculation/publish','MatriculationController@publish');
Route::post('matriculation/approve','MatriculationController@approve');
Route::post('matriculation/cancel','MatriculationController@cancel');
Route::post('matriculation/reject','MatriculationController@reject');
//BUDGET REPORT
Route::get('matriculation/{id}/report', 'MatriculationController@report');

//BUILD USER
Route::get('build/{id}','Auth\UserController@build');

//RESET PASSWORD
Route::get('reset/password/{id}','Auth\UserController@reset_password');

//USER CHANGE STATUS
Route::post('users/enable','Auth\UserController@enable');
Route::post('users/disable','Auth\UserController@disable');


//PROCEDURE GROUP CHANGE STATUS
Route::post('procedure_group/enable','ProcedureGroupController@enable');
Route::post('procedure_group/disable','ProcedureGroupController@disable');

//PROCEDURE CHANGE STATUS
Route::post('procedure/enable','ProcedureController@enable');
Route::post('procedure/disable','ProcedureController@disable');

//PROCEDURE CHANGE STATUS
Route::post('secure_comparticipation/enable','SecureComparticipationController@enable');
Route::post('secure_comparticipation/disable','SecureComparticipationController@disable');

//Modality CHANGE STATUS
Route::post('modalities/enable','ModalityController@enable');
Route::post('modalities/disable','ModalityController@disable');

//ROLES CHANGE STATUS
Route::post('roles/enable','RoleController@enable');
Route::post('roles/disable','RoleController@disable');

//CATEGORY CHANGE STATUS
Route::post('category/enable','CategoryController@enable');
Route::post('category/disable','CategoryController@disable');

//PERMISSIONS CHANGE STATUS
Route::post('permissions/enable','PermissionController@enable');
Route::post('permissions/disable','PermissionController@disable');

//BRANCH CHANGE STATUS
Route::post('branches/enable','BranchController@enable');
Route::post('branches/disable','BranchController@disable');

//EXPIRED LICENSE
Route::get('license_expired',function(){
    return view('license.expired');
});

//MESSAGES
//Route::get('mail','SendMailController@sendMail');

//ABOUT SYSTEM
Route::get('about-system','SystemController@aboutSystem');

//HELP
Route::get('help','SystemController@help');

//SYSTEM SETUP
Route::get('setup/system',function()
{
    $default = new App\Http\Controllers\Defaults();
    $system = \App\System::all()->first();
    $island = \App\Island::pluck('name','id');
    $theme = $default->getTheme();
    $lang = $default->getLang();
    $currency = $default->getCurrency();
    $layout = $default->getLayout();
    $timezone = $default->getTimezone();
    $roles = \App\Role::pluck('name','id');

    return view('system.setup',compact('island','system','theme','lang','currency','layout','timezone','roles'));
});

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

Route::post('croppie',function(\Illuminate\Http\Request $request){
    return view('components.croppie',['type'=>$request->type,'src'=>$request->src]);
});
