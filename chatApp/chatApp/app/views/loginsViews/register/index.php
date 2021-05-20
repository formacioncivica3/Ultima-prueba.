<?php include "app/views/loginsViews/headerTop.php"; ?>
<?php include "app/views/loginsViews/headerBottom.php"; ?>

        <form action="" method="POST">
          <h4 class="text-center">Sign Up</h4>
          <div class="form-group form-inline mt-2">
            <input type="text" class="form-control col-6"
            id="name" placeholder="Name">
            <input type="text" class="form-control col-6"
            id="surnames" placeholder="Surnames">
          </div>
          <div class="form-group mt-2">
            <input type="text" class="form-control"
            id="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control"
            id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control"
            id="confirmpassword" placeholder="Confirm Password">
          </div>
          <div id="errorLine" class="alert alert-danger my-3 d-none"></div>

          <input type="submit" class="btn btn-primary btn-block"
          value="Register" id="btnRegister">
        </form>

        <a href="<?php echo constant('URL').'login';?>" class="btn btn-light btn-block mt-2">Sign In</a>
        <a href="<?php echo constant('URL').'forgotPassword';?>" class="text-center text-primary my-3">Forgotten password?</a>

      </div>
    </div>
  </div>
</div>

<script src="<?php echo constant('PUBLIC');?>js/logins/checkRegister.js"></script>

<?php include "app/views/loginsViews/footer.php"; ?>