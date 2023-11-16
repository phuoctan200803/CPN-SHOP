<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <form action="?mod=account&act=add" method="post" enctype="multipart/form-data">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
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
                            <input type="submit" value="Save" name="sub_account" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md","1100":"sa-entity-layout--size--lg"}'>
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">
                                            Thông tin tài khoản
                                        </h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-category/name" class="form-label">Tên tài khoản</label><input type="text" class="form-control" id="form-category/name" value="" name="account_name" placeholder="Abc" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-category/name" class="form-label">Email</label><input type="email" class="form-control" id="form-category/name" value="" name="account_mail" placeholder="example@gmai.com" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-category/name" class="form-label">Số điên thoại</label><input type="number" class="form-control" id="form-category/name" value="" name="account_phone" placeholder="+841234567" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-category/name" class="form-label">Mật khẩu</label><input type="password" class="form-control" id="form-category/name" value="ABC!123" name="account_pass" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="form-category/name" class="form-label">Ngày sinh</label><input type="date" class="form-control" id="form-category/name" value="" name="account_birth" placeholder="+841234567" />
                                    </div>



                                </div>
                            </div>


                        </div>
                        <div class="sa-entity-layout__sidebar">
                            <div class="card w-100">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">
                                            Giới tính
                                        </h2>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-check"><input type="radio" class="form-check-input" name="gender" value="nam" />
                                            <span class="form-check-label">Nam</span>
                                        </label>
                                        <label class="form-check">
                                            <input type="radio" class="form-check-input" name="gender" value="nữ" />
                                            <span class="form-check-label">Nữ</span></label>

                                    </div>
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">
                                            Quyền
                                        </h2>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-check"><input type="radio" class="form-check-input" name="quyen" value="admin" />
                                            <span class="form-check-label">Amin</span>
                                        </label>
                                        <label class="form-check"><input type="radio" class="form-check-input" name="quyen" value="user" checked="" />

                                            <span class="form-check-label">User</span></label>

                                    </div>

                                    <div class="card w-100 mt-5">
                                        <div class="card-body p-5">
                                            <div class="mb-5">
                                                <h2 class="mb-0 fs-exact-18">
                                                    Image
                                                </h2>
                                            </div>
                                            <div class="p-4 d-flex justify-content-center">
                                                <div class="mt-4 mb-n2 ">
                                                    <!-- <img src="assets_admin/images/products/product-7-320x320.jpg"
                                                        class="w-100 h-auto" width="320" height="320" alt="" /> -->
                                                    <input type="file" name="anhsp" class="form-controller">
                                                </div>
                                            </div>

                                        </div>
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