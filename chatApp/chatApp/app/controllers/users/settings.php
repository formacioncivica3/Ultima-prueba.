<?php

class Settings extends Controller {
    
    public function __construct(){
		parent::__construct();
	}
    
    public function view(){
        $myuser= $_SESSION['SeUser'];
        $modelSelect= $this->loadUserModel('selectModel');
        $selectData= $modelSelect->selectMyUser($myuser);
        
        $this->view->selectData= $selectData;
        $this->view->renderUsers('settings/index');
    }
    
    public function get(){
        if(isset($_POST)){
            
            $file= $_FILES['imageFile'];
            $name= $_POST['name'];
            $surname= $_POST['surname'];
            
            $model= $this->loadUserModel('userModel');
            
            if(!empty($name) && !empty($surname)){
                if(!empty($file['name'])){
                    $imgname= $model->loadImage($file);
                } else {
                    $imgname= 'default.jpg';
                }
                $model->updateUser($name, $surname, $imgname);
                header('location: '.constant('URL'));
                
            } else {
                header('location: '.constant('URL'));
            }
            
        } else {
            header('location: '.constant('URL'));
        }
    }

}

?>