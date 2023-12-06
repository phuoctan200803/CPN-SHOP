<?php

include_once 'Model/product.php';
include_once 'Model/categories.php';
include_once 'Model/pdo.php';
include_once 'Model/cart.php';
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

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = key($_POST);
                $qty = current($_POST);
                add_cart($id, $qty);
            }
            $viewName = 'page_detail';
            break;
        case 'category':
            $productsPerPage = 9;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($currentPage - 1) * $productsPerPage;


            if (isset($_GET['cat_id'])) {
                $cat_id = $_GET['cat_id'];
                $data = getProductByCatID($_GET['cat_id'], $start, $productsPerPage);
                $totalProducts = CountProductByCatID($_GET['cat_id']);
                $totalPages = ceil($totalProducts / $productsPerPage);
            }

            $viewName = 'page_category';
            break;
        case 'info':

            $viewName = 'page_info';
            break;
        case 'success':
            if (isset($_SESSION['cart']['buy'])) {

                $dssp = $_SESSION['cart']['buy'];
            } else {
                $dssp = [];
            }
            unset($_SESSION['cart']);
            // $_SESSION['cart']['buy'] = [];

            $viewName = 'page_success';
            // session_destroy();
            break;
        default:
            $viewName = '404';
            break;
    }
    include_once 'View/user_layout.php';
}