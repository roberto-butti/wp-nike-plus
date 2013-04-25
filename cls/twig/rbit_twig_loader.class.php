<?php

class RbitTwigLoader {

  private $twig;
  private $template_name;
  private $args;

  public function __construct() {
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/../../views');
    $this->twig = new Twig_Environment($loader, array(
      //'cache' => dirname(__FILE__)."/../cache",
      'cache' => FALSE
    ));
    $this->args = array();

  }

  public function setTemplateName($template_name) {
    $this->template_name = $template_name;
  }

  public function setArgs(array $array=array()) {
    $this->args = $args;
  }

  public function addArg($name, $value) {
    $this->args[$name] = $value;
  }

  public function display($template_name = "", $args = array() ) {
    if ($template_name != "") {
      $this->setTemplateName($template_name);
    }
    $this->args = $args;
    $template = $this->twig->loadTemplate($this->template_name);
    $template->display($this->args);
  }




}