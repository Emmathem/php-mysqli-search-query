<?php
session_start();
require_once __DIR__.'/../lib/Classes/UserLibrary.php';
$user_login = new UserLibrary();

if($user_login->is_logged_in()!="")
{
    $user_login->redirect('library');
}

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if($user_login->login($email,$password))
    {
        $user_login->redirect('library');
    }
}
?>
<? include __DIR__ . '/views-stubs/header.php' ?>
    <? include __DIR__ . '/views-stubs/min-head.php' ?>
            <div class="col-md-2 sidebar">
                <div class="side-logo"></div>
                <div class="inner_content">
                    <div class="content">
                        <h3>Department of Computer Science</h3>
                        <span>The Online Materials should help you to read ahead of the semester</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="col-md-10 login-container-2 wow animated fadeInDown" data-wow-delay=".6s" data-wow-duration=".9s">
                    <h3 class="text-center">Login to Access The Online Materials</h3>
                    <div class="">
                        <div class="panel">
                            <div class="panel-body">

                                <div class="col-md-offset-2 col-md-8">
                                    <div class="auth-alert">
                                        <?php 
											if(isset($_GET['inactive']))
											{
												?>
                                            <div class='alert alert-warning'>
                                                <button class='close' data-dismiss='alert'>&times;</button>
                                                <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it.
                                            </div>
                                            <?php
											}
											?>
                                                <form class="form-signin" method="post">
                                                    <?php
									        if(isset($_GET['error']))
											{
												?>
                                                        <div class='alert alert-danger'>
                                                            <button class='close' data-dismiss='alert'>&times;</button>
                                                            <strong>Wrong Details!</strong>
                                                        </div>
                                                        <?php
											}
										    ?>
                                                </form>
                                    </div>

                                    <form class="add-admin-form" action="" method="POST">
                                        <div class="form-group">
                                            <label class="control-label sr-only">Email Address</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
                                                <input type="email" class="form-control" placeholder="Email address" name="email" value="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label sr-only">Matric Number</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                                                <input type="password" class="form-control" placeholder="Enter your Matric Number" name="password" value="" />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-submit" type="submit" name="login">Login</button>
                                            <a href="getstarted">Not Registered, Contact the Admin</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <? include __DIR__ . '/views-stubs/footer.php'; ?>
