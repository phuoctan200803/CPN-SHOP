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
                            <!-- <th>Số lượng sản phẩm</th> -->
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
                            <!-- <td>3 items</td> -->
                            <td>
                                <div class="sa-price"><span class="sa-price__symbol"></span><span
                                        class="sa-price__integer"><?= $item['tongtien'] ?></span><span
                                        class="sa-price__decimal">.00</span><span class="sa-price__symbol">đ</span>
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
    </div>
</div>