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
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Thay đổi
            password</span></h2>
    <div class="row px-xl-5 col d-flex justify-content-center">

        <div class="col-xl-6 mb-5">
            <div class="contact-form bg-light p-30">
                <!-- <h3 class="mb-4 ">Điền vào gmail của bạn</h3> -->
                <form method="POST" action="">

                    <?php if ($flag == 1) { ?>
                        <div class="alert alert-success" role="alert">
                            Cập nhật mật khẩu thành công;
                        </div>
                    <?php } ?>
                    <div class="control-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu mới " name="new_password" value="">
                    </div>
                    <?php if (isset($error) && !empty($error['new_password'])) : ?>
                        <div class="alert alert-warning"><?php echo  $error['new_password'] ?></div>
                    <?php
                    endif;
                    unset($error['new_password']); ?>

                    <div class="control-group mb-3">
                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới" name="confirm_password" value="">
                    </div>
                    <?php if (isset($error) && !empty($error['confirm_password'])) : ?>
                        <div class="alert alert-warning"><?php echo  $error['confirm_password'] ?></div>
                    <?php
                    endif;
                    unset($error['confirm_password']); ?>


                    <div>
                        <input type="submit" name="submit_changePass" class="btn btn-primary py-2 " value="Đổi mật khẩu">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--Join Now End-->