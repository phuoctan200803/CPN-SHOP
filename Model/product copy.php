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
    $sql = "DELETE FROM sanpham WHERE masp=?";
    if (is_array($masp)) {
        foreach ($masp as $ma) {
            return pdo_execute($sql, $ma);
        }
    } else {
        return pdo_execute($sql, $masp);
    }
}

function getAllProducts()
{
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
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
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp INNER JOIN danhmuc dm ON sp.madm = dm.madm ORDER BY masp DESC LIMIT $st, $stp";
    return pdo_query($sql);
}

function get_categories()
{

    $sql = "select * from danhmuc";
    return pdo_query($sql);
}
