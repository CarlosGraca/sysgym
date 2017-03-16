<?php
/**
 * Created by PhpStorm.
 * User: MS-INSYS
 * Date: 24/12/2016
 * Time: 11:42
 */

namespace App\Http\Controllers;


//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\LicenseGeratorRequest;
use Illuminate\Support\Facades\Auth;
use App\System;

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
    private $system_name = 'ODONTSOFT';
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
     * @param  \Illuminate\Http\Request  $request
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

}