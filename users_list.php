<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("user/login.php"); } ?>


        <div class="row">



            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th class="info">First name</th>
                  <th class="info">Last name</th>
                  <th class="info">Email</th>
                  <th class="info">Birth date</th>
                  <th class="info">Photo</th>
                </tr>
                <?php 
                  $user_profile = Profile::find_all();

                  foreach ($user_profile as $profile):
                  ?>

                <tr>
                  <td><?php echo $profile->first_name; ?></td>
                  <td><?php echo $profile->last_name; ?></td>
                  <td><?php echo $profile->email; ?></td>
                  <td><?php echo $profile->date_birth; ?></td>
                  <td><img height="50" src="<?php echo 'user' . DS .$profile->image_path_and_placeholder(); ?>" ></td>
                </tr>
                <?php endforeach; ?>

                
              </table>
            </div>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
