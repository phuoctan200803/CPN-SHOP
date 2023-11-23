<section class="mt-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
                <div class="page-title m992 mt-4">
                    <h1 class="title-head margin-top-0 text-center"><a href="#">Thông tin tài khoản</a></h1>
                </div>
                <div id="parent" class="row">
                    <div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">
                        <div class="form-signup name-account m992">
                            <p><strong>Xin chào, <a href="/account/addresses" style="color:#f02b2b;">
                                        <?= $_SESSION['user']['hoten'] ?></a>&nbsp;!</strong></p>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                            <section class="bg-light">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 mb-4 mb-sm-5">
                                            <div class="card card-style1 border-0">
                                                <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                                            <img src="img/account/<?= $_SESSION['user']['anh'] ?>"
                                                                alt="" class="w-25 img-fluid mx-auto">
                                                        </div>

                                                        <div class="col-lg-6 px-xl-10">
                                                            <div
                                                                class="bg-top d-lg-inline-block p-4 mb-1-9 rounded mb-4">
                                                                <h3 class="h2 text-dart mb-0">
                                                                    <?= $_SESSION['user']['hoten'] ?></h3>
                                                                <!-- <span class="text-primary">Coach</span> -->
                                                            </div>
                                                            <ul class="list-unstyled mb-1-9">
                                                                <li class="mb-2 mb-xl-3 display-28"><span
                                                                        class="display-26 text-dark me-2 font-weight-600">Vai
                                                                        trò:</span>
                                                                    khách hàng</li>
                                                                <li class="mb-2 mb-xl-3 display-28"><span
                                                                        class="display-26 text-dark me-2 font-weight-600">Ngày
                                                                    </span>
                                                                    <?= $_SESSION['user']['ngaysinh'] ?></li>
                                                                <li class="mb-2 mb-xl-3 display-28"><span
                                                                        class="display-26 text-dark me-2 font-weight-600">Email:</span>
                                                                    <?= $_SESSION['user']['email'] ?></li>
                                                                <li class="mb-2 mb-xl-3 display-28"><span
                                                                        class="display-26 text-dark me-2 font-weight-600">Số
                                                                        điện thoại</span>
                                                                    <?= $_SESSION['user']['sodienthoai'] ?></li>
                                                                <!-- <li class="display-28"><span
                                                                        class="display-26 text-dark me-2 font-weight-600">Phone:</span>
                                                                    507 - 541 - 4567</li> -->
                                                            </ul>
                                                            <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                                                <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                                                <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                                                <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                                                <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
                        <div class="block-account">
                            <div class="block-content form-signup">
                                <p>Quản lý cá nhân <strong style="line-height: 20px;"> </strong></p>
                                <p><i class="fa fa-user"></i><a href="?mod=user&act=info" class="ml-2">Thông tin tài
                                        khoản
                                    </a> </p>
                                <p><i class="fa fa-clipboard-check"></i><a href="?mod=user&act=infoorder"
                                        class="ml-2">Thông
                                        tin
                                        đơn
                                        hàng </a></p>
                                <p><i class="fab fa-500px"></i><a href="?mod=user&act=change_pass" class="ml-2"> Đổi mật
                                        khẩu
                                    </a></p>
                                <p><i class="fab fa-500px"></i><a
                                        href="?mod=user&act=edit&id=<?php echo $_SESSION['user']['matk'] ?>"
                                        class="ml-2">Cập nhật
                                        tài khoản
                                    </a></p>
                                <p><i class="fa fa-code font-some" aria-hidden="true"></i> <a
                                        href="?mod=user&act=logout" class="ml-2"> Đăng
                                        xuất
                                    </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>