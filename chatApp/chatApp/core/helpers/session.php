<?php
class Sessions extends Files {
  
  public function __construct(){
    session_start();
  }
  
  public function verifySessionEmpty(){
    if(!isset($_SESSION['SeFunction'])){
      header('location: '.constant('URL').'login');
    
    } else if($_SESSION['SeFunction'] == 'User'){
      header('location: '.constant('URL').'home/view');
    }
    $home= new Home();
  }
  
  public function verifySessionFile($controller){
    if(!isset($_SESSION['SeFunction'])){
      return $this->fileLogin($controller);
    
    } else if($_SESSION['SeFunction'] == 'Admin'){
      return $this->fileAdmin($controller);
    
    } else if($_SESSION['SeFunction'] == 'User'){
      return $this->fileUser($controller);
    }
  }
  
  public function errorPage(){
    if($_SESSION['SeFunction'] == 'User'){
      require $this->fileUser('errorPage');
      
    } else {
    	require $this->fileLogin('errorPage');
    }
    $errorPage= new ErrorPage();
  }

}

?>