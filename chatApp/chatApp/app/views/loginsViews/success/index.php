<?php include "app/views/loginsViews/headerTop.php"; ?>
<?php include "app/views/loginsViews/headerBottom.php"; ?>

        <h3 class="text-center my-4">
        	<?php echo $this->message;?>
        </h3>
        <div class="success-checkmark">
          <div class="check-icon">
            <span class="icon-line line-tip"></span>
            <span class="icon-line line-long"></span>
            <div class="icon-circle"></div>
            <div class="icon-fix"></div>
          </div>
        </div>
  
        <a href="<?php echo constant('URL').'login';?>" class="btn btn-primary btn-lg btn-block mt-2">Login</a>

      </div>
    </div>
  </div>
</div>

<script src="<?php echo constant('PUBLIC');?>js/logins/login.js"></script>

<?php include "app/views/loginsViews/footer.php"; ?>