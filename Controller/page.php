<?php

include_once 'Model/product.php';
include_once 'Model/categories.php';
include_once 'Model/pdo.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'home':
            include_once 'Model/categories.php';
            $list_product = get_product_limit(0, 8);
            $listMostView = get_mostViewProduct(8);
            $list_categories = category_select_all();
            $viewName = 'page_home';
            break;
        case 'about':
            $viewName = 'page_about';
            break;
        case 'contact':
            $viewName = 'page_contact';
            break;
        case 'detail':
            include_once "Model/comment.php";

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            incrementViewCount($id);
            $item = getProductByID($id);
            if (isset($_SESSION['user']) and isset($_POST['sub_review'])) {
                $content = $_POST['content'];
                $matk = $_SESSION['user']['matk'];
                $masp = $_GET['id'];
                insertComment($matk, $masp, $content);
            }
            $countComment = countComment($id);
            $listComment = getCommentLimit($id, 0, 5);
            $listProductRandDom = get_productRandDom($item['madm']);

            $viewName = 'page_detail';
            break;
        case 'success':
            $viewName = 'page_success';
            break;
        case 'category':
            if (isset($_GET['cat_id'])) {
                $data = getProductByCatID($_GET['cat_id']);
            }
            $viewName = 'page_category';
            break;
        default:
            #404
            break;
    }
    include_once 'View/user_layout.php';
}