<?php
class Rbit_Nike_Plus_Filter {

  static function content_post($content) {
    return $content." <br/>OK";
  }

  static function debug_content_filter($content) {
    // assuming you have created a page/post entitled 'debug'
    //if ($GLOBALS['post']->post_name == 'debug') {


    return $content."<pre>WORDPRESS VARIABLE:\n".var_export($GLOBALS['post'], TRUE )."\nSERVER VARIABLES:\n".var_export($_SERVER, TRUE)."</pre>";
    

    // otherwise returns the database content
    //return $content;
  }

  /*
  static function admin_menu() {
    add_submenu_page(
      'options-general.php',
      __( 'Easy Instagram', 'Easy_Instagram' ),
      __( 'Easy Instagram', 'Easy_Instagram' ),
      'manage_options',
      'easy-instagram',
      array( 'Easy_Instagram', 'admin_page' )
    );
  }
  */

}