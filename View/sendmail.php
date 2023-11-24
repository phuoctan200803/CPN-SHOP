<?php
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../Model/PHPMailer/src/Exception.php';
require_once __DIR__ . '/../Model/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../Model/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // gửi mail SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'votanphuoc666@gmail.com'; // SMTP username
    $mail->Password = 'nroe tzqu nmvy huqz'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->CharSet = "UTF-8";
    //Recipients
    $mail->setFrom('tanphuoc200803@gmail.com', 'Tấn Phước');
    $mail->addAddress($_POST['email'], 'Tp User'); // Add a recipient
    // $mail->addAddress('ellen@example.com'); // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    //  $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    // Attachments
    //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
    //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
    // Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = 'Mail xác nhận đơn hàng';

    $mail_body = '
<html>
<head>
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        h1 {
            color: #ff0000;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Xác nhận đơn hàng</h1>
    <p>Xin chào,</p>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi. Đơn hàng của bạn đã được tiếp nhận và đang được xử lý.</p>
    <p>Thông tin đơn hàng:</p>
    <ul>
        <li>Tên: ' . $_POST['name'] . '</li>
        <li>Email: ' . $_POST['email'] . '</li>
        <li>Điện thoại: ' . $_POST['mobile'] . '</li>
        <li>Địa chỉ: ' . $_POST['address'] . '</li>
    </ul>
    <p>Các sản phẩm đã mua:</p>
    <table>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>';

    foreach ($_SESSION['cart']['buy'] as $item) {
        $mail_body .= '
    <tr>
        <td>' . $item['tensp'] . '</td>
        <td>' . number_format($item['giakhuyenmai']) . ' đ</td>
        <td>' . $item['qty'] . '</td>
        <td>' . number_format($item['sub_total']) . ' đ</td>
    </tr>';
    }

    $mail_body .= '
    </table>
    <p>Ship:200.000 đ</p>
    <p>Tổng tiền: ' . number_format($_SESSION['cart']['info']['total'] + 200000) . ' đ</p>
    <p>Cảm ơn bạn đã mua hàng!</p>
</body>
</html>';
    $mail->Body = $mail_body;
    $mail->AltBody = '';
    $mail->send();
    echo 'Message has been sent';
    // session_destroy();
    header("location:index.php?mod=page&act=success");
    
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$mail->addReplyTo('votanphuoc666@gmail.com', 'Information');

ob_end_flush();