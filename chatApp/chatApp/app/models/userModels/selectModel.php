<?php

class SelectModel extends Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function selectUsers($myuser){
		try{
			$sql='SELECT * FROM USERNAMES WHERE NOT USERNAME= :Myuser';
			$data= null;
            $query= $this->db->prepare($sql);
            $query->execute([ ':Myuser' => $myuser ]);
      
            if($query){
       	        while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	      $data[] = $row; 
       	        }
            }
            return $data;
			
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine();
		}
	}
	
	public function checkUserParam($user){
		try{
			$sql='SELECT * FROM USERNAMES WHERE USERNAME= :User';
			$query= $this->db->prepare($sql);
      $query->execute([ ':User' => $user ]);
      $rows= $query->rowCount();
      
      if($rows!=0){
      	return true;
      } else {
      	return false;
      }
      
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine();
		}
	}
	
	public function selectChat($from, $to){
		try{
			$sql='SELECT * FROM MESSAGES WHERE FROMUSER= :From OR FROMUSER= :To 
                  ORDER BY DATE';
			$data= null;
            $query= $this->db->prepare($sql);
            $query->execute([ ':From' => $from, ':To' => $to ]);
      
            if($query){
       	        while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	      $data[] = $row; 
       	        }
            }
            return $data;
			
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine();
		}
	}
    
    public function selectMyUser($myuser){
		try{
			$sql='SELECT * FROM USERNAMES WHERE USERNAME= :Myuser';
			$data= null;
            $query= $this->db->prepare($sql);
            $query->execute([ ':Myuser' => $myuser ]);
      
            if($query){
       	        while($row= $query->fetch(PDO::FETCH_ASSOC)){
         	      $data[] = $row; 
       	        }
            }
            return $data;
			
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine();
		}
	}
    
    
}