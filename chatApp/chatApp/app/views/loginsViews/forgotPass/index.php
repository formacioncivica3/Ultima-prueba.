<?php include "app/views/loginsViews/headerTop.php"; ?>
<?php include "app/views/loginsViews/headerBottom.php"; ?>
        
        <form action="" method="POST">
          <h4 class="text-center">Password Change</h4>
          <div class="form-group mt-2">
            <input type="text" class="form-control"
            id="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control"
            id="password" placeholder="New password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control"
            id="confirmpassword" placeholder="Confirm new password">
          </div>
          <div id="errorLine" class="alert alert-danger my-3 d-none"></div>
          
          <input type="submit" class="btn btn-primary btn-block"
          value="Change Password" id="btnChange">
        </form>

        <a href="<?php echo constant('URL').'login';?>" class="btn btn-outline-primary btn-block mt-2">Login</a>
        <a href="<?php echo constant('URL').'register';?>" class="btn btn-light btn-block mt-2">
        Sign Up</a>

      </div>
    </div>
  </div>
</div>

<script src="<?php echo constant('PUBLIC');?>js/logins/forgotPass.js"></script>

<?php include "app/views/loginsViews/footer.php"; ?>