<?php
$account = $data['account'];
?>
<!-- sa-app__body -->
<div id="top" class="sa-app__body">

    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-end">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="app-categories-list.html">Categories</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit Account
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="h3 m-0">Edit Account</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <input type="submit" value="Save" name="sub_edit_account" class="btn btn-primary">
                        </div>
                    </div>
                </div>

                <div class="d-flex  ">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body p-5">
                                <div class="mb-4">
                                    <h2 class="mb-0 fs-exact-18">
                                        Thông tin tài khoản
                                    </h2>
                                </div>
                                <?php if (isset($thongbao)) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $thongbao ?>
                                    </div>
                                <?php } ?>
                                <div class="mb-4">
                                    <label for="form-category/name" class="form-label">Tên tài khoản</label><input type="text" class="form-control" id="form-category/name" value="<?= $account['hoten'] ?>" name="account_name" placeholder="Abc" />
                                </div>
                                <div class="mb-4">
                                    <label for="form-category/name" class="form-label">Email</label><input type="email" class="form-control" id="form-category/name" value="<?= $account['email'] ?>" name="account_mail" placeholder="example@gmai.com" />
                                </div>
                                <div class="mb-4">
                                    <label for="form-category/name" class="form-label">Số điên thoại</label><input type="number" class="form-control" id="form-category/name" value="<?= $account['sodienthoai'] ?>" name="account_phone" placeholder="+841234567" />
                                </div>

                                <div class="mb-4">
                                    <label for="form-category/name" class="form-label">Ngày sinh</label><input type="date" clas="form-control" id="form-category/name" value="<?= $account['ngaysinh'] ?>" name="account_birth" placeholder="+841234567" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex card">

                        <div class="mb-3">
                            <h2 class="mb-0 fs-exact-18">
                                Giới tính
                            </h2>
                        </div>
                        <div class="mb-2">
                            <label class="form-check"><input type="radio" class="form-check-input" name="gender" value="nam" checked="" />
                                <span class="form-check-label">Nam</span>
                            </label>
                            <label class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="nữ" />
                                <span class="form-check-label">Nữ</span></label>

                        </div>
                        <div class=" d-flex align-content-center">
                            <div class="mb-5">
                                <p class="mb-0">
                                    Image
                                </p>
                            </div>
                            <div class="p-4 d-flex justify-content-center">
                                <div class="mt-4 mb-n2 ">
                                    <img src="img/account/<?= $account['anh'] ?>" style="max-width: 30px;" alt="<?= $account['anh'] ?>" />
                                    <input type="file" name="userImg" class="form-controller">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

    </div>
    </form>

</div>
</div>
<!-- sa-app__body / end -->
<!-- sa-app__footer -->