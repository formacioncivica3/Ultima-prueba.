<?php

class ForgotPassword extends Controller {
  
  public function __construct(){
    parent::__construct();
    $this->view->renderLogins('forgotPass/index');
  }

}


?>