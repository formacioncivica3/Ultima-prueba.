<?php

class Register extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('register/index');
  }
	
	
}


?>