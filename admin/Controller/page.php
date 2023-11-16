<?php
include_once '../Model/pdo.php';
include_once '../Model/categories.php';
include_once '../Model/thong_ke.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'dashboard':
            if (!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')) {
                header("location:index.php");
            }
            $data['thong_ke'] = thong_ke_hang_hoa();
            $data['don_hang'] = thong_ke_don_hang();
            $data['dh_thang'] = thong_ke_don_hang_theo_thang();
            $viewName = 'page_dashboard';
            break;
        default:
            break;
    }
    include_once "View/admin_layout.php";
}
