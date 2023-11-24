<?php
include_once '../Model/pdo.php';
include_once '../Model/order.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            $status = 'chờ xác nhận';
            $listStatus = ['chờ xác nhận', 'đang giao', 'đã giao', 'hủy'];
            if (isset($_GET['status'])) {
                foreach ($listStatus as $key => $value) {
                    if ($key ==  $_GET['status']) {
                        $status = $value;
                    }
                }
            }
            $listOrder = getOrderStatus($status);
            $viewName = 'page_order_home';


            // Xác nhận đơn hàng
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // $name = $_POST['submit'];
                // print_r($_POST);
                // echo $id;
                // return;
                $id = $_POST['id'];
                updateStatusOrder($id);
            }

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