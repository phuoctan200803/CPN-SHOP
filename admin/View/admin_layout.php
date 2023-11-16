<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>CPN SHOP Admin - eCommerce Dashboard Template - Edited by CuongPN11</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="../template/assets_admin/images//favicon.png" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="../template/assets_admin/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="../template/assets_admin/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="../template/assets_admin/css/style.css" />
    <link rel="stylesheet" href="../template/assets_admin/css/includecss.css" />
</head>


<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="#">
                        <!-- logo -->
                        <div class="sa-sidebar-logo">
                            <span class="h5 mb-0 text-uppercase w-100"><img src="../img/product/logo2.png" alt="logo" class="w-25
                    "></span>

                        </div>

                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="admin.php" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-tachometer-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Tổng quan</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="admin.php?mod=product&act=show" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-box"></i>
                                        </span>
                                        <span class="sa-nav__title">Sản phẩm</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="admin.php?mod=categories&act=show" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Danh mục</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="admin.php?mod=account&act=show" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="sa-nav__title">Tài khoản</span>
                                    </a>
                                </li>
                                <!-- <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="app-orders-list.html" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        <span class="sa-nav__title">Order</span>
                                    </a>
                                </li> -->
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="admin.php?mod=comment&act=show" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fa fa-comment-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Bình luận</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="admin.php?mod=order&act=show" class="sa-nav__link">
                                        <span class="sa-nav__icon">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                        <span class="sa-nav__title">Đơn Hàng</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="sa-toolbar__item">
                        HỆ THỐNG QUẢN TRỊ
                    </div>
                    <div class="mx-auto"></div>

                    <div class="dropdown sa-toolbar__item">
                        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" data-bs-offset="0,1" aria-expanded="false">
                            <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded">
                                <img src="../img/account/image.jpg" width="64" height="64">
                            </span>
                            <span class="sa-toolbar-user__info">
                                <span class="sa-toolbar-user__title">
                                    <?php if (isset($_SESSION['user']['hoten'])) {
                                        echo $_SESSION['user']['hoten'];
                                    } ?>
                                </span>
                                <span class="sa-toolbar-user__subtitle">
                                    <?php if (isset($_SESSION['user']['email'])) {
                                        echo $_SESSION['user']['email'];
                                    } ?>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="?mod=account&act=logout">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>
            <!-- sa-app__toolbar / end -->

            <!-- sa-app__toolbar / end -->

            <!-- sa-app__body -->

            <?php include_once 'View/' . $viewName . '.php'; ?>
            <!-- sa-app__body / end -->



            <!-- sa-app__footer -->
            <!-- sa-app__footer / end -->

            <!-- sa-app__content / end -->
            <!-- sa-app__toasts -->
            <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
            <!-- sa-app__toasts / end -->
        </div>
        <!-- sa-app / end -->
        <!-- scripts -->
        <script src="../template/assets_admin/vendor/jquery/jquery.min.js"></script>
        <script src="../template/assets_admin/vendor/feather-icons/feather.min.js"></script>
        <script src="../template/assets_admin/vendor/simplebar/simplebar.min.js"></script>
        <script src="../template/assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../template/assets_admin/vendor/highlight.js/highlight.pack.js"></script>
        <script src="../template/assets_admin/vendor/quill/quill.min.js"></script>
        <script src="../template/assets_admin/vendor/air-datepicker/js/datepicker.min.js"></script>
        <script src="../template/assets_admin/vendor/air-datepicker/js/i18n/datepicker.en.js"></script>
        <script src="../template/assets_admin/vendor/select2/js/select2.min.js"></script>
        <script src="../template/assets_admin/vendor/fontawesome/js/all.min.js" data-auto-replace-svg="" async="">
        </script>
        <script src="../template/assets_admin/vendor/chart.js/chart.min.js"></script>
        <script src="../template/assets_admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../template/assets_admin/vendor/datatables/js/dataTables.bootstrap5.min.js"></script>
        <script src="../template/assets_admin/vendor/nouislider/nouislider.min.js"></script>
        <script src="../template/assets_admin/vendor/fullcalendar/main.min.js"></script>
        <script src="../template/assets_admin/js/stroyka.js"></script>
        <script src="../template/assets_admin/js/custom.js"></script>
        <script src="../template/assets_admin/js/calendar.js"></script>
        <script src="../template/assets_admin/js/demo.js"></script>
        <script src="../template/assets_admin/js/demo-chart-js.js"></script>
</body>
<!-- Mirrored from
    stroyka-admin.html.themeforest.scompiler.ru/variants/ltr/index.html by HTTrack
    Website Copier/3.x [XR&CO'2014], Thu, 13 Jul 2023 09:18:59 GMT -->

</html>