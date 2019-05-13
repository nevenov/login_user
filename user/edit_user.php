<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php 


if (empty($session->user_id)) {

    redirect("login.php");

} 


$profile = Profile::find_by_user_id($session->user_id);



if (isset($_POST['update'])) {

    
    if ($profile) {

        $profile->first_name    = $_POST['first_name'];
        $profile->last_name     = $_POST['last_name'];
        $profile->email         = $_POST['email'];
        $profile->date_birth    = $_POST['date_birth'];
        $profile->address       = $_POST['address'];

        if (empty($_FILES['user_image'])) {

            $profile->save();
            redirect("index.php");
            $session->message("The profile has been updated.");

        } else {

            if($_FILES['user_image']['error']==0) $profile->delete_photo();

            $profile->set_file($_FILES['user_image']);

            $profile->upload_photo();

            $profile->save();
            $session->message("The profile and image has been updated.");
        
            redirect("edit_user.php");
            //redirect("index.php");
        }
        

    }

}


?>


        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">


            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include("includes/top_nav.php"); ?>
            

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile <?php // print_r($profile); ?>
                            <small>Edit</small>
                        </h1>

                        <p class="bg-success"><?php echo $message; ?></p>


                        <div class="col-md-5 user_image_box">
                            
                            <img class="img-responsive" src="<?php echo $profile ? $profile->image_path_and_placeholder() : "https://via.placeholder.com/400?text=image" ; ?>" alt="">
    
                        </div>  
                        

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $profile->user_id; ?>" id="user_id_hidden">

                            <div class="col-md-7">
                                
                                <div class="form-group">
                                    <input type="file" name="user_image">
                                </div>  
                                
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" value="<?php echo $profile->first_name; ?>">
                                </div>    
                                
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="<?php echo $profile->last_name; ?>">
                                </div> 

                                <div class="form-group">
                                    <label for="password">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $profile->email; ?>" id="email-input">
                                    <div id="email_warning"></div>
                                </div> 

                                <div class="form-group">
                                    <label for="password">Date of Birth</label>
                                    <input type="text" name="date_birth" class="form-control" value="<?php echo $profile->date_birth; ?>">
                                </div> 

                                <div class="form-group">
                                    <label for="password">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $profile->address; ?>">
                                </div> 

                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-primary" value="Update"> 
                                </div> 

                            </div> 

                        </form>    


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>