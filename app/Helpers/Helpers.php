<?php

use App\Models\Status;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Http;

/**
 * @param mode true = live
 * @param mode false = test
 * */ 
function VTpass_mode(){	
	$mode = true; // set it to be 'true' for live or 'false' for testing
	$live = "https://vtpass.com/api/";
	$test = "https://sandbox.vtpass.com/api/";
	if($mode)
		return $live;
	else
		return $test;
}

if(!function_exists('LoggedinUser')){
    function LoggedinUser(){
		$user = Auth::user();    
	    return $user;
	}
}
if(!function_exists('MyuniqCode')){
    function MyuniqCode($length = 6){
		// $characters = '0123456789';
		$characters = uniqid(implode('',explode('/',date("Y/m/d/H/i"))));
	   	$charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }	
	    // return $randomString;
	    return $characters;
	}
}
if(!function_exists('MyuniqCode2')){
    function MyuniqCode2($length = 6){
		$characters = '0123456789';
		// $characters = uniqid(implode('',explode('/',date("Y/m/d/H/i"))));
	   	$charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }	
	    return $randomString;
	    // return $characters;
	}
}

if(!function_exists('stringLenght')){
    function stringLenght($string,$length = null){
		$res = Str::limit($string, $length, $end='...');
		return $res;
	}
}

if(!function_exists('kulpercentage')){
    function kulpercentage($amount){
        $percent = 1.5;		    
        $percentage = $percent/100;
        return $amount * $percentage;
	}
}

if(!function_exists('deliveryPercentage')){
    function deliveryPercentage($amount,$percent){
        $percent = $percent;		    
        $percentage = $percent/100;
        return $amount * $percentage;
	}
}
// if(!function_exists('wallet_balance')){
//     function wallet_balance($amount){
//         return $wallet_balance = Auth::user()->account[0]->available_balance - $amount;
       
// 	}
// }

if(!function_exists('getNewSystemPasswordHash')){
    function getNewSystemPasswordHash($plain_password="12345678")
    {
        return Hash::make(trim($plain_password));
    }
}

// Encrypting any value
if(!function_exists('EncryptValue')){
    function EncryptValue($value= null)
    {        
        return Crypt::encryptString(trim($value == null?MyuniqCode2(4):$value));
    }
}

// Decrypting any value
if(!function_exists('DecryptValue')){
    function DecryptValue($value)
    {
        try {
            return Crypt::decryptString(trim($value));
        } catch (DecryptException $th) {
            dd($th);
        }        
    }
}

if(!function_exists('statusID')){
	function statusID($name=null){
		$status = Status::where('name',strtolower($name))->first();
		return $status->id;		
	}
}

if(!function_exists('orderCodeId')){
	function orderCodeId($code=null){
		$status = OrderCode::where('code',strtolower($code))->first();
		return $status->id;		
	}
}

if(!function_exists('userID')){
	function userID($name=null){
		return Auth::id();	
	}
}

// Account summary
if(!function_exists('AccountSummary')){
    
    function AccountSummary($userId = null){
        #if the incoming userId is not empty/null else assume is he loggedin user
        $userId = $userId!==null?$userId:LoggedinUser()->id;
        return $summary = Account::where('user_id',$userId)->first();
    }
}


function data_topup_curl_get_contents($network,$recepientPhone,$amount){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/datatopup.php?userid=".$APIuserID."&pass=".$APIkey."&network=".$network."&phone=".$recepientPhone."&amt=".$amount."&jsn=json";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result= curl_exec($ch);
	curl_close($ch);
	return $output = json_decode($result,true);
}

function phoneLookup($phone){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/hlrlook?userid=".$APIuserID."&pass=".$APIkey."&phone=".$phone."&user_ref=".MyuniqCode()."&jsn=json";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result= curl_exec($ch);
	curl_close($ch);
	return $output = json_decode($result,true);
}

function electricity_curl_get_contents(){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/power-lists?userid=".$APIuserID."&pass=".$APIkey."&jsn=json";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result= curl_exec($ch);
	curl_close($ch);
	$output = json_decode($result,true);
	return $output['result'][3];
}

function mobileAirtime_wallet_balance(){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/balance.php?userid=".$APIuserID."&pass=".$APIkey."&jsn=json";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result= curl_exec($ch);
	curl_close($ch);
	return $output = json_decode($result,true);
	// return $output['result'][3];
}

function verify_eedc_electricity_meterNo($service,$meterno){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/power-validate?userid=".$APIuserID."&pass=".$APIkey."&service=".$service."&meterno=".$meterno."&jsn=json";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result= curl_exec($ch);
	curl_close($ch);
	$output = json_decode($result,true);
	return $output;
}

 function MTN_SME_topup_curl_get_contents($network,$recepientPhone,$amount){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://mobileairtimeng.com/httpapi/datashare?userid=".$APIuserID."&pass=".$APIkey."&network=".$network."&phone=".$recepientPhone."&datasize=".$amount."&jsn=json&user_ref=".uniqid()."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}

 function airtime_topup_curl_get_contents($network,$recepientPhone,$amount){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/?userid=".$APIuserID."&pass=".$APIkey."&network=".$network."&phone=".$recepientPhone."&amt=".$amount."&jsn=json";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	return $output = json_decode($result,true);
}

/**
 * EEDC topup
*/
 function eedc_topup_curl_get_contents($userRef,$service,$meterno,$metertype,$amount)
 {
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://www.mobileairtimeng.com/httpapi/power-pay?userid=".$APIuserID."&pass=".$APIkey."&user_ref=".$userRef."&service=".$service."&meterno=".$meterno."&mtype=".$metertype."&amt=".$amount."&jsn=json";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	return json_decode($result,true);
}

// VTpass
 function VTpassData_topup_productlist_curl_get_contents($serviceID){	
	$url = "".VTpass_mode()."service-variations?serviceID=".$serviceID."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	//  return $output;
	 return $output['content']['varations'];
}

// International Top-up
 function VTpass_get_international_airtime_countries(){	
	$url = "".VTpass_mode()."get-international-airtime-countries";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 return $output['content']['countries']??[];
}
 function VTpass_get_international_airtime_product_type($country_code){	
	$url = "".VTpass_mode()."get-international-airtime-product-types?code=".$country_code."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 return $output['content'];
}
 function VTpass_get_international_airtime_operator($country_code,$product_type_id){	
	$url = "".VTpass_mode()."get-international-airtime-operators?code=".$country_code."&product_type_id=".$product_type_id."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 return $output['content'];
}
 function VTpass_get_international_airtime_operator_variations($operator_id,$product_type_id){	
	$url = "".VTpass_mode()."service-variations?serviceID=foreign-airtime&operator_id=".$operator_id."&product_type_id=".$product_type_id."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 return $output['content'];
}
function VTpass_international_topup_purchase($variationCode,$billersCode,$amount,$requestID,$operator_id,$country_code,$product_type_id,$email,$phone)
{
   $username = VTpass_credentials()['username'];
   $password = VTpass_credentials()['password'];
   $fields = [
	   'billersCode' => $billersCode,
	   'serviceID' => 'foreign-airtime',
	   'variation_code' => $variationCode,
	   'amount' => $amount,
	   'request_id' => $requestID,
	   'operator_id' => $operator_id,
	   'country_code' => $country_code,
	   'product_type_id' => $product_type_id,
	   'phone' => $phone,
	   'email' => $email,
   ];
   $ch = curl_init();
   curl_setopt_array($ch, array(
	   CURLOPT_URL => ''.VTpass_mode().'pay',
	   CURLOPT_RETURNTRANSFER => true,
	   CURLOPT_USERPWD => $username.":".$password,
	   CURLOPT_POST => true,
	   CURLOPT_POSTFIELDS => $fields,
   ));
   $response = curl_exec($ch);
   return $response = json_decode($response,true);
}
// End international topup

 function data_topup_productlist_curl_get_contents($service){	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://mobileairtimeng.com/httpapi/get-items?userid=".$APIuserID."&pass=".$APIkey."&service=".$service."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 $products =  $output['products'];
	 return $products;
	// dd($output);
}
/**
 * Phone number verification which must be in an international format
*/
 function verifyPhoneApi($phone,$country)
 {	
	$APIuserID ='07062454018';
	$APIkey ='21ec5d04f8d3db8f71c0d';
	$url = "https://mobileairtimeng.com/httpapi/globalvtu-conf?userid=".$APIuserID."&pass=".$APIkey."&phone=".$phone."&country=".$country."";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 return $output;
	// dd($output);
}

//VTpass
 function facebook_latest_feed($pageId)
 {
	$url = "https://graph.facebook.com/".$pageId."/feed?access_token=590373733076964|XMA5c785qhh3sC9nAd1xQuR8N3I";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result= curl_exec($ch);
	curl_close($ch);
	 $output = json_decode($result,true);
	 return $output;
	// dd($output);
}


/**
 * Lets get the site settings and identities
 * 
*/
if(!function_exists('SiteSettings'))
{
	function SiteSettings()
	{
		if (!empty($settings = SiteSetting::first())) {
			return $settings;
		}
	}
}



function VTpass_credentials(){	
	$credentails = [
		'username' => 'kulprice1@gmail.com',
		'password' => 'victor@2018'
	];
	return $credentails;
}


 function electricity_companies_curl_get_contents(){
	$url = "".VTpass_mode()."services?identifier=electricity-bill";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$result= curl_exec($ch);
	curl_close($ch);
	 return $output = json_decode($result,true);
	// dd($output);
}

 function vtPass_wallet_balance(){
	$username = VTpass_credentials()['username'];
	$password = VTpass_credentials()['password'];

	$url = "".VTpass_mode()."balance";	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// $result= curl_exec($ch);
	// curl_close($ch);
	// $output = json_decode($result,true);
	// return $output['contents'];
}
	
if(!function_exists('userDetail')){
	function userDetail(){
		$userId = Auth::user();
		return $userId;		
	}
}

if(!function_exists('getUserById')){
	function getUserById($id){
		$user = User::find($id);
		return $user;		
	}
}

if (! function_exists('generateUniqueSlug')) 
{
	function generateUniqueSlug($model,$value)
	{
        $temp = str_slug($value, '-');
        if(!$model::all()->where('slug',$temp)->isEmpty()){
            $i = 1;
            $newslug = $temp . '-' . $i;
            while(!$model::all()->where('slug',$newslug)->isEmpty()){
                $i++;
                $newslug = $temp . '-' . $i;
            }
            $temp =  $newslug;
        }
        return $temp;
    }
}

if (! function_exists('getSlugId')) 
{
	function getSlugId($model,$slug)
	{
		$search = $model::where('slug',$slug)->first();

		if(!empty($search))
		{
			$getSlugId = $search->id;
			
			return $getSlugId;
		}
	}
}

if (! function_exists('getSlugDetail')) 
{
	function getSlugDetail($model,$slug)
	{
		return $search = $model::where('slug',$slug)->first();
	}
}

if (! function_exists('getSlugName')) {
	function getSlugName($model,$slug,$name)
	{
		if (!empty($search = $model::where('slug',$slug)->first())) {
			$getSlugId = $search->$name;
			return $getSlugId;
		}
		
	}
}

if (! function_exists('success')) {
	function success()
	{
		return 'Process Completed!';
	}
}

if (! function_exists('statusColor')) {
	function statusColor($statusName)
	{
		switch (strtolower($statusName)) {
			case 'pending':
				return 'text-warning';
				break;

			case 'procesing':
				return 'text-info';
				break;

			case 'success':
				return 'text-success';
				break;

				case 'processed':
					return 'text-success';
					break;
				case 'cancelled':
					return 'text-danger';
					break;

				case 'settled':
					return 'text-success';
					break;
				case 0:
					return 'text-danger';
					break;
				case 1:
					return 'text-success';
					break;
			
			default:
				return;
				break;
		}
	}
}

if (! function_exists('getAttribute')) {
	function getAttribute($model,$attr,$value)
	{
		if (!empty($search = $model::where((string)$attr,$value)->first())) 
		{
			return $search;
		}
	}
}

if (! function_exists('countAttribute')) 
{
	function countAttribute($model,$attr,$value)
	{
		if (!empty($result = $model::where((string)$attr,$value)->count())) 
		{
			return $result;
		}
	}
}

if (! function_exists('getEntityList')) {
	function getEntityList($model,$attr,$value)
	{
		if (!empty($search = $model::where((string)$attr,$value)->get())) 
		{
			return $search;
		}
		
	}
}

if (! function_exists('slug')) {
	function slug($str)
	{
		return Str::slug($str, '-');		
	}
}

function str_explode($delimiter = ',',$str)
{
	$result = explode($delimiter,$str);
	return $result;
}

function str_implode($str,$delimiter = ' ')
{
	$result = implode($delimiter,$str);
	return $result;
}


function getIp(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $ip){
                $ip = trim($ip); // just to be safe
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                    return $ip;
                }
            }
        }
    }
    return request()->ip(); // it will return the server IP if the client IP is not found using this method.
}

function getClientIpDetail()
{
	return getIp();
}
//Check if the Ip address exist in the database
function userIpExist()
{
	$user_ip = User::where('ip_address',getClientIpDetail())->first();
	if($user_ip)
	{
		return true;
	}
	return false;
}
//User account restrictions
function userRestriction($type)
{
	return $user_suspended = User::whereId(userID())->update(['status_id'=>statusID($type)]);	
}

if (! function_exists('str_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    function str_slug($title, $separator = '-', $language = 'en')
    {
        return Str::slug($title, $separator, $language);
    }
}


if (! function_exists('str_limit_attribute')) {
	function str_limit_attribute($collection,$attribute,$length=40)
	{
		foreach ($collection as  $data) {
			$data[$attribute] = stringLenght($data[$attribute],$length);
		}
		return $collection;
	}
	
}

if (! function_exists('alter_attribute')) {
	function alter_attribute($collection,$attribute,$value)
	{
		foreach ($collection as  $data) {
			$data[$attribute] = $value;
		}
		return $collection;
	}
	
}

function live_image_symlink($path)
{
	return str_replace('footballclub\public','sufc-demo.allforteck.com', $path);
}

function where_search($model,$attr,$search)
{
	return $search = $model::where($attr, 'LIKE', '%'.$search.'%')
	->first();
}




