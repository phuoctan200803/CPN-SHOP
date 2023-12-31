<?php
function exist_param($param_name)
{
    return isset($_REQUEST[$param_name]);
}

function insertProduct($tensp, $gia, $giakhuyenmai, $motangan, $motachitiet, $madm, $anhsp, $soluong)
{
    $sql = "INSERT INTO sanpham(tensp, gia, giakhuyenmai, motangan, motachitiet, madm, anhsp, soluong) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $tensp, $gia, $giakhuyenmai, $motangan, $motachitiet, $madm, $anhsp, $soluong);
}

function updateProduct($masp, $tensp, $gia, $giakhuyenmai, $motangan, $motachitiet, $madm, $anhsp, $soluong)
{
    $sql = "UPDATE sanpham SET tensp=?, gia=?, giakhuyenmai=?, motangan=?, motachitiet=?, madm=?, anhsp=?, soluong=? WHERE masp=?";
    pdo_execute($sql, $tensp, $gia, $giakhuyenmai, $motangan, $motachitiet, $madm, $anhsp, $soluong, $masp);
}


function deleteProduct($masp)
{
    $sql = "UPDATE sanpham SET xoa=now() WHERE masp=?";
    if (is_array($masp)) {
        foreach ($masp as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $masp);
    }
}



function getProductByID($masp)
{
    $sql = "SELECT * FROM sanpham WHERE masp=?";
    return pdo_query_one($sql, $masp);
}

function isProductExist($masp)
{
    $sql = "SELECT count(*) FROM sanpham WHERE masp=?";
    return pdo_query_value($sql, $masp) > 0;
}

function incrementViewCount($masp)
{
    $sql = "UPDATE sanpham SET soluotxem = soluotxem + 1 WHERE masp=?";
    pdo_execute($sql, $masp);
}


function product_select_page()
{
    if (!isset($_SESSION['page'])) {
        $_SESSION['page'] = 0;
    }
    $table_name = 'sanpham'; // Tên bảng sản phẩm
    $primary_key = 'masp'; // Khóa chính của bảng sản phẩm
    $items_per_page = 10; // Số sản phẩm trên mỗi trang

    if (!isset($_SESSION['page_count'])) {
        // Đếm số lượng sản phẩm
        $row_count = (int)pdo_query_value("SELECT COUNT(*) FROM $table_name");
        $_SESSION['page_count'] = ceil($row_count / $items_per_page);
    }

    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }

    if ($_SESSION['page'] < 0) {
        $_SESSION['page'] = $_SESSION['page_count'] - 1;
    }

    if ($_SESSION['page'] >= $_SESSION['page_count']) {
        $_SESSION['page'] = 0;
    }

    // Sử dụng LIMIT để lấy các sản phẩm trên trang hiện tại
    $offset = $_SESSION['page'] * $items_per_page;
    $sql = "SELECT sp.*, dm.tendm FROM $table_name sp INNER JOIN danhmuc dm ON sp.madm = dm.madm ORDER BY $primary_key DESC LIMIT, $items_per_page";

    return pdo_query($sql);
}

function product_select_keyword($keyword)
{
    $sql = "SELECT * FROM sanpham sp "
        . " JOIN danhmuc dm ON dm.madm=sp.madm "
        . " WHERE tensp LIKE ? OR tendm LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function count_products()
{
    $sql = "SELECT count(*) AS soluong FROM sanpham";
    return pdo_query_one($sql);
}



function get_product_limit($st, $stp)
{
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp INNER JOIN danhmuc dm ON sp.madm = dm.madm WHERE sp.xoa IS NULL ORDER BY masp DESC LIMIT $st, $stp";
    return pdo_query($sql);
}


function getAllProduct()
{
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp INNER JOIN danhmuc dm ON sp.madm = dm.madm WHERE sp.xoa IS NULL";
    return pdo_query($sql);
}


function get_mostViewProduct($limit)
{
    $sql = "SELECT * from sanpham order by soluotxem desc limit $limit";
    return pdo_query($sql);
}

function get_productRandDom($madm)
{
    $sql = "SELECT * FROM sanpham where madm=? ORDER BY rand() limit 4";
    return pdo_query($sql, $madm);
}


function getProductByCatID($madm, $start, $page)
{
    $sql = "SELECT * FROM sanpham WHERE madm=? limit $start,$page";
    return pdo_query($sql, $madm);
}
function CountProductByCatID($madm)
{
    $sql = "SELECT COUNT(*) FROM sanpham WHERE madm=?";
    return pdo_query_value_one($sql, $madm);
}


function get_products_with_keyword_and_limit($keyword, $st, $stp)
{
    $sql = "SELECT sp.*, dm.tendm
            FROM sanpham sp 
            INNER JOIN danhmuc dm ON sp.madm = dm.madm 
            WHERE sp.tensp LIKE ? 
            ORDER BY sp.masp DESC 
            LIMIT $st, $stp";
    return pdo_query($sql, '%' . $keyword . '%');
}
function count_products_with_keyword($keyword)
{
    $countSql = "SELECT COUNT(*) as total FROM sanpham WHERE tensp LIKE ? OR madm IN (SELECT madm FROM danhmuc WHERE tendm LIKE ?)";
    return pdo_query_value_one($countSql, '%' . $keyword . '%', '%' . $keyword . '%');
}


function save_file($fieldname, $target_dir)
{
    if (isset($_FILES)) {
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    }
}

// function get_order($id)
// {
//     $sql = "SELECT dh.*, ctdh.*, sp.*
//             FROM donhang dh
//             INNER JOIN chitietdonhang ctdh ON dh.madh = ctdh.madh
//             INNER JOIN sanpham sp ON ctdh.masp = sp.masp
//             WHERE dh.matk = ?";
//     return pdo_execute_all($sql, [$id]);
// }

function get_order($id)
{
    $sql = "SELECT dh.*, ctdh.*
            FROM donhang dh
            INNER JOIN chitietdonhang ctdh ON dh.madh = ctdh.madh
            WHERE dh.matk = ?";
    return pdo_execute($sql, $id);
}

function get_one_order($id)
{
    $sql = "SELECT * FROM donhang WHERE matk =? order by madh desc";
    return pdo_query($sql, $id);
}

function get_order_detail($id)
{
    $sql = "SELECT ctdh.*, sp.tensp, sp.anhsp
    FROM chitietdonhang ctdh
    INNER JOIN sanpham sp ON ctdh.masp = sp.masp
    WHERE ctdh.madh = ?";
    return pdo_query($sql, $id);
}
