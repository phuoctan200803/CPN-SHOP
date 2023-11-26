<?php

include_once '../Model/pdo.php';
include_once '../Model/categories.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            countProduct();
            $dsdm = category_select_all();
            $viewName = 'page_admin_categories';
            break;
        case "delete":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                category_delete($id);
                header("location:admin.php?mod=categories&act=show");
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if (isset($_POST['item']) && is_array($_POST['item'])) {
                    $selectedItems = $_POST['item'];
                    categoryList_delete($selectedItems);
                    header("location:admin.php?mod=categories&act=show");
                }
            } else {
                header("location:admin.php?mod=categories&act=show");
            }
            break;
        case 'add':
            include_once 'helper/image.php';
            if (isset($_POST['sub_categories'])) {
                $kq = category_insert(
                    $_POST['category_name'],
                    $_FILES['anh']['name'],
                    $_POST['status'],
                    $_POST['category_description']
                );
                if ($_FILES['anh']['error'] == 0) {
                    save_file('anh', '../img/categories/');
                    header("location:admin.php?mod=categories&act=show");
                }
            }
            $viewName = 'page_add_categories';

            break;
        case "edit":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $dm = category_select_by_id($_GET['id']);
                if (isset($_POST['sub_edit_categories'])) {
                    if ($_FILES['anh']['error'] == 0) {
                        $anh = $_FILES['anh']['name'];
                        save_file('anh', '../img/categories/');
                    } else {
                        $anh = $dm['anh'];
                    }
                    $kq = category_update(
                        $id,
                        $_POST['category_name'],
                        $anh,
                        $_POST['status'],
                        $_POST['category_description'],
                    );
                    header("location:admin.php?mod=categories&act=show");
                }
            }
            $viewName = 'page_edit_categories';
            break;
        default:
            #404
            break;
    }
    include_once "View/admin_layout.php";
}