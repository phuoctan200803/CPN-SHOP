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
                    <div class="col-auto d-flex"><a href="app-order.html" class="btn btn-primary">New
                            order</a></div>
                </div>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <!-- <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" -->
                    <!-- type="button" role="tab" aria-controls="home" aria-selected="true"> -->
                    <a href="?mod=order&act=show&status=0" class="nav-link active" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Chờ
                        duyệt</a>
                    <!-- </button> -->
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false"><a
                            href="?mod=order&act=show&status=1">Đang giao</a></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false"><a
                            href="?mod=order&act=show&status=2">Đã giao</a></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false"><a
                            href="?mod=order&act=show&status=3">Hủy</a></button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="p-4"><input type="text" placeholder="Start typing to search for orders"
                                class="form-control form-control--search mx-auto" id="table-search" /></div>
                        <div class="sa-divider"></div>
                        <table class="sa-datatables-init text-nowrap" data-order="[[ 1, &quot;desc&quot; ]]"
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
                                    <td><a href="#" class="text-reset"><?= $item['madh'] ?></a></td>
                                    <td><?= $item['ngaydathang'] ?></td>
                                    <td><a href="#" class="text-reset"><?= $item['hoten'] ?></a></td>
                                    <form action="" method="POST">
                                        <td>
                                            <input type="submit" name="submit" class="btn btn-primary"
                                                value="<?= $item['trangthai'] ?>">
                                            <input type="number" name="id" value="<?= $item['madh'] ?>" hidden>
                                            <!-- <input type="text"> -->
                                        </td>
                                    </form>
                                    <td>
                                        <div class="sa-price"><span class="sa-price__symbol"></span><span
                                                class="sa-price__integer"><?= $item['tongtien'] ?></span><span
                                                class="sa-price__decimal">.00</span><span
                                                class="sa-price__symbol">đ</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" btn btn-primary"><a
                                                href="?mod=order&act=detail&id=<?= $item['madh'] ?>">Chi tiết</a></div>

                                    </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>



            <!-- <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                    <a href="?mod=order&act=show&status=0" class="nav-link">Chờ duyệt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul> -->
        </div>
    </div>
</div>