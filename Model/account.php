<?php

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