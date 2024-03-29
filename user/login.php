<?php require_once("includes/header.php"); ?>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">HOME</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">                    
                    <li>
                        <a href="../about.php">About</a>
                    </li>
                    <li>
                        <a href="">My Profile</a>
                    </li>
                    <li>
                        <a href="../users_list.php">Users list</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<?php 


if ($session->is_signed_in()) {
	
	redirect("index.php");

}



if(isset($_POST['submit'])) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);


	/// Method to check database user
	$user_found = User::verify_user($username,$password);

	if($user_found) {

		$session->login($user_found);
		redirect("index.php");

	} else {

		$the_message = "Your username or password are incorrect";
	}


} else {

	$username = "";
	$password = "";
	$the_message = "";
}

?>

<div class="col-md-4 col-md-offset-3">

	<h4 class="bg-danger"><?php if(isset($the_message)) echo $the_message; ?></h4>
		
	<form id="login-id" action="" method="post">
		
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
			
		</div>


		<div class="form-group">
			<input type="submit" name="submit" value="Submit" class="btn btn-primary">

		</div>


	</form>


</div>