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
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
    <form action="?mod=cart&act=sendmail" method="POST">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing
                        Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="John" name="name"
                                value="<?php echo isset($name) ? $name : ''; ?>">

                        </div>

                        <div class="col-md-12 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="example@email.com"
                                value="<?php echo (isset($email)) ? $email : "" ?>">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="mobile"
                                value="<?php echo (isset($phone)) ? $phone : ""; ?>">

                        </div>
                        <div class="col-md-12 form-group">
                            <label>Address Line </label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address"
                                value="<?php echo (isset($address)) ? $address : "" ?>">
                        </div>

                        <!-- <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount"
                                    name="create-account">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                    data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" placeholder="John" name="name"
                                    value="<?php echo isset($name) ? $name : ''; ?>">

                            </div>

                            <div class="col-md-12 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" placeholder="example@email.com"
                                    value="<?php echo (isset($email)) ? $email : "" ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789" name="mobile"
                                    value="<?php echo (isset($phone)) ? $phone : ""; ?>">

                            </div>
                            <div class="col-md-12 form-group">
                                <label>Address Line </label>
                                <input class="form-control" type="text" placeholder="123 Street" name="address"
                                    value="<?php echo (isset($address)) ? $address : "" ?>">
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                        Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart']['buy'] as $item) {
                            $total += $item['giakhuyenmai'];
                        ?>
                        <div class="d-flex justify-content-between">
                            <p style="width: 60%; overflow: hidden;"><?= $item['tensp'] ?></p>
                            <p><?= number_format($item['sub_total']) ?> đ</p>
                        </div>
                        <?php } ?>

                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
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
                            <h5>Total</h5>
                            <h5><?= number_format($_SESSION['cart']['info']['total'] + (int) $ship) ?> đ</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span
                            class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                            <!-- <div class=""> -->
                            <input type="submit" class="btn btn-block btn-primary font-weight-bold py-3 mt-3"
                                name="btn_place_order" value="Place Order" />
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Checkout End -->