<section class=" mt-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
                <div id="parent" class="row">
                    <div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">
                        <div class="page-title m992">
                            <h1 class="title-head margin-top-0"><a href="#">Thông tin tài khoản</a></h1>
                        </div>
                        <div class="form-signup name-account m992">
                            <p><strong>Xin chào, <a href="/account/addresses" style="color:#f02b2b;">vo
                                        phuoc</a>&nbsp;!</strong></p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                            <div class="my-account">
                                <div class="dashboard">

                                    <div class="recent-orders">
                                        <div class="table-responsive tab-all" style="overflow-x:auto;">
                                            <table class="table table-cart" id="my-orders-table">
                                                <thead class="thead-default a-center">
                                                    <tr class="bg-top">
                                                        <th>Đơn hàng</th>
                                                        <th>Ngày</th>
                                                        <th>Giá trị đơn hàng</th>
                                                        <!-- <th>Trạng thái thanh toán</th> -->
                                                        <th>Trạng thái giao hàng</th>
                                                        <th>Chi tiết đơn hàng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                                                        <td colspan="6">
                                                            <p>Không có đơn hàng nào.</p>
                                                        </td>
                                                    </tr> -->
                                                    <?php foreach ($dsdh as $item) { ?>
                                                        <tr>
                                                            <td><?= $item['madh'] ?></td>
                                                            <td><?= $item['ngaydathang'] ?></td>
                                                            <td><?= $item['tongtien'] ?></td>
                                                            <td><?= $item['trangthai'] ?></td>
                                                            <td><a href="?mod=user&act=orderDetail&idOrder=<?= $item['madh'] ?>" class="btn btn-primary">Chiết</a></td>
                                                        </tr>
                                                    <?php } ?>

                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="text-xs-right">

                                        </div>
                                    </div>
                                    <div class="paginate-pages pull-right page-account">
                                        <nav class="clearfix relative nav_pagi f-left w_100">
                                            <ul class="pagination clearfix">
                                                <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                                <li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
                        <div class="block-account">
                            <div class="block-content form-signup">
                                <p>Quản lý cá nhân <strong style="line-height: 20px;"> </strong></p>
                                <p><i class="fa fa-user"></i><a href="?mod=user&act=info" class="ml-2">Thông tin tài
                                        khoản
                                    </a> </p>
                                <p><i class="fa fa-clipboard-check"></i><a href="?mod=user&act=infoorder" class="ml-2">Thông
                                        tin
                                        đơn
                                        hàng </a></p>
                                <p><i class="fab fa-500px"></i><a href="?mod=user&act=change_pass" class="ml-2"> Đổi mật
                                        khẩu
                                    </a></p>
                                <p><i class="fab fa-500px"></i><a href="?mod=user&act=edit&id=<?php echo $_SESSION['user']['matk'] ?>" class="ml-2">Cập nhật
                                        tài khoản
                                    </a></p>
                                <p><i class="fa fa-code font-some" aria-hidden="true"></i> <a href="?mod=user&act=logout" class="ml-2"> Đăng
                                        xuất
                                    </a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>