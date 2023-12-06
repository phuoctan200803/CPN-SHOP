<?php

// View và model liên quan dến user
//Giả bộ cách hoạt động theo MVC
//$data = user_login($_POST['email'], $_POST['password']);
include_once 'Model/pdo.php';
include_once 'Model/product.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'search':

            $productsPerPage = 9;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($currentPage - 1) * $productsPerPage;
            $_SESSION['keyword'] = ($_POST['keyword']);
            $data = get_products_with_keyword_and_limit($_SESSION['keyword'], $start, $productsPerPage);
            $totalProducts = count_products_with_keyword($_SESSION['keyword']);
            // echo $totalProducts;
            // return;
            $totalPages = ceil($totalProducts / $productsPerPage);


            $viewName = 'page_search';
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
            $viewName = '404';

            break;
    }
    include 'View/user_layout.php';
}
