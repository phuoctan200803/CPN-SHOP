<?php
include_once '../Model/pdo.php';
include_once '../Model/order.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            $listOrder = getAllOrder();
            $viewName = 'page_order_home';
            break;
        case 'detail':
            if ($_GET['id']) {
                $id = $_GET['id'];
            }
            $detailOrder = getOrderDetail($id);
            $inforOrder = getOrderByID($id);

            $viewName = 'page_order_detail';
            break;
        default:
            break;
    }
    include_once "View/admin_layout.php";
}
