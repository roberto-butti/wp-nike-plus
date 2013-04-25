<?php

class Rbit_Nike_Plus_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    $widget_ops = array(
      'classname' => 'widget_'.Rbit_Nike_Plus::SLUG,
      'description' => __( 'Retrive last Activity from Nike Plus', Rbit_Nike_Plus::DOMAIN )
    );
    parent::__construct(
      Rbit_Nike_Plus::SLUG, 
      __( "Activities with Nike Plus" ),
      $widget_ops
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    extract( $args );
    //print_r($args);
    $title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'RBit Nike Plus' ) : $instance['title'], $instance, $this->id_base);
    
    // outputs the content of the widget
    $activity = Rbit_Nike_Plus::get_activities();
    $js = json_decode($activity);
    /*
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/../views');
    $twig = new Twig_Environment($loader, array(
      //'cache' => dirname(__FILE__)."/../cache",
      'cache' => FALSE
    ));
    $template = $twig->loadTemplate('widget_lastactivity.html.twig');
    $template->display(array('activity' => $js->data[0], 'widgettitle' => $title, 'args' => $args ));
    */
    $loader = new RbitTwigLoader();
    $loader->display('widget_lastactivity.html.twig', array('activity' => $js->data[0], 'widgettitle' => $title, 'args' => $args ));
    
    //echo($js->data[0]->status);
    //echo "CIAO";

  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    // outputs the options form on admin
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/../views');
    $twig = new Twig_Environment($loader, array(
      //'cache' => dirname(__FILE__)."/../cache",
      'cache' => FALSE
    ));
    $template = $twig->loadTemplate('widget_form_lastactivity.html.twig');
    $template->display(array('instance' => $instance ));


  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }

}