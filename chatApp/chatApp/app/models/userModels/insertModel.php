<?php

class InsertModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	
	public function sendChat($text, $from, $to){
		try{
			$cod= md5(time().$from.$text.$to);
 			$id= substr($cod, 2, -22);
            
            $sql= 'INSERT INTO MESSAGES (ID, TEXT, FROMUSER, TOUSER, DATE) 
            VALUES (:Id, :Text, :From, :To, :Date)';
			
			$query= $this->db->prepare($sql);
			$query->execute([ 
				':Id' => $id,
				':Text' => $text,
				':From' => $from,
				':To' => $to,
                ':Date' => date('Y-m-d H:i:s')
			]);
			
			
		}catch(PDOException $e){
			echo 'Error PDO DB: '.$e->getLine().$e->getMessage();
		}
	}
}

?>