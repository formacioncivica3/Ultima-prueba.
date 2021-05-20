<?php

class InsertModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function createUser($name, $surnames, $username, $password){
		try{
			$sql= 'INSERT INTO USERNAMES (USERNAME, NAME, SURNAMES, PASSWORD, IMAGE) VALUES (:Username, :Name, :Surnames, :Password, :Image)';
			
			$enPass= password_hash($password, PASSWORD_DEFAULT);
			
			$query= $this->db->prepare($sql);
			$query->execute([ 
				':Username' => $username,
				':Name' => $name,
				':Surnames' => $surnames,
				':Password' => $enPass,
				':Image' => "default.jpg"
			]);
			
			
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine().$e->getMessage();
		}
	}
}

?>