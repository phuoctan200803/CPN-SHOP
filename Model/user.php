<?php


// function save_file($fieldname, $target_dir)
// {
//     if (isset($_FILES)) {
//         $file_uploaded = $_FILES[$fieldname];
//         $file_name = basename($file_uploaded["name"]);
//         $target_path = $target_dir . $file_name;
//         move_uploaded_file($file_uploaded["tmp_name"], $target_path);
//     }
// }
function account_select_by_id($matk)
{
    $sql = "SELECT * FROM taikhoan WHERE matk=?";
    return pdo_query_one($sql, $matk);
}


function account_update($matk, $hoten, $gioitinh, $email,  $sodienthoai, $ngaysinh,  $anh)
{
    $sql = "UPDATE taikhoan SET hoten=?, gioitinh=?, email=?,sodienthoai=?, ngaysinh=?, anh=? WHERE matk=?";
    return pdo_execute($sql, $hoten, $gioitinh, $email,  $sodienthoai, $ngaysinh, $anh, $matk);
}

function login($email, $password)
{

    $sql = "SELECT * FROM taikhoan WHERE email='" . $email . "' AND matkhau='" . $password . "'";
    return pdo_query_one($sql);
}


function checkMail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email= ?";
    return pdo_query($sql, $email);
}


function signUp($name, $birthday, $emai, $password)
{

    $sql = "insert into taikhoan(`hoten`,`ngaysinh`,`email`,`matkhau`) value (?,?,?,?)";
    return pdo_execute($sql, $name, $birthday, $emai, $password);
}



function is_username($username)
{
    $pattern = "/^[\p{L}0-9_.\- ]{6,32}$/u";

    if (preg_match($pattern, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_password($password)
{
    $pattern = "/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@!#$%^&*()_+])[A-Za-z\d@!#$%^&*()_+]{6,32}$/";
    if (!preg_match($pattern, $password, $matchs)) {
        return false;
    } else {
        return true;
    }
}


function is_email($email)
{
    $pattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (preg_match($pattern, $email, $match)) {
        return true;
    } else {
        return false;
    }
}

function randomPassword()
{
    $pattern = "/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@!#$%^&*()_+])[A-Za-z\d@!#$%^&*()_+]{6}$/";

    do {
        $password = ''; // Khởi tạo mật khẩu trống
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@!#$%^&*()_+';
        for ($i = 0; $i < 6; $i++) {
            $password .= $characters[random_int(0, strlen($characters) - 1)];
        }
    } while (!preg_match($pattern, $password));

    return $password;
}

function update_password($email, $password)
{
    $sql = "UPDATE taikhoan SET matkhau = ? WHERE email = ?";
    return pdo_execute($sql, $password, $email);
}

ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($recipient, $subject, $message)
{
    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'votanphuoc666@gmail.com';
        $mail->Password = 'jsbemiiovokmtgwj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587; // TCP port to connect to
        $mail->CharSet = "UTF-8"; // Hoặc 465 nếu sử dụng SSL

        $mail->setFrom('tanphuoc200803@gmail.com', 'Tấn Phước'); // Thay thế bằng địa chỉ email của bạn và tên người gửi
        $mail->addAddress($recipient);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true;
        $mail->SMTPDebug = 0; // Trả về true nếu gửi thành công
    } catch (Exception $e) {
        return false; // Trả về false nếu có lỗi
    }
}
ob_end_flush();


function validatePassword($password)
{
    if (empty($password)) {
        return "Không được để trống trường Password";
    // } elseif (!is_password($password)) {
    //     return "Password sử dụng chữ cái, chữ số, và ký tự đặc biệt, bắt đầu ký tự viết hoa và có 6 đến 32 ký tự";
    } else {
        $hashedPassword = md5($password);
        return $hashedPassword;
    }
}

function confirm_password($password, $confirmPassword)
{
    return ($password == $confirmPassword); // Trả về null nếu mật khẩu xác nhận khớp với mật khẩu gốc
}


function validateEmail($email, $check = '')
{
    if (empty($email)) {
        return "Không được để trống trường email.";
    } elseif (!is_email($email)) {
        return "Email không đúng định dạng.";
    } elseif ($check != '' and checkMail($email) == null) {
        return "Email không tồn tại.";
    } else {
        return $email;
    }
}

function updatePass($email, $password)
{
    $sql = "UPDATE taikhoan SET matkhau=? WHERE email=?";
    return pdo_execute($sql, $password, $email);
}
function updateInfo($matk, $sdt, $diachi)
{
    $sql = "UPDATE taikhoan SET sodienthoai=? and diachi=? WHERE matk=?";
    return pdo_execute($sql, $sdt, $diachi, $matk);
}

function userInsertID($hoten, $email, $matkhau, $sodienthoai, $diachi)
{
    $sql = "INSERT INTO taikhoan (hoten, email, matkhau, sodienthoai, diachi, ngaydangky) VALUES (?, ?, ?, ?,  ?,now())";
    return pdo_execute_id($sql, $hoten, $email, $matkhau, $sodienthoai, $diachi);
}


function user_insert($hoten, $gioitinh, $email, $matkhau, $sodienthoai, $ngaysinh, $quyen, $anh)
{
    $sql = "INSERT INTO taikhoan (hoten, gioitinh, email, matkhau, sodienthoai, ngaysinh, quyen,ngaydangky, anh) VALUES (?, ?, ?, ?, ?, ?, ?,now(), ?)";
    pdo_execute($sql, $hoten, $gioitinh, $email, $matkhau, $sodienthoai, $ngaysinh, $quyen, $anh);
}

function user_update($matk, $hoten, $gioitinh, $email, $matkhau, $sodienthoai, $ngaysinh, $quyen, $anh)
{
    $sql = "UPDATE taikhoan SET hoten=?, gioitinh=?, email=?, matkhau=?, sodienthoai=?, ngaysinh=?, quyen=?, anh=? WHERE matk=?";
    pdo_execute($sql, $hoten, $gioitinh, $email, $matkhau, $sodienthoai, $ngaysinh, $quyen, $anh, $matk);
}

function user_delete($matk)
{
    $sql = "UPDATE taikhoan SET xoa=NOW() WHERE matk =?";
    if (is_array($matk)) {
        foreach ($matk as $matk_item) {
            pdo_execute($sql, $matk_item);
        }
    } else {
        pdo_execute($sql, $matk);
    }
}

function user_select_all()
{
    $sql = "SELECT * FROM taikhoan where xoa is null";
    return pdo_query($sql);
}

function user_select_by_id($matk)
{
    $sql = "SELECT * FROM taikhoan WHERE matk=? and xoa is null";
    return pdo_query_one($sql, $matk);
}

function user_exist($matk)
{
    $sql = "SELECT count(*) FROM taikhoan WHERE matk=?";
    return pdo_query_value($sql, $matk) > 0;
}

function user_select_by_email($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email=?";
    return pdo_query_one($sql, $email);
}

function user_activate($matk)
{
    $sql = "UPDATE taikhoan SET hoatdong=1 WHERE matk=?";
    pdo_execute($sql, $matk);
}

function user_deactivate($matk)
{
    $sql = "UPDATE taikhoan SET hoatdong=0 WHERE matk=?";
    pdo_execute($sql, $matk);
}