<?php
include_once '../Model/pdo.php';
include_once '../Model/order.php';
if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'show':
            $status = 'chờ xác nhận';
            $listStatus = ['chờ xác nhận', 'đang giao', 'đã giao', 'hủy'];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['confirm'])) {
                    $data = getOrderDetail($_POST['confirm']);
                    $thongbao = ''; // Initialize the message variable outside the loop
                    foreach ($data as $item) {
                        $result = updateProductQuantity($item['masp'], $item['soluong']);
                        if ($result === false) {
                            $thongbao = "Thông tin không chính xác";
                            break; // Stop processing further if there's an error
                        } elseif ($result === 0) {
                            $thongbao = "Sản phẩm có số lượng ít hơn đơn hàng yêu cầu";
                            break; // Stop processing further if there's an issue with quantity
                        }
                    }

                    if (empty($thongbao)) {
                        // If $thongbao is still empty, all updates were successful
                        updateStatusOrder($_POST['confirm'], 'đang giao');
                    }
                } elseif (isset($_POST['cancel'])) {
                    updateStatusOrder($_POST['cancel'], 'hủy');
                } elseif (isset($_POST['subsuccess'])) {
                    updateStatusOrder($_POST['subsuccess'], 'đã giao');
                }
            }

            if (isset($_GET['status'])) {

                foreach ($listStatus as $key => $value) {

                    if ($key ==  $_GET['status']) {
                        $status = $value;
                    }
                }
            }
            $listOrder = getOrderStatus($status);
            // print_r($listOrder);
            // return;
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