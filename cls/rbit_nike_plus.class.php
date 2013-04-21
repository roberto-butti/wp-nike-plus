<?php
class Rbit_Nike_Plus {

  const DOMAIN = "rb-nike-plus";
  const SLUG = "rb-nike-plus";

  public static function get_activities() {

    $key = Rbit_Nike_Plus::DOMAIN."-activities";
    if ( false === ( $retval = get_transient( $key ) ) ) {
      // It wasn't there, so regenerate the data and save the transient
      $retval = Rbit_Nike_Plus_Api::get_activities();
      set_transient( $key, $retval, 60*60*12 );
    }
    return $retval;
    //return $retval;
  }




}