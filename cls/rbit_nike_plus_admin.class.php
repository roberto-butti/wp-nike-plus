<?php
class Rbit_Nike_Plus_Admin {

  static function admin_menu() {
    add_submenu_page(
      'options-general.php',
      __( 'Rbit Nike Plus', Rbit_Nike_Plus::DOMAIN ),
      __( 'Rbit Nike Plus', Rbit_Nike_Plus::DOMAIN ),
      'manage_options',
      Rbit_Nike_Plus::SLUG,
      array( 'Rbit_Nike_Plus_Admin', 'admin_page' )
    );
  }

  static function admin_page() {
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/../views');
    $twig = new Twig_Environment($loader, array(
      //'cache' => dirname(__FILE__)."/../cache",
      'cache' => FALSE
    ));
    if ( isset( $_POST[Rbit_Nike_Plus::DOMAIN.'_general_settings'] ) &&
        check_admin_referer( Rbit_Nike_Plus::DOMAIN.'_general_settings_nonce', Rbit_Nike_Plus::DOMAIN.'_general_settings_nonce' ) ) {

      $settings = Rbit_Nike_Plus_Config::validate_from_array($_POST);
      if ($settings !== FALSE) {
        Rbit_Nike_Plus_Config::save_settings($_POST);
        var_dump(Rbit_Nike_Plus::get_activities());
      }
    } else {
      $settings = Rbit_Nike_Plus_Config::get_settings();
    }
    $settings["wp_nonce"] = wp_create_nonce(Rbit_Nike_Plus::DOMAIN.'_general_settings_nonce');
      
    $template = $twig->loadTemplate('adminpage.html.twig');

    $template->display(array('settings' => $settings ));

    

  }

}