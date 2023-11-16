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
                                        Comment
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0"><?= $product['tensp'] ?></h1>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="p-4">
                        <input type="text" placeholder="Start typing to search for categories" class="form-control form-control--search mx-auto" id="table-search" />
                    </div>
                    <div class="sa-divider"></div>
                    <form action="?mod=comment&act=delete&id=<?= $product['masp'] ?>" method="POST">
                        <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                            <thead>
                                <tr>
                                    <th class="w-min">
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" onclick="checkAll(this)" />
                                    </th>
                                    <th class="min-w-15x">Nội dung bình luận</th>
                                    <th>Ngày bình luận</th>
                                    <th>Người bình luận</th>
                                    <th class="w-min" data-orderable="false"></th>
                                </tr>
                            </thead>
                            <tbody style="margin-bottom: 50px;">

                                <?php foreach ($detail_comment as $item) { ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" name="item[]" value="<?= $item['mabl'] ?>" />
                                        </td>
                                        <td>
                                            <a href="app-category.html" class="text-reset"><?= $item['noidung'] ?>
                                            </a>
                                        </td>
                                        <td><?= $item['thoigianbinhluan'] ?></td>
                                        <td>
                                            <div class="">
                                                <?= $item['hoten'] ?>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="btn btn-secondary">

                                                <a class="text-dark" href="admin.php?mod=comment&act=delete&id=<?= $product['masp'] ?>&idbl=<?= $item['mabl'] ?>">Xóa</a>

                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                        <input type="submit" value="Xóa bình luận" class="btn mt-5 btn-secondary" name="dele_categorie" id="deleteButton">
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- sa-app__body / end -->