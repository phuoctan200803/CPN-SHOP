<?php

include_once 'Model/pdo.php';
include_once 'Model/user.php';
include_once 'Model/product.php';
include_once 'Model/cart.php';
include_once 'Model/order.php';
if ($_GET['act']) {
    $error = array();
    switch ($_GET['act']) {
        case 'signup':
            if (isset($_POST['submit_signup'])) {
                if (empty($_POST['username'])) {
                    $error['username'] = "Không được để trống trường Username";
                    // } elseif (!is_username($_POST['username'])) {
                    //     $error['username'] = "Username cho phép sử dụng ký tự, chữ số, dấu chấm, dấu gạch dưới, từ 6 đến 32 ký tự";
                } else {
                    $username = $_POST['username'];
                }

                if (validatePassword($_POST['password']) == md5($_POST['password'])) {
                    $passTemp = $_POST['password'];
                    $password = md5($_POST['password']);
                } else {
                    $error['password'] = validatePassword($_POST['password']);
                }

                if (empty($_POST['email'])) {
                    $error['email'] = "Không được để trống trường email";
                } elseif (!is_email($_POST['email'])) {
                    $error['email'] = "Email không đúng định dạng";
                } else {
                    if (checkMail($_POST['email']) != null) {
                        $error['email'] = "Email đã được đăng ký.";
                    } else {
                        $email = $_POST['email'];
                    }
                }
                if ($_FILES['userImg']['error'] == 0) {
                    save_file('userImg', 'img/account/');
                }
                if (empty($error)) {
                    $kq = signUp($username, $_POST['birthday'], $email, $password);
                    header('location:?mod=user&act=login');
                }
            }
            $viewName = 'user_signup';
            break;
        case 'login':
            // echo "hihi";
            // return;
            if (isset($_POST['submit-login'])) {
                if (validateEmail($_POST['email']) == $_POST['email']) {
                    $email = $_POST['email'];
                } else {
                    $error['email'] = validateEmail($_POST['email']);
                }

                if (validatePassword($_POST['password']) == md5($_POST['password'])) {
                    $passTemp = $_POST['password'];
                    $password = md5($_POST['password']);
                } else {
                    $error['password'] = validatePassword($_POST['password']);
                }
                if (empty($error)) {
                    $kq = login($email, $password);
                }
                if ($kq) {
                    $_SESSION['user'] = $kq;
                    if ($kq['quyen'] == 'admin') {
                        header('location:admin/admin.php');
                    } else {
                        header('location:index.php');
                    }
                }
            }


            $viewName = 'user_login';
            break;
        case "logout":
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            header("location:index.php");
            break;
        case 'edit':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $data['account'] = account_select_by_id($_GET['id']);
                $_SESSION['user'] = $data['account'];
                if (isset($_POST['sub_edit_account'])) {

                    $anhsp = $data['account']['anh'];

                    if ($_FILES['userImg']['error'] == 0) {
                        $anhsp = $_FILES['userImg']['name'];
                    }
                    $kq = account_update(
                        $id,
                        $_POST['account_name'],
                        $_POST['gender'],
                        $_POST['account_mail'],
                        $_POST['account_phone'],
                        $_POST['account_birth'],
                        $anhsp
                    );
                    if ($_FILES['userImg']['error'] == 0) {
                        save_file('userImg', 'img/account/');
                    } else {
                        $thongbao = "Co loi xay ra";
                    }
                    unset($_SESSION['user']);
                    $data['account'] = account_select_by_id($_GET['id']);
                    $_SESSION['user'] = $data['account'];
                    $thongbao = 'Cập nhật thành công';
                }
            }

            $viewName = 'user_detail';
            break;
        case 'forgot':
            if (isset($_POST['submit_forgot'])) {
                if (empty($_POST['email'])) {
                    $error['email'] = "Không được để trống trường email";
                } elseif (!is_email($_POST['email'])) {
                    $error['email'] = "Email không đúng định dạng";
                } elseif (checkMail($_POST['email']) == null) {
                    $error['email'] = "Email không tồn tại";
                } else {

                    // Thỏa mãn tất cả các điều kiện
                    $email = $_POST['email'];
                    $pass = randomPassword();
                    update_password($email, md5($pass));
                    $subject = 'Thông tin mật khẩu mới'; // Chủ đề của email
                    $message = '<p>Dưới đây là thông tin mật khẩu mới của bạn:</p>';
                    $message .= '<h2>' . $pass . '</h2>';
                    $kq = sendEmail($email, $subject, $message);
                }
            }

            $viewName = 'user_forgot';
            break;
        case 'change_pass':
            $flag = 0;
            if (isset($_POST['submit_changePass'])) {
                if (validatePassword($_POST['new_password']) == md5($_POST['new_password'])) {
                    $newPass = $_POST['new_password']; # code...
                } else {
                    $error['new_password'] = validatePassword($_POST['new_password']);
                }
                if (validatePassword($_POST['confirm_password']) == md5($_POST['confirm_password'])) {
                    $confirmPass = $_POST['confirm_password']; # code...
                } else {
                    $error['confirm_password'] = validateEmail($_POST['confirm_password']);
                }
                if (empty($error) && confirm_password($newPass, $confirmPass)) {
                    $flag = 1;
                    updatePass($_SESSION['user']['email'], md5($newPass));
                } else {
                    $error['confirm_password'] = "Mật khẩu không trùng khớp";
                }
            }
            $viewName = 'user_changePass';
            break;
        case "info":
            // print_r($_SESSION['user']);
            $viewName = 'page_info';
            break;
        case "infoorder":
            if (isset($_SESSION['user'])) {
                $id = $_SESSION['user']['matk'];
                $dsdh = get_one_order($id);
                $viewName = 'page_infoorder';
            }

            break;
        case "orderDetail":
            $id = $_GET['idOrder'];
            // echo $id;
            $dsdh = get_order_detail($id);

            $viewName = 'page_orderDetail';
            break;
        case "deleteOrder":
            $id = $_GET['idOrder'];
            $thongbao = "";
            $kq = checkOrder($id);
            // print_r($kq);
            if ($kq) {
                updateStatusOrder($id, "hủy");
            } else {
                $thongbao = "Đơn đã được xác nhận không được xác nhận";
            }
            header("location:?mod=user&act=infoorder");
            break;

        default:
            break;
    }
    include 'View/user_layout.php';
}
