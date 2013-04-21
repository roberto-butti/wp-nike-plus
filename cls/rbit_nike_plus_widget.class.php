<?php

class Rbit_Nike_Plus_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct(
      Rbit_Nike_Plus::SLUG, 
      "Nike Plus Last Activity", // Name
      array( 'description' => __( 'Retrive last Activity from Nike Plus', Rbit_Nike_Plus::DOMAIN ), ) // Args
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
    // outputs the content of the widget
    $activity = Rbit_Nike_Plus::get_activities();
    $js = json_decode($activity);
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/../views');
    $twig = new Twig_Environment($loader, array(
      //'cache' => dirname(__FILE__)."/../cache",
      'cache' => FALSE
    ));
    $template = $twig->loadTemplate('widget_lastactivity.html.twig');
    $template->display(array('activity' => $js->data[0] ));
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