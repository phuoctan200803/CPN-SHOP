<?php
// function get_categories()
// {
//     global $conn;
//     $sql = "select * from danhmuc";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     return $stmt->fetchAll();
// }
// function get_category($id)
// {
//     global $conn;
//     $sql = "select * from danhmuc Where madm = :id";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
//     $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     return $stmt->fetch();
// }


// function delete_categories($listId)
// {
//     global $conn;
//     foreach ($listId as $value) {
//         $stmt = $conn->prepare("DELETE FROM danhmuc WHERE madm = :id");
//         $stmt->bindParam(':id', $value);
//         $stmt->execute(); // Thực hiện câu lệnh DELETE ở đây
//     }
//     return true; // Trả về true nếu tất cả câu lệnh DELETE thành công
// }

// function add_category($category_name, $category_image, $category_order, $category_quantity, $category_description,)
// {
//     global $conn;
//     $sql = "INSERT INTO danhmuc (tendm,  anh, thutu, soluongsp, mota) VALUES (:tendm, :anh,   :thutu, :soluongsp, :mota)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(":anh", $category_image);
//     $stmt->bindParam(":tendm", $category_name);
//     $stmt->bindParam(":thutu", $category_order);
//     $stmt->bindParam(":soluongsp", $category_quantity);
//     $stmt->bindParam(":mota", $category_description);

//     return $stmt->execute();
// }

// function edit_category($category_id, $category_name, $category_image, $category_order, $category_quantity, $category_description)
// {
//     global $conn;

//     $sql = "UPDATE danhmuc 
//             SET tendm = :tendm, anh = :anh, thutu = :thutu, soluongsp = :soluongsp, mota = :mota
//             WHERE madm = :category_id";

//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(":tendm", $category_name);
//     $stmt->bindParam(":anh", $category_image);
//     $stmt->bindParam(":thutu", $category_order);
//     $stmt->bindParam(":soluongsp", $category_quantity);
//     $stmt->bindParam(":mota", $category_description);
//     $stmt->bindParam(":category_id", $category_id);

//     return $stmt->execute();
// }



// pdo
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_loai là tên loại
 * @throws PDOException lỗi thêm mới
 */

function category_insert($category_name, $category_image, $category_order, $category_quantity, $category_description)
{
    $sql = "INSERT INTO danhmuc (tendm, anh, thutu, soluongsp, mota) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $category_name, $category_image, $category_order, $category_quantity, $category_description);
}


/**
 * Cập nhật tên loại
 * @param int $madm là mã loại cần cập nhật
 * @param String $ten_loai là tên loại mới
 * @throws PDOException lỗi cập nhật
 */

function category_update($category_id, $category_name, $category_image = '', $category_order = '', $category_quantity, $category_description)
{
    $sql = "UPDATE danhmuc 
            SET tendm=?, anh=?, thutu=?, soluongsp=?, mota=?
            WHERE madm=?";
    pdo_execute($sql, $category_name, $category_image, $category_order, $category_quantity, $category_description, $category_id);
}

/**
 * Xóa một hoặc nhiều loại
 * @param mix $madm là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function categoryList_delete($madm)
{
    $sql = "DELETE FROM danhmuc WHERE madm=?";
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
    $sql = "DELETE FROM danhmuc WHERE madm=?";
    return pdo_execute($sql, $madm);
}

/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function category_select_all()
{
    $sql = "SELECT * FROM danhmuc";
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
