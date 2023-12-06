<?php

function add_cart($id, $qty = 1)
{
    $item = getProductByID($id);
    $qty = (isset($qty) && is_numeric($qty) && $qty > 0) ? $qty : 1;
    if ($item && is_numeric($item['giakhuyenmai']) && $item['giakhuyenmai'] > 0) {
        // Kiểm tra và xử lý giá trị $qty để đảm bảo là số nguyên dương
        if (isset($_SESSION['cart']['buy']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + $qty;
            $_SESSION['cart']['buy'][$id]['qty'] = $qty;
            $_SESSION['cart']['buy'][$id]['sub_total'] = $_SESSION['cart']['buy'][$id]['qty'] * $item['giakhuyenmai'];
        } else {
            $_SESSION['cart']['buy'][$id] = [
                'masp' => $item['masp'],
                'tensp' => $item['tensp'],
                'giakhuyenmai' => $item['giakhuyenmai'],
                'anhsp' => $item['anhsp'],
                'qty' => $qty,
                'sub_total' => $qty * $item['giakhuyenmai']
            ];
        }
        update_info_cart();
    }
}

function update_info_cart()
{
    if (isset($_SESSION['cart'])) {
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order++;
            $total += $item['sub_total'];
        }
        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

function get_list_buy_cart()
{
    if (isset($_SESSION['cart']['buy'])) {
        foreach ($_SESSION['cart']['buy'] as $key => $item) {
            $id = $item['masp'];
            $_SESSION['cart']['buy'][$key]['url_delete_cart'] = "?mod=cart&act=delete&id=$id";
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}

function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}



function get_num_order_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['num_order'];
    }
    return false;
}



function delete_cart($id = "")
{
    if (isset($_SESSION['cart'])) {
        #Xoa san pham co id
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
        } else {
            unset($_SESSION['cart']);
        }
        update_info_cart();
    }
}



function update_cart($qty)
{
    foreach ($qty as $id => $new_qty) {
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['giakhuyenmai'];
    }
    update_info_cart();
}



// function them_dh($makh, $tongtien)
// {
//     global $conn;
//     $sql = "insert into donhang(`makh`,`tongtien`) value (:makh,:tongtien)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(":makh", $makh);
//     $stmt->bindParam(":tongtien", $tongtien);
//     return $stmt->execute();
// }


function addOrder($matk, $tongtien, $diachi)
{
    $sql2 = "INSERT INTO donhang (matk, tongtien,diachi) VALUES (?,?,?)";
    return pdo_execute($sql2, $matk, $tongtien, $diachi);
}


function addOrderDetail($masp, $soluong, $giasp, $tongtien)
{
    $sql = 'SELECT madh FROM donhang ORDER BY madh DESC LIMIT 1';
    $madh = pdo_query_value($sql);

    $sql1 = "INSERT INTO chitietdonhang (madh, masp, soluong, giasp, tongtiensp) VALUES (?, ?, ?, ?, ?)";
    return pdo_execute($sql1, $madh, $masp, $soluong, $giasp, $tongtien);
}



// ob_start();

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// function sendEmail($recipient, $subject, $message)
// {
//     $mail = new PHPMailer(true);

//     try {
//         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'votanphuoc666@gmail.com';
//         $mail->Password = 'jsbemiiovokmtgwj';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
//         $mail->Port = 587; // TCP port to connect to
//         $mail->CharSet = "UTF-8"; // Hoặc 465 nếu sử dụng SSL

//         $mail->setFrom('tanphuoc200803@gmail.com', 'Tấn Phước'); // Thay thế bằng địa chỉ email của bạn và tên người gửi
//         $mail->addAddress($recipient);
//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body = $message;

//         $mail->send();
//         return true;
//         $mail->SMTPDebug = 0; // Trả về true nếu gửi thành công
//     } catch (Exception $e) {
//         return false; // Trả về false nếu có lỗi
//     }
// }
// ob_end_flush();
function checkOrder($id)
{
    $sql = "SELECT * FROM donhang where madh=? AND trangthai='chờ xác nhận'";
    return pdo_query($sql, $id);
}

function deleteOrder($id)
{
    $sql = "DELETE FROM donhang where madh=? ";
    return pdo_execute($sql, $id);
}
