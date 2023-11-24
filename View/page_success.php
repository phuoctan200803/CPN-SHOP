<?php if (!empty($dssp)) { ?>
    <div class="card w-50 flex-grow-1 flex-sm-grow-0 mx-auto mt-2">
        <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
            <!-- <h1 class="mb-0 fs-3">Confirm email address</h1> -->
            <h1 class="title-headding order-headding">Mã đơn hàng TC105708</h1>
            <div class="alert alert-success alert-sa-has-icon mt-4 mb-4" role="alert">
                <h2 class="">Đặt hàng thành công</h2>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 top_order_title">
                            <span class="note order_date"><i>Ngày tạo — 18/11/2023</i>
                                <a style=" float: right; " href="/account"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Quay lại trang tài khoản</a>
                            </span>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="table-responsive-blockxxxxx margin-top-20 table-responsive">
                                <table id="order_details" class="table table-cart">
                                    <thead class="thead-default">
                                        <tr>
                                            <th style="border-bottom: none;">Sản phẩm</th>
                                            <th style="border-bottom: none;">Mã sản phẩm</th>
                                            <th style="border-bottom: none;">Giá</th>
                                            <th style="border-bottom: none;">Số lượng</th>
                                            <th style="border-bottom: none;">Tổng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $total = 0;
                                        foreach ($dssp as $item) {
                                            $total += $item['sub_total'];
                                        ?>
                                            <tr>
                                                <td data-title="Tên">
                                                    <a href=""><?= $item['tensp'] ?></a>
                                                </td>
                                                <td data-title="Mã SKU">#<?= $item['masp'] ?>&nbsp;</td>
                                                <td data-title="Giá" class="numeric">
                                                    <?= number_format($item['giakhuyenmai']) ?>₫</td>
                                                <td data-title="Số lượng" class="numeric"><?= $item['qty'] ?></td>
                                                <td data-title="Tổng" class="numeric">
                                                    <?= number_format($item['sub_total']) ?>₫</td>
                                            </tr>

                                        <?php                                    } ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 oder_total_monney">
                            <table class="table  totalorders">
                                <tfoot>

                                    <tr class="order_summary note" style="color:red;">
                                        <td class="fix-width-200" colspan="">Phí vận chuyển:</td>
                                        <td class="total money right">Giao hàng tận nơi <strong style="color:#f02b2b">20,000₫</strong>
                                        </td>
                                    </tr>

                                    <tr class="order_summary order_total">
                                        <td class="fix-width-200">Tổng tiền:</td>
                                        <td class="right"><strong><?= number_format($total + 20000) ?> đ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-around">

                            <a href="?mod=page&act=home" class="btn btn-primary">Trở về trang chủ</a>
                            <a href="?mod=user&act=infoorder" class="btn btn-primary">Chi tiết đơn hàng</a>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php } ?>