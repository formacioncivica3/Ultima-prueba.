<?php include "app/views/userViews/headerTop.php"; ?>
<link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/user/home.css">
<?php include "app/views/userViews/headerBottom.php"; ?>

<div class="container my-5 p-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="row justify-content-center">
        <div class="col-2">
          <img class="imageProfile" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png" alt="">
        </div>
        <div class="col-10 mt-2">
          <h2>Name and surnames</h2>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="float-right">
        <a href="<?php echo constant('URL').'signOut';?>" 
        class="btn btn-danger">
          <i class="fas fa-sign-out-alt mr-2"></i>LogOut
        </a>
        <a href="<?php echo constant('URL').'settings/view';?>" 
        class="btn btn-light ml-2">
          <i class="fas fa-cog mr-2"></i>Settings
        </a>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-4">

    <div class="col-lg-8 col-md-6 col-sm-12">
    	<?php 
    	if(!empty($this->checkUser)){
    	?>
      <div class="chat-div" id='divChat'></div>
      
      <form action="" method="post" class="form-inline my-3" id='formSend'>
        <input type='text' class="form-control col-8" placeholder="Text Message" id='textMess'>
        <input type="submit" class="btn btn-primary col-4" value="Send" id='sendMess'>
      </form>
      <?php
    	} else { ?>
    	<h2 class='m-4'>Select a user to chat</h2>	
    	<?php 
    	} ?>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="float-left verticalhr d-none d-sm-none d-md-block"></div>
      <div class="col-12 col-md-11 float-right contacts-div">
        <?php
      	if(!empty($this->selectUsers)){
      		foreach($this->selectUsers as $row){
        ?>
        <a href="<?php echo constant('URL').'home/view/'.$row['USERNAME'];?>" class="user-card-link"><div class="user-card-div card p-3 mb-3">
          <div class="row justify-content-center">
            <div class="col-4 col-sm-3 col-md-3">
              <img class="imageProfile" src="<?php echo constant('PUBLIC');?>images/<?php echo $row['IMAGE'];?>" alt="">
            </div>
            <div class="col-8 col-sm-9 col-md-9">
              <h4><?php echo $row['NAME'].' '.$row['SURNAMES'];?></h4>
              <div class="lineDiv">
                <h6><?php echo $row['USERNAME'];?></h6>
              </div>
            </div>
          </div>
        </div></a>
				<?php
				  }
				} ?>
        <!--a href="" class="user-card-link"><div class="user-card-div card p-3 mb-3">
          <div class="row justify-content-center">
            <div class="col-4 col-sm-3 col-md-3">
              <img class="imageProfile" src="https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg" alt="">
            </div>
            <div class="col-8 col-sm-9 col-md-9">
              <h4>Username</h4>
              <div class="lineDiv">
                <div class="online"></div>
                <h5>online</h5>
              </div>
            </div>
          </div>
        </div></a-->

      </div>
    </div>
		
		<input type="hidden" id='fromUser' value="<?php echo $_SESSION['SeUser']; ?>">
		<input type="hidden" id='toUser' value="<?php echo $this->checkUser; ?>">
		
		
  </div>
</div>

<script src='<?php echo constant('PUBLIC');?>js/user/home0.js'></script>

<?php include "app/views/userViews/footer.php"; ?>