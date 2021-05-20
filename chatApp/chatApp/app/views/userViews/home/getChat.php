<?php 
foreach($this->selectChat as $row){ 

	if($row['FROMUSER'] == $this->to){ ?>
    <div class='green col-9 mr-auto my-2 rounded'>
      <?php echo $row['TEXT'];?>
    </div>  
  
  <?php
  } else if($row['FROMUSER'] == $this->from){ 
  ?>
    <div class='blue col-9 ml-auto my-2 rounded'>
      <?php echo $row['TEXT'];?>
    </div>  
  
  <?php
  }
}

?>