<?php

include_once '../Model/pdo.php';
include_once '../Model/comment.php';
include_once '../Model/product.php';
// include_once '../Model/user.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            $dataComment = comment_product();
            $viewName = 'page_home_comment';
            break;
        case "detail":
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $detail_comment = comment_select_by_san_pham($_GET['id']);
                $product = getProductByID($id);
            }
            $viewName = 'page_detail_comment';
            break;
        case "delete":
            $id = $_GET['id'];
            if (isset($_GET['idbl'])) {
                $listID = array();
                $listID[] = $_GET['idbl'];
                comment_delete($listID);
                header("location:admin.php?mod=comment&act=detail&id=$id");
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['item']) && is_array($_POST['item'])) {
                    $selectedItems = $_POST['item'];
                    comment_delete($selectedItems);
                    header("location:admin.php?mod=comment&act=detail&id=$id");
                }
            } else {
                header("location:admin.php?mod=comment&act=detail&id=$id");
            }
            break;
        default:
            #404
            break;
    }
    include_once "View/admin_layout.php";
}