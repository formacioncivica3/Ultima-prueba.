<?php

class AjaxController extends Controller {
  
  public function __construct(){
    parent::__construct();
  }
	
	public function addUser(){
		if(isset($_POST)){
			$name= $_POST['name'];
			$surnames= $_POST['surnames'];
			$username= $_POST['username'];
			$password= $_POST['password'];
			$modelSelect= $this->loadLoginsModel('selectModel');
			$modelInsert= $this->loadLoginsModel('insertModel');
	
			if(!$modelSelect->checkExistsUsername($username)){
				echo 'false';
			} else {
				$modelInsert->createUser($name, $surnames, $username, $password);
				echo 'true';
			}
		}
	}
	
	public function login(){
		if(isset($_POST)){
			$user= $_POST['username'];
			$pass= $_POST['password'];
		
			$model= $this->loadLoginsModel('selectModel');
			if(!$model->checkLogin($user, $pass)){
				echo 'false';
				
				echo 'true';
			}
		}
	}
}


?>