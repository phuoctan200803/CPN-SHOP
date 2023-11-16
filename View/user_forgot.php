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
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Quên mật
            khẩu</span></h2>
    <div class="row px-xl-5 col d-flex justify-content-center">

        <div class="col-xl-6 mb-5">
            <div class="contact-form bg-light p-30">
                <h3 class="mb-4 ">Điền vào gmail của bạn</h3>
                <form method="POST" action="">
                    <?php if (isset($kq)&& $kq==true) { ?>
                    <div class="alert alert-success" role="alert">
                        Mật khẩu mới đã được gửi đến mail của bạn. <a href="?mod=user&act=login">Đăng nhập tại</a>
                    </div>
                    <?php } ?>
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
                    <div>
                        <input type="submit" name="submit_forgot" class="btn btn-primary py-2 "
                            value=" Lấy lại mật khẩu">
                    </div>




                </form>

            </div>
        </div>
    </div>
    <!--Join Now End-->