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
                <h3 class="mb-4 ">Log In</h3>
                <form method="POST" action="">
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" id="email" placeholder="Your Email" name="email"
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
                        <input type="password" class="form-control" id="password" placeholder="Your Password"
                            name="password">
                    </div>
                    <?php if (isset($error) && !empty($error['password'])) : ?>
                    <div class="alert alert-warning"><?php echo $error['password'] ?></div>
                    <?php
                    endif;
                    unset($error['password']);
                    ?>
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="submit" name="submit-login" class="btn btn-primary py-2 px-4" value="Sign In">
                        <a href="?mod=user&act=forgot" class="mr-0 float-end">Quên mật khẩu</a>
                    </div>
                    <?php if (isset($thongbao)) : ?>
                    <div class="alert alert-warning"><?php echo $thongbao ?></div>
                    <?php
                    endif;
                    unset($thongbao);
                    ?>
                </form>
            </div>
        </div>
    </div>
    <!--Join Now End-->