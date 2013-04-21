<?php
class Rbit_Nike_Plus_Api {

  public static function get_http($url, $access_token) {
    $curl_handle=curl_init();
    $data = array('appid: fuelband', "Accept: application/json");
    curl_setopt($curl_handle,CURLOPT_URL,$url.'?access_token='.$access_token);
    curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
    curl_setopt($curl_handle,CURLOPT_HTTPHEADER,$data);
    curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
    $buffer = curl_exec($curl_handle);
    //echo 'Curl error: ' . curl_error($curl_handle);
    curl_close($curl_handle);
    if (empty($buffer)) {

      return FALSE;
    } else {
      return $buffer;
    }
  }

  public static function get_activities() {
    $access_token = get_option( Rbit_Nike_Plus::DOMAIN.'_access_token' );
    $url = "https://api.nike.com/me/sport/activities";
    return self::get_http($url, $access_token);
  }
  
}