<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Orders</li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">Orders</h1>
                    </div>
                    <!-- <div class="col-auto d-flex"><a href="app-order.html" class="btn btn-primary">New
                            order</a></div> -->
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" class="my-2">
                <li class="nav-item">
                    <a href="?mod=order&act=show&status=0" class="btn btn-secondary">Chờ xác nhận
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?mod=order&act=show&status=1" class="btn btn-secondary">Đang giao</a>
                </li>
                <li class="nav-item">
                    <a href=" ?mod=order&act=show&status=2" class="btn btn-secondary">Đã giao</a>
                </li>
                <li class="nav-item">
                    <a href="?mod=order&act=show&status=3" class="btn btn-secondary">Hủy</a>
                </li>
            </ul>
            <div class="card mt-2">
                <div class="p-4"><input type="text" placeholder="Start typing to search for orders"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <?php if (!empty($thongbao)) { ?>
                <div class="alert alert-warning" role="alert">
                    <?= $thongbao ?>
                </div>
                <?php } ?>
                <form action="" method="POST">
                    <table class="sa-datatables-init text-nowrap" data-order="[[ 1, &quot;<?php if ($status == "chờ xác nhận") {
                                                                                                echo "asc";
                                                                                            } else {
                                                                                                echo "desc";
                                                                                            } ?>&quot; ]]"
                        data-sa-search-input="#table-search">
                        <thead>
                            <tr>
                                <th class="w-min" data-orderable="false"><input type="checkbox"
                                        class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                                </th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th class="w-min" data-orderable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listOrder as $item) { ?>
                            <tr>
                                <td><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                        aria-label="..." /></td>
                                <td>#<?= $item['madh'] ?></td>
                                <td><?= $item['ngaydathang'] ?></td>
                                <td><a href="#" class="text-reset"><?= $item['hoten'] ?></a></td>
                                <td>
                                    <?php if ($item['trangthai'] == "chờ xác nhận") { ?>
                                    <button type="submit" name="confirm" value="<?= $item['madh'] ?>"
                                        class="btn btn-success">Xác
                                        nhận</button>
                                    <button type="submit" name="cancel" value="<?= $item['madh'] ?>"
                                        class="btn btn-danger">Hủy</button>
                                    <?php } else if ($item['trangthai'] == "đã giao") { ?>
                                    <span class="btn btn-success"><?= $item['trangthai'] ?></span>
                                    <?php } else if ($item['trangthai'] == "đang giao") { ?>
                                    <span class="btn btn-info"><?= $item['trangthai'] ?></span>
                                    <?php } else if ($item['trangthai'] == "hủy") { ?>
                                    <span class="btn btn-danger"><?= $item['trangthai'] ?></span>
                                    <?php } ?>



                                <td>
                                    <div class="sa-price"><span class="sa-price__symbol"></span><span
                                            class="sa-price__integer"><?= $item['tongtien'] ?></span><span
                                            class="sa-price__decimal">.00</span><span class="sa-price__symbol">đ</span>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                        if ($status != "hủy") { ?>
                                    <a href="?mod=order&act=detail&id=<?= $item['madh'] ?>" class="btn">Chi tiết</a>
                                    <?php } else { ?>
                                    <a href="#"><i class="fa fa-comments"></i></a>
                                    <?php }
                                        ?>


                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>