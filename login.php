<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
 <!-- FROM THE POP UP COMMANDS------ Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/demo.css">
     
	<meta name="viewport" content="width=device-width, initial-scale=-1">
	<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
	<script  src="js/script.js"></script>
  
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"/>
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-column text-center">
        <form method="POST" action="register.php">
		  <?php echo display_error(); ?>
		  <div class="text-center text-muted delimiter">
		  <div class="form-title text-center">
			<h4>
				<div class="text-center text-muted delimiter"></div>
				<img src="tictimor.png" width="300" height="100"/>
				<b>Web Archive | Login</b>
				<div class="modal-footer d-flex justify-content-center"></div>
			</h4>
			</div>
            <div class="form-group">
              <input type="username" class="form-control" class="fa fa-user" name="username"placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" class="fa fa-pwd" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-info btn-block btn-round" name="login_btn">Login</button>
		</form>
		</div>
		</div>
	<div class="modal-footer d-flex justify-content-center">
		<div class="text-center text-muted delimiter" >Did not have an account yet? <a href="register.php" class="text-info">Sign Up</a></div>
	</div>
  </div>
</div>


</body>
</html>