<?php
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $data = product_select_keyword($keyword);
}
?>

<script type="text/javascript">
function checkAll(source) {
    checkboxes = document.getElementsByName('item[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = source.checked;
    }
}
</script>

<div id="top" class="sa-app__body">

    <div class="mx-xxl-3 px-4 px-sm-5">
        <div class="py-5">
            <div class="row g-4 d-flex justify-content-around">
                <div class="col-4">
                    <h1 class="h3 m-0">Products</h1>
                </div>
                <form action="?mod=product&act=admin" method="post" class="col-4">
                    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm">
                    <input type="submit" value="Tìm Kiếm">
                </form>
                <div class="col-4 d-flex">
                    <a href="admin.php?mod=product&act=add" class="btn btn-primary">New product</a>
                </div>

            </div>
        </div>
    </div>
    <div class="mx-xxl-3 px-4 px-sm-5 pb-6">
        <div class="sa-layout">
            <div class="sa-layout__backdrop" data-sa-layout-sidebar-close=""></div>
            <div class="sa-layout__content">
                <form action="?mod=product&act=delete" method="POST" id="deleteForm">
                    <div class="card table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="w-min">
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                            onclick="checkAll(this)" />
                                    </th>
                                    <th class="min-w-20x">Tên sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Số lượng sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th class="w-min"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $sp) { ?>

                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block"
                                            name="item[]" value="<?= $sp['masp'] ?>" />
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="me-4">
                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                    <img src="../img/product/<?= $sp['anhsp'] ?>" width="40" height="40"
                                                        alt="" />
                                                </div>
                                            </a>
                                            <div>
                                                <a href="app-product.html" class="text-reset"><?= $sp['tensp'] ?></a>
                                                <div class="sa-meta mt-0">
                                                    <ul class="sa-meta__list">
                                                        <li class="sa-meta__item">ID:
                                                            <span title="Click to copy product ID"
                                                                class="st-copy"><?= $sp['masp'] ?></span>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="app-category.html" class="text-reset"><?= $sp['tendm'] ?></a>
                                    </td>
                                    <td>
                                        <div class="badge badge-sa-success"><?= $sp['soluong'] ?></div>
                                    </td>
                                    <td>
                                        <div class="sa-price">
                                            <span class="sa-price__integer"><?= $sp['gia'] ?></span>
                                            <span class="sa-price__decimal">đ</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sa-muted btn-sm" type="button"
                                                id="product-context-menu-0" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-label="More">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="product-context-menu-0">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="?mod=product&act=edit&id=<?= $sp['masp'] ?>">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger"
                                                        onclick="deleteProduct(<?= $sp['masp'] ?>)">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- fkfaf -->
                    <input type="submit" value="Xóa sản phẩm" class="btn mt-5 btn-secondary" name="submit_delete"
                        id="deleteButton">


                </form>




                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $sotrang; $i++) { ?>
                        <li class="page-item"><a class="page-link"
                                href="admin.php?mod=product&act=admin&page=<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?php } ?>

                        <li class=" page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>

                </nav>

            </div>
        </div>
    </div>
</div>
<!-- sa-app__body / end -->
<script>
function deleteProduct(masp) {
    kq = confirm("Bạn có muốn xóa sản phẩm");
    if (kq) {
        window.location.search = '?mod=product&act=delete&id=' + masp;
    }
}
</script>