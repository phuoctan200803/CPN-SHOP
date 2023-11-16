<?php

// include_once 'Model/connect.php';
include_once '../Model/pdo.php';
include_once '../Model/categories.php';
include_once '../Model/product.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            if (isset($_GET['keyrword'])) {
                $data = product_select_keyword($_POST['keyrword']);
            }
            if (!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')) {
                header('location:index.php');
            }
            $records = 15;
            $soluong = count_products()['soluong'];
            $sotrang = ceil($soluong / $records);
            if (isset($_GET['page'])) {
                $data = get_product_limit(($_GET['page'] - 1) * $records, $records);
            } else {
                $data = get_product_limit(0, $records);
            }
            $viewName = 'product_admin';
            break;
        case 'add':
            if (!(isset($_SESSION['user']) && $_SESSION['user']['quyen'] == 'admin')) {
                header('location:index.php');
            }

            if (isset($_POST['submit'])) {
                $kq = insertProduct(
                    $_POST['tensp'],
                    $_POST['gia'],
                    $_POST['giakhuyenmai'],
                    $_POST['motangan'],
                    $_POST['motachitiet'],
                    $_POST['madm'],
                    $_FILES['anhsp']['name'],
                    $_POST['soluong']
                );
                if ($_FILES['anhsp']['error'] == 0) {
                    save_file('anhsp', '../img/product/');
                    header("location:admin.php?mod=product&act=show");
                }
            }
            $dsdm = category_select_all();
            $viewName = 'product_add';

            break;
        case "delete":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kq = deleteProduct($id);
                if ($kq) {
                    header("location:admin.php?mod=product&act=show");
                } else {
                    $thongbao = "Co loi xay ra vui long kiem tra lai.";
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['item']) && is_array($_POST['item'])) {
                    $listId = $_POST['item'];
                    deleteProduct($listId);
                    header("location:admin.php?mod=product&act=show");
                }
            } else {
                header("location:admin.php?mod=product&act=show");
            }

            break;
        case "edit":
            if (isset($_GET['id'])) {
                $data['sp'] = getProductByID($_GET['id']);
            }
            if (isset($_POST['submit'])) {
                $anhsp = $_FILES['anhsp']['name'];
                if ($_FILES['anhsp']['error'] != 0) {
                    $anhsp = $data['sp']['anhsp'];
                }

                $kq = updateProduct(
                    $_GET['id'],
                    $_POST['tensp'],
                    $_POST['gia'],
                    $_POST['giakhuyenmai'],
                    $_POST['motangan'],
                    $_POST['motachitiet'],
                    $_POST['madm'],
                    $anhsp,
                    $_POST['soluong'],
                );
                if ($_FILES['anhsp']['error'] == 0) {
                    move_uploaded_file($_FILES['anhsp']['tmp_name'], "../img/product/" . $anhsp);
                } else {
                    $thongbao = "Co loi xay ra";
                }
                header("location:admin.php?mod=product&act=show");
            }
            $dsdm = category_select_all();
            $viewName = 'product_edit';
            break;
        default:
            #404-Trang web khong ton tai
            break;
    }
    include_once "View/admin_layout.php";
}