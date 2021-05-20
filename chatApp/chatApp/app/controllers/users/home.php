<?php

class Home extends Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function view($param=null){
		$myuser= $_SESSION['SeUser'];
		$modelSelect= $this->loadUserModel('selectModel');
		
		if($param!=null){
			$user= $param[0];
			$checkParam= $modelSelect->checkUserParam($user);
			if($checkParam){
				$this->view->checkUser= $user;
			} else {
				header('location: '.constant('URL').'home/view');
			}
		}
		
		$selectUsers= $modelSelect->selectUsers($myuser);
		$this->view->selectUsers= $selectUsers;
		$this->view->renderUsers('home/index');
	}
	
	public function getChat(){
		if(isset($_POST)){
			$from= $_POST['from'];
			$to= $_POST['to'];
			
			$modelSelect= $this->loadUserModel('selectModel');
					
			if(!empty($from) && !empty($to)){
				if($from==$_SESSION['SeUser']){
					$selectChat= $modelSelect->selectChat($from, $to);
					if(!empty($selectChat)){
						$this->view->from= $from;
						$this->view->to= $to;
						$this->view->selectChat= $selectChat;
						$this->view->renderUsers('home/getChat');
						
					} else {
						echo '<h5>Chat not found</h5>';
					}
				}
			}
			
		}
	}
	
	public function sendChat(){
		if(isset($_POST)){
			$text= $_POST['text'];
			$from= $_POST['from'];
			$to= $_POST['to'];
			
			$modelInsert= $this->loadUserModel('insertModel');
					
			if(!empty($from) && !empty($to) && !empty($text)){
				if($from==$_SESSION['SeUser']){
					$modelInsert->sendChat($text, $from, $to);
				}
			}
		}
	}
	
}

?>