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
                                    Customers
                                </li>
                            </ol>
                        </nav>
                        <h1 class="h3 m-0">Customers</h1>
                    </div>
                    <div class="col-auto d-flex">
                        <a href="?mod=account&act=add" class="btn btn-primary">New account</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="p-4">
                    <input type="text" placeholder="Start typing to search for customers" class="form-control form-control--search mx-auto" id="table-search" />
                </div>
                <div class="sa-divider"></div>
                <form action="?mod=account&act=delete" method="POST" id="deleteForm">
                    <table class="sa-datatables-init" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                        <thead>
                            <tr>
                                <th class="w-min" data-orderable="false">
                                    <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." onclick="checkAll(this)" />
                                </th>
                                <th class=" min-w-20x">Họ và tên
                                </th>
                                <th>Ngày đăng ký</th>
                                <th>Quyền</th>
                                <th>Group</th>
                                <th>Spent</th>
                                <th class="w-min" data-orderable="false"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['account'] as $account) { ?>

                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." name="item[]" value="<?= $account['matk'] ?>" />
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="me-4">
                                                <div class="sa-symbol sa-symbol--shape--rounded sa-symbol--size--lg">
                                                    <img src="../img/account/<?= $account['anh'] ?>" width="40" height="40" alt="" />
                                                </div>
                                            </a>
                                            <div>
                                                <a href="app-customer.html" class="text-reset">
                                                    <?= $account['hoten'] ?>
                                                </a>
                                                <div class="text-muted mt-n1">
                                                    <?= $account['email'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <?= $account['ngaydangky'] ?>
                                    </td>
                                    <td><?= $account['quyen'] ?></td>
                                    <td>Default</td>
                                    <td>
                                        <div class="sa-price">
                                            <span class="sa-price__symbol">$</span><span class="sa-price__integer"></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                    <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="customer-context-menu-0">
                                                <li>
                                                    <a class="dropdown-item" href="?mod=account&act=edit&id=<?= $account['matk'] ?>">Edit</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item text-danger" onclick="deleteAccount(<?= $account['matk'] ?>)">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                    <input type="submit" value="Xóa tài khoản" class="btn mt-5 btn-secondary" name="dele_account" id="deleteButton">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- sa-app__body / end -->
<!-- sa-app__footer -->
<script>
    function deleteAccount(id) {
        kq = confirm("Bạn có muốn xóa tài khoản");
        if (kq) {
            window.location.search = '?mod=account&act=delete&id=' + id;
        }
    }
</script>