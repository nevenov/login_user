            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php
                            $user = User::find_by_id($session->user_id);

                            echo $user->username;
                            ?>
                            <small>Dashboard</small>
                        </h1>

                        <p class="bg-success"><?php echo $message; ?></p>

                        <div class="row">                           


                            <div class="col-lg-9 col-md-9">
                                <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-5x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="huge">
                                                WELCOME

                                                </div>

                                                <div><?php echo $user->username; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="edit_user.php">
                                        <div class="panel-footer">
                                            <span class="pull-left">Edit your profile here</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            


                        </div> <!--First Row-->


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->