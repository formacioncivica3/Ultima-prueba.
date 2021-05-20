<?php

class UserModel extends Model {
	
  public function __construct(){
    parent::__construct();
  }
	
  public function loadImage($img){
    $name= $img['name'];
    $type= $img['type'];  
    $size= $img['size'];
  
    if($size<=3400000){
      if($type=='image/jpeg' || $type=='image/jpg' || 
         $type=='image/png' || $type=='image/gif'){
       
        $folder= constant('PUBLIC'). 'images/';
        $destin= $_SERVER['DOCUMENT_ROOT']. $folder;
    
        move_uploaded_file($img['tmp_name'],                            
                         $destin. $name);
        return $name;
        
      } else {
        header('location: '.constant('URL').'register');
      }
    } else {
      header('location: '.constant('URL').'register');
    }
  }
    
  public function updateUser($name, $surname, $img){
      try{
			$sql='UPDATE USERNAMES SET NAME= :Name, SURNAMES= :Surname, 
                  IMAGE= :Image WHERE USERNAME= :Myuser';
            $query= $this->db->prepare($sql);
            $query->execute([ 
                ':Myuser' => $_SESSION['SeUser'],
                ':Name' => $name,
                ':Surname' => $surname,
                ':Image' => $img
            ]);
          
          
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getMessage();
		}
  }
    
}

?>