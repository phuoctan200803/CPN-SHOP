<script type="text/javascript">
    function checkAll(source) {
        checkboxes = document.getElementsByName('item[]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
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
                                    Comments
                                </li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">Comments</h1>
                    </div>
                    <!-- <div class="col-auto d-flex">
                        <a href="?mod=comment&act=add" class="btn btn-primary">Comment</a>
                    </div> -->
                </div>
            </div>
            <div class="card">
                <div class="p-4">
                    <input type="text" placeholder="Start typing to search for customers" class="form-control form-control--search mx-auto" id="table-search" />
                </div>
                <div class="sa-divider"></div>
                <form action="?mod=comment&act=delete" method="POST">
                    <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                        <thead>
                            <tr>
                                <th class="w-min" data-orderable="false">
                                    <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." onclick="checkAll(this)" />
                                </th>
                                <th class=" min-w-5px">Tên sản phâm</th>
                                <th>Số lượng bình luận </th>
                                <th>Mới nhất</th>
                                <th>Cũ Nhất</th>
                                <th class="" data-orderable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataComment as $comment) { ?>

                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." name="item[]" value="<?= $comment['mabl'] ?>" />
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- <a href="#" class="me-4">
                                            <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                <img src="View/img/comment/" width="40" height="40" alt="" />
                                            </div>
                                        </a> -->
                                            <div>
                                                <a href="app-customer.html" class="text-reset">

                                                </a>
                                                <div class="text-muted mt-n1">
                                                    <?= $comment['tensp'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>

                                        <?= $comment['so_luong'] ?>
                                    </td>

                                    <td>
                                        <?= $comment['moi_nhat'] ?>
                                    </td>
                                    <td>
                                        <?= $comment['cu_nhat'] ?>
                                    </td>
                                    <td>
                                        <div class="btn btn-secondary">

                                            <a class="text-dark" href="admin.php?mod=comment&act=detail&id=<?= $comment['masp'] ?>">Chi
                                                tiết</a>

                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                    <!-- <input type="submit" value="Xóa tài khoản" class="btn mt-5 btn-secondary" name="dele_comment"
                        id="deleteButton"> -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- sa-app__body / end -->
<!-- sa-app__footer -->