<?php

include_once '../Model/pdo.php';
include_once '../Model/user.php';
include_once '../Model/product.php';
include_once '../Model/categories.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            $data['account'] = user_select_all();
            $viewName = 'page_home_account';

            break;
        case 'add':
            if (isset($_POST['sub_account'])) {
                $kq = user_insert(
                    $_POST['account_name'],
                    $_POST['gender'],
                    $_POST['account_mail'],
                    $_POST['account_pass'],
                    $_POST['account_phone'],
                    $_POST['account_birth'],
                    $_POST['quyen'],
                    $_FILES['anhsp']['name']
                );
                if ($_FILES['anhsp']['error'] == 0) {
                    save_file('anhsp', '../img/account/');
                    header("location:admin.php?mod=account&act=show");
                }
            }
            $viewName = 'page_add_account';

            break;
        case "edit":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data['account'] = user_select_by_id($_GET['id']);
                if (isset($_POST['sub_edit_account'])) {
                    $anhsp = $data['account']['anh'];

                    if ($_FILES['anhsp']['error'] == 0) {
                        $anhsp = $_FILES['anhsp']['name'];
                    }

                    $kq = user_update(
                        $id,
                        $_POST['account_name'],
                        $_POST['gender'],
                        $_POST['account_mail'],
                        $_POST['account_pass'],
                        $_POST['account_phone'],
                        $_POST['account_birth'],
                        $_POST['quyen'],
                        $anhsp
                    );
                    if ($_FILES['anhsp']['error'] == 0) {
                        save_file('anhsp', '../img/account/');
                    } else {
                        $thongbao = "Co loi xay ra";
                    }
                    header("location:admin.php?mod=account&act=show");
                }
            }
            $viewName = 'page_edit_account';
            break;
        case "delete":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                user_delete($id);
                header("location:admin.php?mod=account&act=show");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Kiểm tra nếu danh sách item[] được gửi trong biểu mẫu
                if (isset($_POST['item']) && is_array($_POST['item'])) {
                    $selectedItems = $_POST['item'];
                    user_delete($selectedItems);
                    header("location:admin.php?mod=account&act=show");
                }
            } else {
                header("location:admin.php?mod=account&act=show");
            }
            break;
        case "logout":
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            header("location:../index.php");
            break;
        default:
            #404
            break;
    }
    include_once "View/admin_layout.php";
}
