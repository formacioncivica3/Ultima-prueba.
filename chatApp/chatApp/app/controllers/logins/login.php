<?php

class Login extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('login/index');
  }

}


?>