<?php

class Success extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
	
	public function register(){
		$this->view->message= 'register';
	  $this->view->renderLogins('success/index');
  }
  
  public function changePassword(){
		$this->view->message= 'forgotpass';
	  $this->view->renderLogins('success/index');
  }
}


?>