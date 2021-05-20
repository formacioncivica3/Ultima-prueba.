<?php include "app/views/userViews/headerTop.php"; ?>
<link rel="stylesheet" href="<?php echo constant('PUBLIC');?>css/user/settings.css">
<?php include "app/views/userViews/headerBottom.php";
    
  foreach($this->selectData as $row){ ?>

<div class="container my-5 p-3">
  <form action="<?php echo constant('URL').'settings/get';?>" method="post"
  class="row justify-content-center" enctype="multipart/form-data">
    <div class="col-md-4">
      <div class="image-div">
        <img class="image-profile" src="<?php echo constant('PUBLIC').
        'images/'.$row['IMAGE'];?>" alt="">
      </div>
    </div>
    <div class="col-md-8 p-5">
      <h2 class="ml-auto my-4">Settings</h2>
      <input type="text" class="form-control my-3" name="name"
      placeholder="Name" value="<?php echo $row['NAME'];?>">
      <input type="text" class="form-control my-3" name="surname"
      placeholder="Surnames" value="<?php echo $row['SURNAMES'];?>">
      <input type="file" class="form-control my-3" name="imageFile">
      <input type="submit" class="btn btn-primary btn-block my-4">
    </div>
  </form>
</div>

<?php 
  }

include "app/views/userViews/footer.php"; ?>