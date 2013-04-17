<?php
class Rbit_Nike_Plus_Config {



  static function save_settings( $array ) {

    update_option( Rbit_Nike_Plus::DOMAIN.'_client_id', $array[Rbit_Nike_Plus::DOMAIN.'_client_id'] );
    update_option( Rbit_Nike_Plus::DOMAIN.'_client_secret', $array[Rbit_Nike_Plus::DOMAIN.'_client_secret'] );
    update_option( Rbit_Nike_Plus::DOMAIN.'_redirect_uri', $array[Rbit_Nike_Plus::DOMAIN.'_redirect_uri'] );
    update_option( Rbit_Nike_Plus::DOMAIN.'_access_token', $array[Rbit_Nike_Plus::DOMAIN.'_access_token'] );
  }

  static function get_settings() {
    $client_id = get_option( Rbit_Nike_Plus::DOMAIN.'_client_id' );
    $client_secret = get_option( Rbit_Nike_Plus::DOMAIN.'_client_secret' );
    $redirect_uri = get_option( Rbit_Nike_Plus::DOMAIN.'_redirect_uri' );
    $access_token = get_option( Rbit_Nike_Plus::DOMAIN.'_access_token' );
    if ($client_id === FALSE || $client_secret === FALSE || $redirect_uri === FALSE || $access_token === FALSE) {
      return FALSE;
    } else {
      return self::popolate_array( $client_id, $client_secret, $redirect_uri, $access_token );
      //array( $client_id, $client_secret, $redirect_uri );
    }
    
  }

  static function get_value_from_array($array, $name, $default = "") {
    $value = isset( $array[$name] )
        ? trim( $array[$name] )
        : $default;
    return $value;
  }

  static function popolate_array($client_id, $client_secret, $redirect_uri, $access_token) {
    $array = array(
      "client_id"=>$client_id,
      "client_secret"=>$client_secret,
      "redirect_uri" => $redirect_uri,
      "access_token" => $access_token
      );
    return $array;
  }
  static function validate_from_array($array) {

    $client_id = self::get_value_from_array($array,Rbit_Nike_Plus::DOMAIN."_client_id", "" );
    $client_secret = self::get_value_from_array($array,Rbit_Nike_Plus::DOMAIN."_client_secret", "" );
    $redirect_uri = self::get_value_from_array($array,Rbit_Nike_Plus::DOMAIN."_redirect_uri", "" );
    $access_token = self::get_value_from_array($array,Rbit_Nike_Plus::DOMAIN."_access_token", "" );
    return self::popolate_array( $client_id, $client_secret, $redirect_uri, $access_token );

  }

}

