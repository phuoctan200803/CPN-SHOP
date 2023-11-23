<script type="text/javascript">
    function checkAll(source) {
        checkboxes = document.getElementsByName('item[]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>


<!-- sa-app__sidebar / end -->
<!-- sa-app__content -->
<div class="sa-app__content">
    <!-- sa-app__toolbar -->
    <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">

        <div class="sa-toolbar__shadow"></div>
    </div>
    <!-- sa-app__toolbar / end -->
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
                                        Categories
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Categories</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <a href="?mod=categories&act=add" class="btn btn-primary">New
                                category</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="p-4">
                        <input type="text" placeholder="Start typing to search for categories" class="form-control form-control--search mx-auto" id="table-search" />
                    </div>
                    <div class="sa-divider"></div>
                    <form action="?mod=categories&act=delete" method="POST" id="deleteForm">
                        <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                            <thead>
                                <tr>
                                    <th class="w-min">
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" onclick="checkAll(this)" />
                                    </th>
                                    <th class="min-w-15x">Tên danh mục</th>
                                    <th>Ưu tiên hiển thị</th>
                                    <th>Số lượng sản phẩm</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody style="margin-bottom: 50px;">

                                <?php foreach ($dsdm as $dm) { ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" name="item[]" value="<?= $dm['madm'] ?>" />
                                        </td>
                                        <td>

                                            <div class="d-flex align-items-center">
                                                <a href="#" class="me-4">
                                                    <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                        <img src="../img/product/<?= $dm['anh'] ?>" width="40" height="40" alt="" />
                                                    </div>
                                                </a>
                                                <div>
                                                    <a href="app-product.html" class="text-reset"><?= $dm['tendm'] ?></a>
                                                    <div class="sa-meta mt-0">
                                                        <ul class="sa-meta__list">
                                                            <li class="sa-meta__item">ID:
                                                                <span title="Click to copy product ID" class="st-copy"><?= $dm['madm'] ?></span>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            </a>
                                        </td>
                                        <td>
                                            <div class="badge badge-sa-success">
                                                Visible
                                            </div>
                                        </td>
                                        <td><?= $dm['soluongsp'] ?></td>
                                        <td> <a class="dropdown-item" href="?mod=categories&act=edit&id=<?= $dm['madm'] ?>" class="btn btn-success">Edit</a></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $dm['madm'] ?>">
                                                Delete

                                            </button>
                                        </td>
                                        <!-- Modal -->
                                    </tr>
                                    <div class="modal fade" id="exampleModal<?= $dm['madm'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $dm['madm'] ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Nếu bạn xóa danh mục, tất cả sản phẩm trong danh mục cũng xóa theo.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="?mod=categories&act=delete&id=<?= $dm['madm'] ?>" class="btn btn-primary">Tiếp
                                                        tục xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


                            </tbody>
                        </table>
                        <input type="submit" value="Xóa danh mục" class="btn mt-5 btn-secondary" name="dele_categorie" id="deleteButton">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- sa-app__body / end -->