<?php

// View và model liên quan dến user
//Giả bộ cách hoạt động theo MVC
//$data = user_login($_POST['email'], $_POST['password']);
include_once 'Model/pdo.php';
include_once 'Model/product.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'search':
            $records = 9;
            $soluong = count_products()['soluong'];
            $sotrang = ceil($soluong / $records);
            $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
            if (isset($_GET['page'])) {
                $data = get_products_with_keyword_and_limit($keyword, ($_GET['page'] - 1) * $records, $records);
            } else {
                $data = get_products_with_keyword_and_limit($keyword, 0, $records);
            }
            include 'View/template_head.php';
            include 'View/template_header.php';
            include 'View/page_category.php';
            include 'View/template_footer.php';
            $viewName = 'page_category';
            // $viewName = 'user_changePass';
            break;

        case 'filter':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $selectedPrices = array();

                if (isset($_POST['price-all'])) {
                } else {
                    if (isset($_POST['price-1'])) {
                        $selectedPrices[] = 0;
                    }
                    if (isset($_POST['price-2'])) {
                        $selectedPrices[] = 1;
                    }
                    if (isset($_POST['price-3'])) {
                        $selectedPrices[] = 2;
                    }
                    if (isset($_POST['price-4'])) {
                        $selectedPrices[] = 3;
                    }
                    if (isset($_POST['price-5'])) {
                        $selectedPrices[] = 4;
                    }
                }
            }
            break;
        default:
            break;
    }
}