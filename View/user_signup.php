<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <span class="breadcrumb-item active">Join Now</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Join Now Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">JOIN
            NOW</span></h2>
    <div class="row px-xl-5 col d-flex justify-content-center">
        <div class="col-xl-6 mb-5">
            <div class="contact-form bg-light p-30">
                <h3 class="mb-4">Sign up</h3>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="name" name="username" placeholder="Your Name" value="<?php if (isset($username)) {
                                                                                                                                echo $username;
                                                                                                                            } ?>">
                    </div>
                    <?php if (isset($error) && !empty($error['username'])) : ?>
                        <div class="alert alert-warning"><?php echo $error['username'] ?></div>
                    <?php
                    endif;
                    unset($error['username']);
                    ?>
                    <div class="control-group mb-3">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Your birthday">
                    </div>
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Your Email" value="<?php if (isset($email)) {
                                                                                                                            echo $email;
                                                                                                                        } ?>">
                    </div>
                    <?php if (isset($error) && !empty($error['email'])) : ?>
                        <div class="alert alert-warning"><?php echo  $error['email'] ?></div>

                    <?php
                    endif;
                    unset($error['email']); ?>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" value="<?php if (isset($passTemp)) {
                                                                                                                                            echo $passTemp;
                                                                                                                                        } ?>">
                    </div>
                    <?php if (isset($error) && !empty($error['password'])) : ?>
                        <div class="alert alert-warning"><?php echo $error['password'] ?></div>
                    <?php
                    endif;
                    unset($error['password']);
                    ?>
                    <div class="control-group mb-3">
                        <span>Ảnh đại diện</span>
                        <input type="file" name="userImg" class="form-controller">
                    </div>
                    <div>
                        <input class="btn btn-primary py-2 px-4" type="submit" name="submit_signup" id="sendMessageButton" value="Sign Up">
                    </div>

                </form>

            </div>
        </div>
        <!-- <div class="col-lg-6 mb-5">
            <div class="contact-form bg-light p-30">
                <h3 class="mb-4 ">Sign In</h3>
                <form method="POST" action="">
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Your Email" name="email">
                    </div>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Your Password"
                            name="matkhau">
                    </div>
                    <div>
                        <input type="submit" name="submit-login" class="btn btn-primary py-2 px-4" value="Sign In">
                    </div>
                    <?php if (isset($thongbao)) : ?>
                    <div class="alert alert-warning"><?php echo $thongbao ?></div>

                    <?php
                    endif;
                    unset($thongbao);
                    ?>
                </form>
            </div>
        </div> -->
    </div>
    <!--Join Now End-->