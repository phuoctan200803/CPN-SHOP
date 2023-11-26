<!-- code mới -->

<script type="text/javascript">
    function checkAll(source) {
        checkboxes = document.getElementsByName('item[]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function deleteProduct(masp) {
        kq = confirm("Bạn có muốn xóa sản phẩm");
        if (kq) {
            window.location.search = '?mod=product&act=delete&id=' + masp;
        }
    }
</script>
<!-- sa-app__sidebar / end -->
<!-- sa-app__content -->
<div class="sa-app__content">
    <!-- sa-app__body -->
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Product
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Sản phẩm</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="?mod=product&act=add" class="btn btn-primary">New product</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-4">
                        <input type="text" placeholder="Start typing to search for product" class="form-control form-control--search mx-auto" id="table-search" />
                    </div>
                    <div class="sa-divider"></div>
                    <form action="?mod=product&act=delete" method="POST">
                        <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                            <thead>
                                <tr>
                                    <th class="w-min">
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" onclick="checkAll(this)" />
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
                                            <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" name="item[]" value="<?= $sp['masp'] ?>" />
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="../img/product/<?= $sp['anhsp'] ?>" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div>
                                                    <a href="app-product.html" class="text-reset"><?= $sp['tensp'] ?></a>
                                                    <div class="sa-meta mt-0">
                                                        <ul class="sa-meta__list">
                                                            <li class="sa-meta__item">ID:
                                                                <span title="Click to copy product ID" class="st-copy"><?= $sp['masp'] ?></span>
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
                                                <button class="btn btn-sa-muted btn-sm" type="button" id="product-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="product-context-menu-0">
                                                    <li>
                                                        <a class="dropdown-item" href="?mod=product&act=edit&id=<?= $sp['masp'] ?>">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" onclick="deleteProduct(<?= $sp['masp'] ?>)">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <input type="submit" value="Xóa sản phẩm" class="btn mt-5 btn-secondary" name="dele_account" id="deleteButton">

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- sa-app__body / end -->