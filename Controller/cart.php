<?php

// include_once 'Model/connect.php';
include_once 'Model/pdo.php';
include_once 'Model/product.php';
include_once 'Model/cart.php';
include_once 'Model/user.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            if (isset($_SESSION['cart'])) {
                $list_buy = get_list_buy_cart();
            }
            $viewName = 'page_cart';
            break;
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
            }
            add_cart($id);
            $page = $_GET['page'];
            if (!($page == 'detail')) {
                header("location:?mod=page&act=home");
            } else {
                header("location:?mod=page&act=detail&id={$id}");
            }
            break;
        case 'delete':
            $id = '';
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
            }
            delete_cart($id);
            header("location:?mod=cart&act=show");
            break;
        case 'update':
            if (isset($_POST['btn_update_cart'])) {
                update_cart($_POST['qty']);
                print_r($_POST['qty']);
                header("location:index.php?mod=cart&act=show");
            }
            break;
        case 'checkout':
            if (isset($_SESSION['user'])) {
                $name = $_SESSION['user']['hoten'];
                $email = $_SESSION['user']['email'];
            }
            if (isset($_SESSION['cart'])) {
                $viewName = 'page_checkout';
            } else {
                header("location:?mod=page&act=home");
            }

            break;
        case 'sendmail':
            if (isset($_POST['btn_place_order'])) {
                if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['mobile']) || empty($_POST['address'])) {
                    $thongbao = "Vui lòng điền đủ thông tin";
                } else {
                    $tongtien = $_SESSION['cart']['info']['total'];
                    if (!isset($_SESSION['user'])) {
                        $hoten = $_POST['name'];
                        $email = $_POST['email'];
                        $sdt = $_POST['mobile'];
                        $diaChi = $_POST['address'];
                        $matKhau = md5('Tanphuoc!2008');
                        $matk = userInsertID($hoten, $email, $matKhau, $sdt, $diaChi);
                    } else {
                        $matk = $_SESSION['user']['matk'];
                        $hoten = $_SESSION['user']['hoten'];
                        $sdt = $_POST['mobile'];
                        $diaChi = $_POST['address'];
                        updateInfo($matk, $sdt, $diaChi);
                    }
                    addOrder($matk, $tongtien, $diaChi);
                    foreach ($_SESSION['cart']['buy'] as $key => $item) {
                        addOrderDetail($key, $item['qty'], $item['giakhuyenmai'], $item['sub_total']);
                    }
                }
            }
            include_once "View/sendmail.php";

            break;
        case 'success':
            $viewName = "page_success";
            break;
        default:
            break;
    }
    include_once 'View/user_layout.php';
}
