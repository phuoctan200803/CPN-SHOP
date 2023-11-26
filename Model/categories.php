<?php

require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */

function category_insert($category_name, $category_image = '', $category_order, $category_description)
{
    $sql = "INSERT INTO danhmuc (tendm, anh, thutu, mota) VALUES (?, ?, ?, ?)";
    pdo_execute($sql, $category_name, $category_image, $category_order, $category_description);
}


/**
 * Cập nhật tên loại
 * @param int $madm là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */

function category_update($category_id, $category_name, $category_image, $category_order = '', $category_description)
{
    $sql = "UPDATE danhmuc 
            SET tendm=?, anh=?, thutu=?, mota=?
            WHERE madm=?";
    pdo_execute($sql, $category_name, $category_image, $category_order,  $category_description, $category_id);
}

/**
 * Xóa một hoặc nhiều loại
 * @param mix $madm là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function categoryList_delete($madm)
{
    $sql = "UPDATE danhmuc SET xoa=now() WHERE madm=?";
    if (is_array($madm)) {
        foreach ($madm as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $madm);
    }
}
function category_delete($madm)
{
    // $sql = "DELETE FROM danhmuc WHERE madm=?";
    $sql = "UPDATE danhmuc SET xoa=Now() WHERE madm=?";
    return pdo_execute($sql, $madm);
}

/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function category_select_all()
{
    $sql = "SELECT * FROM danhmuc WHERE xoa IS NULL";
    return pdo_query($sql);
}

/**
 * Truy vấn một loại theo mã
 * @param int $madm là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function category_select_by_id($madm)
{
    $sql = "SELECT * FROM danhmuc WHERE madm=?";
    return pdo_query_one($sql, $madm);
}

/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $madm là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function category_exist($madm)
{
    $sql = "SELECT count(*) FROM danhmuc WHERE madm=?";
    return pdo_query_value($sql, $madm) > 0;
}

function countProduct()
{
    $sql = "UPDATE danhmuc AS d
            SET d.soluongsp = (
                SELECT SUM(soluong)
                FROM sanpham AS s
                WHERE s.madm = d.madm and s.xoa IS NULL
            )";
    return pdo_execute($sql);
}