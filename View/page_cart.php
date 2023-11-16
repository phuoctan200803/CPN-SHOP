<?php
//echo "<pre>";
//print_r($_SESSION['cart']);
//echo "<pre>";
//echo "<pre>";
//print_r($list_buy);
//echo "<pre>";
?>

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Cart Start -->
<div class="container-fluid">
    <?php if (!empty($_SESSION['cart']['buy'])) { ?>
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <form action="?mod=cart&act=update" method="POST">
                    <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php
                            foreach ($list_buy as $item) {
                            ?>
                                <tr>
                                    <td class="align-middle" style="display: flex;justify-content: space-between;"><img src="img/product/<?= $item['anhsp'] ?>" alt="" style="width: 50px;"><span><?= $item['tensp'] ?></span></td>
                                    <td class="align-middle"><?= number_format($item['giakhuyenmai']) ?> đ</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <input type="number" class="form-control form-control-sm bg-secondary border-0 text-center" name="qty[<?php echo $item['masp']; ?>]" value="<?= $item['qty'] ?>" min="1" max="10" />
                                        </div>
                                    </td>
                                    <td class="align-middle"><?= number_format($item['sub_total']) ?> đ</td>
                                    <td class="align-middle"><a href="?mod=cart&act=delete&id=<?php echo $item['masp']; ?>"><i class="fa fa-times p-2 btn-danger"></i></a></td>

                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <input type="submit" id="update-cart" name="btn_update_cart" value="Cập nhật giỏ hàng" class="btn border  border-dark">
                                            <a href="?mod=cart&act=delete" title="" id="delete-cart" class="btn border  border-dark">Xóa giỏ hàng</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>

            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?= number_format($_SESSION['cart']['info']['total']) ?> đ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><?php $ship = (empty($_SESSION['cart']['buy'])) ? 0 : 200000;
                                                            echo number_format($ship); ?> đ</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?= number_format($_SESSION['cart']['info']['total'] + (int) $ship) ?> đ</h5>
                        </div>
                        <a href="?mod=cart&act=checkout" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo "<span>Giỏ hàng trống nhấn <a href='?mod=page&act=home'>vào đây</a> để tiếp tục mua hàng </span>";
    }
    ?>
</div>
<!-- Cart End -->