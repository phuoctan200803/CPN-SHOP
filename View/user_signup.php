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
                        <input type="text" class="form-control" id="name" name="username" placeholder="Your Name"
                            value="<?php if (isset($username)) {
                                                                                                                                echo $username;
                                                                                                                            } ?>">
                    </div>
                    <?php if (isset($error) && !empty($error['username'])) : ?>
                    <div class="alert alert-warning"><?php echo $error['username'] ?></div>
                    <?php
                    endif;
                    unset($error['username']);
                    ?>
                    <!-- <div class="control-group mb-3 d-flex">
                        <div class="">Ngày sinh</div>
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Your birthday">
                    </div> -->
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Your Email"
                            value="<?php if (isset($email)) {
                                                                                                                            echo $email;
                                                                                                                        } ?>">
                    </div>
                    <?php if (isset($error) && !empty($error['email'])) : ?>
                    <div class="alert alert-warning"><?php echo  $error['email'] ?></div>

                    <?php
                    endif;
                    unset($error['email']); ?>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Your Password"
                            value="<?php if (isset($passTemp)) {
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
                        <input class="btn btn-primary py-2 px-4" type="submit" name="submit_signup"
                            id="sendMessageButton" value="Sign Up">
                    </div>

                </form>
                <!-- <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
                    <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                        <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                            <h1 class="mb-0 fs-3">Sign Up</h1>
                            <div class="fs-exact-14 text-muted mt-2 pt-1 mb-5 pb-2">Fill out the form to create a new
                                account.</div>
                            <div class="mb-4">
                                <label class="form-label">Full name</label><input type="text"
                                    class="form-control form-control-lg" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Email Address</label><input type="email"
                                    class="form-control form-control-lg" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Password</label><input type="password"
                                    class="form-control form-control-lg" />
                            </div>
                            <div class="mb-4 py-2">
                                <label class="form-check mb-0"><input type="checkbox" class="form-check-input" />
                                    <span class="form-check-label">I agree to the
                                        <a href="page-terms.html">terms and conditions</a>.</span></label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">Sign Up</button>
                            </div>
                        </div>
                        <div class="sa-divider sa-divider--has-text">
                            <div class="sa-divider__text">Or continue with</div>
                        </div>
                        <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
                            <div class="d-flex flex-wrap me-n3 mt-n3">
                                <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3">Google</button>
                                <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3">Facebook</button>
                                <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3">Twitter</button>
                            </div>
                            <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">Already have an account?
                                <a href="auth-sign-in.html">Sign in</a>
                            </div>
                        </div>
                    </div>
                </div> -->
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