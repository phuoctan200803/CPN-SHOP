<?php
include_once 'Model/categories.php';
$list_Cate = category_select_all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="template/assets_user/img/favicon.png" rel="icon">
    <link href="template/favicon" rel="icon">
    <link rel="shortcut icon" href="template/favicon/favicon.ico" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Thư viện noUiSlider CSS -->
    <link rel="stylesheet" href="https://unpkg.com/nouislider/distribute/nouislider.min.css">

    <!-- Thư viện noUiSlider JS -->
    <script src="https://unpkg.com/nouislider"></script>


    <!-- Libraries Stylesheet -->
    <link href="template/assets_user/lib/animate/animate.min.css" rel="stylesheet">
    <link href="template/assets_user/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="template/assets_user/css/style.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet
    <link href="css/style.css" rel="stylesheet"> -->
</head>
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="">About</a>
                <a class="text-body mr-3" href="">Contact</a>
                <a class="text-body mr-3" href="">Help</a>
                <a class="text-body mr-3" href="">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><?= (isset($_SESSION['user']['hoten'])) ? $_SESSION['user']['hoten'] : "My account" ?></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if (!isset($_SESSION['user'])) { ?>
                            <a href="?mod=user&act=login" class="dropdown-item">Log in</a>
                            <a href="?mod=user&act=signup" class="dropdown-item">Sign up</a>
                        <?php }
                        ?>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <a href="?mod=user&act=logout" class="dropdown-item">Log out</a>
                            <a href="?mod=user&act=change_pass" class="dropdown-item">Change Password</a>
                            <?php if ($_SESSION['user']['quyen'] == 'admin') { ?>
                                <a href="admin/admin.php" class="dropdown-item">Trang quản trị</a><?php } ?>
                            <a href="?mod=user&act=edit&id=<?php echo $_SESSION['user']['matk'] ?>" class="dropdown-item">Cập nhật tài khoản</a>
                            <a href="?mod=user&act=info" class="dropdown-item">Thông tin tài khoản</a>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-top py-1 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="index.php" class="text-decoration-none">
                <!-- <span class="h1 text-uppercase text-primary bg-dark px-2">CPN</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span> -->
                <img src="img/product/logo.svg" alt="logo" class="w-25
                ">
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">

            <form action="?mod=product&act=search" method="POST">
                <div class="input-group">
                    <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" class="input-group-text bg-transparent" style="width: max-content;">
                    <input type="submit" value="Tìm Kiếm" class="input-group-text bg-transparent text-primary" style="width: max-content;">
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Chăm sóc khách hàng</p>
            <h5 class="m-0">+84 395 116 155</h5>
        </div>
    </div>
</div>

<!-- Topbar End -->



<!-- Navbar Start -->
<div class="container-fluid bg-main">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                <h6 class="text-white m-0"><i class="fa fa-bars mr-2"></i>Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <div class="nav-item dropdown drop-right">
                        <?php foreach ($list_Cate as $dm) : ?>
                            <a href="index.php?mod=page&act=category&cat_id=<?= $dm['madm'] ?>" class=" nav-item nav-link">
                                <?= $dm['tendm'] ?></a>
                        <?php endforeach; ?>

                        <a href="index.php?mod=page&act=category" class="nav-item nav-link">Danh mục</a>

                    </div>

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-dark py-1 py-lg-0 px-0 bg-main">
                <!-- <a href="index.html" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">CPN</span>
                    <span class="h1 text-uppercase bg-primary px-2 ml-n1">Shop</span>
                </a> -->
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between text-white" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0 text-white">
                        <a href="index.php" class="nav-item nav-link text-white">Trang chủ</a>
                        <a href="?mod=page&act=about" class="nav-item nav-link">Giới thiệu</a>

                        <a href="?mod=page&act=contact" class="nav-item nav-link">Liên hệ</a>
                    </div>
                    <div class="navbar-nav py-0 d-none d-lg-block">
                        <a href="" class="btn px-0">
                            <i class="fas fa-heart text-white"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                        </a>
                        <a href="?mod=cart&act=show" class="btn px-0 ml-3">

                            <i class="fas fa-shopping-cart text-white"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php if (!empty($_SESSION['cart'])) {
                                                                                                                                        echo $_SESSION['cart']['info']['num_order'];
                                                                                                                                    } ?></span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->


<!-- content -->
<?php include_once 'View/' . $viewName . '.php'; ?>
<!-- content end -->




<!-- Footer Start -->
<div class="container-fluid text-secondary mt-5 pt-5 bg-dark  overlay-container ">
    <div class="content_footer">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Địa chỉ</h5>
                <p class="mb-4"></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, HCM, VietNam</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+84 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Về chúng tôi</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop
                                Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Tài khoản</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Quản lý đơn
                                hàng</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Thông tin cá
                                nhân</a>

                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Phản hồi</h5>
                        <p>Chúng tôi mong chừ phản hồi từ bạn</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Theo dõi chúng tôi</h6>
                        <div class="d-flex">
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="template/assets_user/img/payments.png" alt="">
            </div>
        </div>
    </div>


</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="template/assets_user/lib/easing/easing.min.js"></script>
<script src="template/assets_user/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="template/assets_user/mail/jqBootstrapValidation.min.js"></script>
<script src="template/assets_user/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="template/assets_user/js/main.js"></script>
</body>

</html>