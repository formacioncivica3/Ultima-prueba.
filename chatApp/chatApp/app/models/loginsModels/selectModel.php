<?php

class SelectModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function checkExistsUsername($user){
		try{
			$sql= 'SELECT * FROM USERNAMES WHERE USERNAME= :User';
			$query= $this->db->prepare($sql);
			$query->execute([ ':User' => $user ]);
			$rows= $query->rowCount();
			
			if($rows!=0){
				return false;
			} else {
				return true;
			}
			
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine();
		}
	}
	
	public function checkLogin($user, $pass){
		try{
			$sql= 'SELECT * FROM USERNAMES WHERE USERNAME= :User';
			$query= $this->db->prepare($sql);
			$query->execute([ ':User' => $user ]);
			$rows= $query->rowCount();
			
			if($rows>0){
				
				while($row= $query->fetch(PDO::FETCH_ASSOC)){
					if(password_verify($pass, $row['PASSWORD'])){
						session_start();
						$_SESSION['SeUser']= $user;
						$_SESSION['SeName']= $row['NAME'];
						$_SESSION['SeSurnames']= $row['SURNAMES'];
						$_SESSION['SeImage']= $row['IMAGE'];
            $_SESSION['SeFunction']= 'User';
            return true;
						
					} else {
						return false;
					}
				}
				
			} else {
				return false;
			}
				
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine();
		}
	}
}

?>