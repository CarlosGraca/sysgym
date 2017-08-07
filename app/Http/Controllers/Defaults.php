<?php
/**
 * Created by PhpStorm.
 * User: MS-INSYS
 * Date: 24/12/2016
 * Time: 11:42
 */

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use App\Models\BranchPermission;
use Request;
use App\Http\Requests\LicenseGeratorRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\System;
//use NumberFormatter;

class Defaults extends Controller
{
    private $theme = [
        'skin-blue'=>'skin-blue',
        'skin-black'=>'skin-black',
        'skin-purple'=>'skin-purple',
        'skin-yellow'=>'skin-yellow',
        'skin-red'=>'skin-red',
        'skin-green'=>'skin-green',
        'skin-blue-light'=>'skin-blue-light',
        'skin-black-light'=>'skin-black-light',
        'skin-purple-light'=>'skin-purple-light',
        'skin-yellow-light'=>'skin-yellow-light',
        'skin-red-light'=>'skin-red-light',
        'skin-green-light'=>'skin-green-light',
    ];

    private $layout = [
        'fixed'=>'Fixed',
        'layout-boxed'=>'Layout Boxed',
        'layout-top-nav'=>'Layout Top Nav',
        'sidebar-collapse'=>'SideBar Collapse',
    ];
    private $lang = [
        'en'=>'English',
        'pt'=>'Portugues',
        'fr'=>'Francês',
        'es'=>'Espanhol',
    ];
    private $currency = [
        'USD' => 'USD',
        'EUR' => 'EUR',
        'CVE' => 'CVE',
        'GBP' => 'GBP',
        'INR' => 'INR',
        'AUD' => 'AUD',
        'CAD' => 'CAD',
        'SGD' => 'SGD',
        'CHF' => 'CHF',
        'MYR' => 'MYR',
        'JPY' => 'JPY',
        'BRL' => 'BRL',
        'STD' => 'STD',
        'AOA' => 'AOA',
    ];

    private $weeks = [
        'monday'    => 'Monday',
        'tuesday'   => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday'  => 'Thursday',
        'friday'    => 'Friday',
        'saturday'  => 'Saturday',
        'sunday'    => 'Sunday'
    ];

    private $oldWeeks = [
        'sunday','monday','tuesday','wednesday','thursday','friday','saturday'
    ];

    //SYSTEM NAME
    private $system_name = 'SYSGYM';
    private $rang_primo = 100;
    private $rang_impar = 99;
    private $time = [  'D', 'M', 'Y'];
    private $time_desc = [
        'day'   =>  'D',
        'month' =>  'M',
        'year'  =>  'Y'];
    private $default_time = '030';
    private $amount_time = 0;
    private $type_time = 'D';

//    TIMEZONE
    private $timezone = [
        '(UTC-11:00) Midway Island' => 'Pacific/Midway',
        '(UTC-11:00) Samoa' => 'Pacific/Samoa',
        '(UTC-10:00) Hawaii' => 'Pacific/Honolulu',
        '(UTC-09:00) Alaska' => 'US/Alaska',
        '(UTC-08:00) Pacific Time (US &amp; Canada)' => 'America/Los_Angeles',
        '(UTC-08:00) Tijuana' => 'America/Tijuana',
        '(UTC-07:00) Arizona' => 'US/Arizona',
        '(UTC-07:00) Chihuahua' => 'America/Chihuahua',
        '(UTC-07:00) La Paz' => 'America/Chihuahua',
        '(UTC-07:00) Mazatlan' => 'America/Mazatlan',
        '(UTC-07:00) Mountain Time (US &amp; Canada)' => 'US/Mountain',
        '(UTC-06:00) Central America' => 'America/Managua',
        '(UTC-06:00) Central Time (US &amp; Canada)' => 'US/Central',
        '(UTC-06:00) Guadalajara' => 'America/Mexico_City',
        '(UTC-06:00) Mexico City' => 'America/Mexico_City',
        '(UTC-06:00) Monterrey' => 'America/Monterrey',
        '(UTC-06:00) Saskatchewan' => 'Canada/Saskatchewan',
        '(UTC-05:00) Bogota' => 'America/Bogota',
        '(UTC-05:00) Eastern Time (US &amp; Canada)' => 'US/Eastern',
        '(UTC-05:00) Indiana (East)' => 'US/East-Indiana',
        '(UTC-05:00) Lima' => 'America/Lima',
        '(UTC-05:00) Quito' => 'America/Bogota',
        '(UTC-04:00) Atlantic Time (Canada)' => 'Canada/Atlantic',
        '(UTC-04:30) Caracas' => 'America/Caracas',
        '(UTC-04:00) La Paz' => 'America/La_Paz',
        '(UTC-04:00) Santiago' => 'America/Santiago',
        '(UTC-03:30) Newfoundland' => 'Canada/Newfoundland',
        '(UTC-03:00) Brasilia' => 'America/Sao_Paulo',
        '(UTC-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
        '(UTC-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
        '(UTC-03:00) Greenland' => 'America/Godthab',
        '(UTC-02:00) Mid-Atlantic' => 'America/Noronha',
        '(UTC-01:00) Azores' => 'Atlantic/Azores',
        '(UTC-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
        '(UTC+00:00) Casablanca' => 'Africa/Casablanca',
        '(UTC+00:00) Edinburgh' => 'Europe/London',
        '(UTC+00:00) Greenwich Mean Time : Dublin' => 'Etc/Greenwich',
        '(UTC+00:00) Lisbon' => 'Europe/Lisbon',
        '(UTC+00:00) London' => 'Europe/London',
        '(UTC+00:00) Monrovia' => 'Africa/Monrovia',
        '(UTC+00:00) UTC' => 'UTC',
        '(UTC+01:00) Amsterdam' => 'Europe/Amsterdam',
        '(UTC+01:00) Belgrade' => 'Europe/Belgrade',
        '(UTC+01:00) Berlin' => 'Europe/Berlin',
        '(UTC+01:00) Bern' => 'Europe/Berlin',
        '(UTC+01:00) Bratislava' => 'Europe/Bratislava',
        '(UTC+01:00) Brussels' => 'Europe/Brussels',
        '(UTC+01:00) Budapest' => 'Europe/Budapest',
        '(UTC+01:00) Copenhagen' => 'Europe/Copenhagen',
        '(UTC+01:00) Ljubljana' => 'Europe/Ljubljana',
        '(UTC+01:00) Madrid' => 'Europe/Madrid',
        '(UTC+01:00) Paris' => 'Europe/Paris',
        '(UTC+01:00) Prague' => 'Europe/Prague',
        '(UTC+01:00) Rome' => 'Europe/Rome',
        '(UTC+01:00) Sarajevo' => 'Europe/Sarajevo',
        '(UTC+01:00) Skopje' => 'Europe/Skopje',
        '(UTC+01:00) Stockholm' => 'Europe/Stockholm',
        '(UTC+01:00) Vienna' => 'Europe/Vienna',
        '(UTC+01:00) Warsaw' => 'Europe/Warsaw',
        '(UTC+01:00) West Central Africa' => 'Africa/Lagos',
        '(UTC+01:00) Zagreb' => 'Europe/Zagreb',
        '(UTC+02:00) Athens' => 'Europe/Athens',
        '(UTC+02:00) Bucharest' => 'Europe/Bucharest',
        '(UTC+02:00) Cairo' => 'Africa/Cairo',
        '(UTC+02:00) Harare' => 'Africa/Harare',
        '(UTC+02:00) Helsinki' => 'Europe/Helsinki',
        '(UTC+02:00) Istanbul' => 'Europe/Istanbul',
        '(UTC+02:00) Jerusalem' => 'Asia/Jerusalem',
        '(UTC+02:00) Kyiv' => 'Europe/Helsinki',
        '(UTC+02:00) Pretoria' => 'Africa/Johannesburg',
        '(UTC+02:00) Riga' => 'Europe/Riga',
        '(UTC+02:00) Sofia' => 'Europe/Sofia',
        '(UTC+02:00) Tallinn' => 'Europe/Tallinn',
        '(UTC+02:00) Vilnius' => 'Europe/Vilnius',
        '(UTC+03:00) Baghdad' => 'Asia/Baghdad',
        '(UTC+03:00) Kuwait' => 'Asia/Kuwait',
        '(UTC+03:00) Minsk' => 'Europe/Minsk',
        '(UTC+03:00) Nairobi' => 'Africa/Nairobi',
        '(UTC+03:00) Riyadh' => 'Asia/Riyadh',
        '(UTC+03:00) Volgograd' => 'Europe/Volgograd',
        '(UTC+03:30) Tehran' => 'Asia/Tehran',
        '(UTC+04:00) Abu Dhabi' => 'Asia/Muscat',
        '(UTC+04:00) Baku' => 'Asia/Baku',
        '(UTC+04:00) Moscow' => 'Europe/Moscow',
        '(UTC+04:00) Muscat' => 'Asia/Muscat',
        '(UTC+04:00) St. Petersburg' => 'Europe/Moscow',
        '(UTC+04:00) Tbilisi' => 'Asia/Tbilisi',
        '(UTC+04:00) Yerevan' => 'Asia/Yerevan',
        '(UTC+04:30) Kabul' => 'Asia/Kabul',
        '(UTC+05:00) Islamabad' => 'Asia/Karachi',
        '(UTC+05:00) Karachi' => 'Asia/Karachi',
        '(UTC+05:00) Tashkent' => 'Asia/Tashkent',
        '(UTC+05:30) Chennai' => 'Asia/Calcutta',
        '(UTC+05:30) Kolkata' => 'Asia/Kolkata',
        '(UTC+05:30) Mumbai' => 'Asia/Calcutta',
        '(UTC+05:30) New Delhi' => 'Asia/Calcutta',
        '(UTC+05:30) Sri Jayawardenepura' => 'Asia/Calcutta',
        '(UTC+05:45) Kathmandu' => 'Asia/Katmandu',
        '(UTC+06:00) Almaty' => 'Asia/Almaty',
        '(UTC+06:00) Astana' => 'Asia/Dhaka',
        '(UTC+06:00) Dhaka' => 'Asia/Dhaka',
        '(UTC+06:00) Ekaterinburg' => 'Asia/Yekaterinburg',
        '(UTC+06:30) Rangoon' => 'Asia/Rangoon',
        '(UTC+07:00) Bangkok' => 'Asia/Bangkok',
        '(UTC+07:00) Hanoi' => 'Asia/Bangkok',
        '(UTC+07:00) Jakarta' => 'Asia/Jakarta',
        '(UTC+07:00) Novosibirsk' => 'Asia/Novosibirsk',
        '(UTC+08:00) Beijing' => 'Asia/Hong_Kong',
        '(UTC+08:00) Chongqing' => 'Asia/Chongqing',
        '(UTC+08:00) Hong Kong' => 'Asia/Hong_Kong',
        '(UTC+08:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
        '(UTC+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
        '(UTC+08:00) Perth' => 'Australia/Perth',
        '(UTC+08:00) Singapore' => 'Asia/Singapore',
        '(UTC+08:00) Taipei' => 'Asia/Taipei',
        '(UTC+08:00) Ulaan Bataar' => 'Asia/Ulan_Bator',
        '(UTC+08:00) Urumqi' => 'Asia/Urumqi',
        '(UTC+09:00) Irkutsk' => 'Asia/Irkutsk',
        '(UTC+09:00) Osaka' => 'Asia/Tokyo',
        '(UTC+09:00) Sapporo' => 'Asia/Tokyo',
        '(UTC+09:00) Seoul' => 'Asia/Seoul',
        '(UTC+09:00) Tokyo' => 'Asia/Tokyo',
        '(UTC+09:30) Adelaide' => 'Australia/Adelaide',
        '(UTC+09:30) Darwin' => 'Australia/Darwin',
        '(UTC+10:00) Brisbane' => 'Australia/Brisbane',
        '(UTC+10:00) Canberra' => 'Australia/Canberra',
        '(UTC+10:00) Guam' => 'Pacific/Guam',
        '(UTC+10:00) Hobart' => 'Australia/Hobart',
        '(UTC+10:00) Melbourne' => 'Australia/Melbourne',
        '(UTC+10:00) Port Moresby' => 'Pacific/Port_Moresby',
        '(UTC+10:00) Sydney' => 'Australia/Sydney',
        '(UTC+10:00) Yakutsk' => 'Asia/Yakutsk',
        '(UTC+11:00) Vladivostok' => 'Asia/Vladivostok',
        '(UTC+12:00) Auckland' => 'Pacific/Auckland',
        '(UTC+12:00) Fiji' => 'Pacific/Fiji',
        '(UTC+12:00) International Date Line West' => 'Pacific/Kwajalein',
        '(UTC+12:00) Kamchatka' => 'Asia/Kamchatka',
        '(UTC+12:00) Magadan' => 'Asia/Magadan',
        '(UTC+12:00) Marshall Is.' => 'Pacific/Fiji',
        '(UTC+12:00) New Caledonia' => 'Asia/Magadan',
        '(UTC+12:00) Solomon Is.' => 'Asia/Magadan',
        '(UTC+12:00) Wellington' => 'Pacific/Auckland',
        '(UTC+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
    ];

    private $status = ['canceled','scheduled','confirmed','expired','in_progress'];
    private $status_color = ['danger','info','success','default','warning'];

    //DATE FORMAT
    private $date_format = [
        'd/m/Y'
    ];

    //months
    private $monthNames =
        ['january',
        'february',
        'march',
        'april',
        'may',
        'june',
        'july',
        'august',
        'september',
        'october',
        'november',
        'december'
    ];

    /**
     * @return array
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @return array
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @return array
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return array
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @return array
     */
    public function getMonthNames()
    {
        $new_month = [];
        foreach ($this->monthNames as $month) {
            $name = trans('adminlte_lang::message.'.$month);
            $new_month = $new_month + [$month=>$name];
        }
        return $new_month;
    }

    /**
     * @return array
     */
    public function getWeeks()
    {
        $new_week = [];
        foreach ($this->oldWeeks as $week) {
            $name = trans('adminlte_lang::message.'.$week);
            $new_week = $new_week + [$week=>$name];
        }
        return $new_week;
    }

    /**
     * @return array
     */
    public function getTimeDesc()
    {
        return $this->time_desc;
    }

    /**
     * @return int
     */
    public function getAmountTime()
    {
        return $this->amount_time;
    }

    /**
     * @return string
     */
    public function getTypeTime()
    {
        return $this->type_time;
    }

    /**
     * @return array
     */
    public function getOldWeeks()
    {
        return $this->oldWeeks;
    }

    /**
     * @return array
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function getStatusColor()
    {
        return $this->status_color;
    }
    
    
    
    

    #GET SYSTEM CURRENCY
    public function currency($value){
        $system = System::all()->first();
        $money = $system->currency;
        $a = new \NumberFormatter("it-IT", \NumberFormatter::CURRENCY);
        return $a->formatCurrency($value, $money);
    }


    //GENERATE SYSTEM LICENCE

    #PRIMO FUNCTION
    private function getPrimos(){
        $primos = [];


        for ($i = 1; $i<$this->rang_primo; $i++){
            $aux = $this->isPrimo($i);
            if ($aux == 1){
                if($i <= 9 && $i > 0){
                    array_push($primos, '0'.$i);
                }else {
                    array_push($primos, $i);
                }
            }
        }

        return $primos;
    }

    #IMPAR FUNCTION
    private function getImpar(){
        $impar = [];
        for ($i = 1; $i<$this->rang_impar; $i++){
            if($i%2 != 0){
                if($i <= 9 && $i > 0){
                array_push($impar, '0'.$i);
                }else{
                    array_push($impar, $i);
                }
            }
        }

        return $impar;
    }


    private function isPrimo($n){
        $cont=0;
        $sinal=0; //0-> ka primo, 1-> primo
        if($n<2){
            return $sinal;
        }

        for($i=1; $i<=$n; $i++)
        {
            if($n%$i==0)
                $cont++;
        }
        if($cont==2){
            $sinal=1;
        }

        return $sinal;
    }


    public function generate_license_key($nome,$duration, $time){

        $primos = $this->getPrimos();
        $impar = $this->getImpar();

        $company = $this->name_array($nome);

        $systema = str_split($this->system_name);

        $impar_index = array_rand($impar,2);
        $primos_index = array_rand($primos,2);

        $company_index = array_rand($company,4);
        $systema_index = array_rand($systema,4);

        $t_duration = $this->time_desc[$time];

        if ($duration <= 9 && $duration > 0){
            $duration = '00'.$duration;
        }elseif ($duration <= 99 && $duration >= 10){
            $duration = '0'.$duration;
        }

        

        //LICENÇA CODE EXAMPLE: 00XX-X00X-000X-XX00-00XX
        $license_key = ''.$primos[$primos_index[0]].$t_duration.$company[$company_index[0]].'-'
               .$systema[$systema_index[0]].''.$impar[$impar_index[0]].$systema[$systema_index[1]].'-'
               .$duration.''.$company[$company_index[1]].'-'
               .$company[$company_index[2]].$company[$company_index[3]].$primos[$primos_index[1]].'-'
               .$impar[$impar_index[1]].$systema[$systema_index[2]].$systema[$systema_index[3]];

        return $license_key;
    }

    private function name_array($name){
        $name = str_replace(['ª','.',' ',',','\\','/','í','à','á','º','ç'],"",strtoupper($name));
        $name = strtoupper($name);
        $array = str_split($name);
        return $array;
    }


    public function validate_license($key = '07YC-O43O-030A-IN83-55NO',$company_name = 'Clinica Dentaria Dr.ª Carmelinda Gonçalves'){
        //$company_name = "Aliexpress";
        //LICENÇA CODE EXAMPLE: 00XX-X00X-000X-XX00-00XX
        $primos = $this->getPrimos();
        $impar = $this->getImpar();
        $company = $this->name_array($company_name);
        $system = str_split($this->system_name);
        $time = $this->time;

        $array_key = str_replace(['-'],"",$key);
        $array_key = str_split($array_key);

        $p1 = $array_key[0].$array_key[1];
        $p2 = $array_key[14].$array_key[15];

        $i1 = $array_key[5].$array_key[6];
        $i2 = $array_key[14].$array_key[15];

        $c1 = $array_key[3];
        $c2 = $array_key[11];
        $c3 = $array_key[12];
        $c4 = $array_key[13];

        $s1 = $array_key[4];
        $s2 = $array_key[7];
        $s3 = $array_key[18];
        $s4 = $array_key[19];

        $t = strtoupper($array_key[2]); //IS DAY, MONTH OR YEAR
        $v = $array_key[8].$array_key[9].$array_key[10];

        //$array = array_sort_recursive($impar);
       // print_r($array);
        #echo $p1;

        if(!$this->binary_search($primos,$p1,0,count($primos))
            || !$this->binary_search($primos,$p2,0,count($primos))
            || !$this->binary_search($impar,$i1,0,count($impar))
            || !$this->binary_search($impar,$i2,0,count($impar))
            || !$this->binary_search($company,$c1,0,count($company))
            || !$this->binary_search($company,$c2,0,count($company))
            || !$this->binary_search($company,$c3,0,count($company))
            || !$this->binary_search($company,$c4,0,count($company))
            || !$this->binary_search($system,$s1,0,count($system))
            || !$this->binary_search($system,$s2,0,count($system))
            || !$this->binary_search($system,$s3,0,count($system))
            || !$this->binary_search($system,$s4,0,count($system))
            || !$this->binary_search($time,$t,0,count($time))
        ){
           return false;
        }else{

            $this->amount_time = $v;
            $this->type_time = $t;
            return true;
        }

    }

    private function binary_search($array , $key, $inf, $sup){
        $array = array_sort_recursive($array);

        if($inf > $sup){
            return false;
        }

        $middle = intval(($inf + $sup) / 2);
        $value = $array[$middle];

        if($value == $key){
            return true;
        }

        if ($value < $key ){
            return $this->binary_search($array, $key, $middle + 1, $sup);
        }else{
            return $this->binary_search($array, $key, $inf, $middle - 1);
        }

    }

    //BYTE HUMAN READ
    public function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('license.generate');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  LicenseGeratorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenseGeratorRequest $request){
        //print_r($request->all());
        $mail = new SendMailController();

        $license_key = $this->generate_license_key($request->name, $request->duration, $request->time);

        $mail->sendMail(
            ['You\'re receive this email with license system key.'],
            ['This license key was generated by our system to using in ODONTSOFT Application'],
            'success',
            null,
            null,
            $request->name,
            'LICENSE ODONTSOFT KEY',
            $request->email,
            $license_key,
            'yes');



        if (\Request::wantsJson()){
        $message = trans('adminlte_lang::message.msg_generate_success_license');
        return ['values'=>$license_key,'message'=>$message,'form'=>'license'];
        }   else{
            return view('license.generate');
        }


    }
    
    /*
     *GENERATE RANDOM PASSWORD 
     * */
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    //GET CONVERT PHOTO FROM BASE64 TO PNG
    public function base64_to_png($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb");

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);

        return $output_file;
    }

    /**
     * @return array
     */
    public function getTimezone()
    {
        $timezone = [];

        foreach ($this->timezone as $key => $value) {
            $timezone[$value] = $key;
        }

        return $timezone;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $popover
     * @return \Illuminate\Http\Response
     */
    //THIS FUNCTION CONTROL POP OVER FIELDS
    public function GetPopOver(\Illuminate\Http\Request $request, $popover){
//        echo $popover.' SYSTEM';
        
        
        switch ($popover) {
            case 'payment-value':
                $placeholder = trans('adminlte_lang::message.value');
                return view('layouts.shared.field', ['name' => $popover, 'value' => ($request->val == 0 ? null : $request->val), 'type' => 'number', 'placeholder' => $placeholder]);
                break;

            case 'm_modality-discount':
                $placeholder = trans('adminlte_lang::message.value');
                return view('layouts.shared.field', ['name' => $popover, 'value' => ($request->val == 0 ? null : $request->val), 'type' => 'number', 'placeholder' => $placeholder]);
                break;

            case 'matriculation-modalities':
                $teeth = null;
                $teeth = Teeth::orderby('number')->pluck('number', 'id');
                $placeholder = trans('adminlte_lang::message.teeth_empty');
                return view('layouts.shared.field', ['name' => $popover, 'value' => $teeth, 'selected' => $request->id, 'type' => 'select', 'placeholder' => $placeholder]);
                break;

            case 'user-name':
                $user = \Auth::user();
                $placeholder = trans('adminlte_lang::message.name');
                return view('layouts.shared.field',['name'=>$popover,'value'=>$user->name,'type'=>'text', 'placeholder' => $placeholder]);
                break;

            case 'branch-select':
                $branches = BranchPermission::SELECT(\DB::raw("branches.id, branches.name"))->join('branches','branch_permission.branch_id','=','branches.id')
                    ->where(['branch_permission.user_id'=>\Auth::user()->id,'branches.tenant_id' => \Auth::user()->tenant_id]) ->pluck('name','id');

                $placeholder = trans('adminlte_lang::message.branch_select');
                return view('layouts.shared.field', ['name' => $popover, 'value' => $branches, 'selected' => $request->id, 'type' => 'select', 'placeholder' => $placeholder]);
                break;
            default:
                # code...
                break;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $popover
     * @return \Illuminate\Http\Response
     */
    public function SetPopOver(\Illuminate\Http\Request $request, $popover){
        
        switch ($popover) {
        
            case 'payment-value':
                $format_value = $this->currency($request->val);
                $remaining = doubleval(($request->total - $request->paid) - $request->val);
                $format_remaining = $this->currency($remaining);
                return ['value' => $request->val,'format_value'=>$format_value,'format_remaining'=>$format_remaining,'remaining'=>$remaining];
                break;
            case 'm_modality-discount':
                $format_discount = $this->currency($request->val);
                $m_modality_total = doubleval($request->total - $request->val);
                $format_m_modality_total = $this->currency($m_modality_total);
                return ['discount' => $request->val,'format_discount'=>$format_discount,'format_m_modality_total'=>$format_m_modality_total,'m_modality_total'=>$m_modality_total,'type'=>'success'];
                break;
            case 'matriculation-modalities':
                return ['id' => ($request->id == '' ? 0 : $request->id), 'value'=> ($request->id == '' ? '' : $request->value )];
                break;
            case 'user-name':
                $user = \Auth::user();
                $user->name = $request->value;
                $user->save();
                return ['field_value'=>$request->value,'type'=>'success','message'=>'Name updated with success'];
                break;

            case 'branch-select':
                $user = \Auth::user();
                $user->branch_id = ($request->id == '' ? 0 : $request->id);
                $user->save();

                return ['field_value'=>$request->value,'type'=>'success','message'=>'Name updated with success'];
                break;
            default:
                # code...
                break;
        }
        return ['id' => ($request->id == '' ? 0 : $request->id), 'value'=> ($request->id == '' ? '' : $request->value )];
    }

}