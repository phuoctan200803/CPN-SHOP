<?php
if (isset($_SESSION['user'])) {
    $phone = $_SESSION['user']['sodienthoai'];
    $address = $_SESSION['user']['diachi'];
}

?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="?mod=page&act=home">Trang chủ</a>
                <span class="breadcrumb-item active">Thanh toán</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <form action="?mod=cart&act=sendmail" method="POST" name="checkoutForm">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Địa
                        chỉ</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <?php if (isset($thongbao)) { ?>
                            <div class="col-md-12 form-group">
                                <div class="alert alert-warning" role="alert">

                                    echo $thongbao;
                                </div>
                            </div>
                        <?php  } ?>
                        <div class="col-md-12 form-group">
                            <label>Họ và tên</label>
                            <input class="form-control" type="text" placeholder="John" name="name" required="required" data-validation-required-message="Vui lòng điền họ tên" value="<?php if (isset($name)) {
                                                                                                                                                                                            echo $name;
                                                                                                                                                                                        } ?>">


                        </div>

                        <div class="col-md-12 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="example@email.com" required="required" data-validation-required-message="Vui lòng điền email" value="<?php if (isset($email)) {
                                                                                                                                                                                                        echo $email;
                                                                                                                                                                                                    } ?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Số điện thoại</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="mobile" required="required" data-validation-required-message="Vui lòng điền số điện thoại" value="<?php if (!empty($phone)) {
                                                                                                                                                                                                            echo $phone;
                                                                                                                                                                                                        } ?>">

                        </div>
                        <div class="col-md-12 form-group">
                            <label>Địa chỉ </label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address" required="required" data-validation-required-message="Vui lòng điền địa chỉ" value=" <?php if (isset($address)) {
                                                                                                                                                                                                        echo $address;
                                                                                                                                                                                                    } ?>">
                            <p class="help-block text-danger"></p>
                        </div>


                    </div>
                </div>



            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tổng đơn
                        hàng</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Sản Phẩm</h6>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart']['buy'] as $item) {
                            $total += $item['sub_total'];
                        ?>
                            <div class="d-flex justify-content-between">
                                <p style="width: 60%; overflow: hidden;"><?= $item['tensp'] ?></p>
                                <p><?= number_format($item['sub_total']) ?> đ</p>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Tiền hàng</h6>
                            <h6><?= number_format($total) ?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <?php $ship = (empty($_SESSION['cart']['buy'])) ? 0 : 200000 ?>
                            <h6 class="font-weight-medium"><?= number_format($ship) ?> đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng tiền</h5>
                            <h5><?= number_format($_SESSION['cart']['info']['total'] + (int) $ship) ?> đ</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Phương thức</span>
                    </h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Momo</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Chuyển khoản</label>
                            </div>
                            <!-- <div class=""> -->
                            <input type="submit" class="btn btn-block btn-primary font-weight-bold py-3 mt-3" name="btn_place_order" value="Hoàn tất" />
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Checkout End -->