<?php
// function getAllOrder()
// {
//     $sql = "SELECT dh.*, tk.hoten FROM donhang dh INNER JOIN taikhoan tk on dh.matk=tk.matk ORDER BY dh.madh asc";
//     return pdo_query($sql);
// }
// function getOrderDetail($id)
// {
//     $sql = "SELECT dhct.*, dh.matk FROM chitietdonhang dhct INNER JOIN donhang dh on dhct.madh=dh.madh where dhct.madh=? desc dhct.madhchitiet";

//     return pdo_query($sql, $id);
// }
// function getValueProduct($id)
// {
//     $sql = "SELECT sp.anhsp, sp.tensp
//             FROM chitietdonhang ctdh
//             INNER JOIN sanpham sp ON ctdh.masp = sp.masp
//             WHERE sp.masp = ?";

//     return pdo_query($sql, $id);
// }
function getValueProduct($id)
{
    $sql = "SELECT anhsp, tensp From sanpham where masp=?";
    return pdo_query($sql, $id);
}


function getOrderDetail($id)
{
    $sql = "SELECT dhct.*, dh.matk, dh.tongtien 
            FROM chitietdonhang dhct 
            INNER JOIN donhang dh ON dhct.madh = dh.madh 
            WHERE dhct.madh = ?
            ORDER BY dhct.madhchitiet DESC";  // Sắp xếp `madhchitiet` theo thứ tự giảm dần

    return pdo_query($sql, $id);
}


function getAllOrder()
{
    $sql = "SELECT dh.*, tk.hoten 
            FROM donhang dh 
            INNER JOIN taikhoan tk ON dh.matk = tk.matk 
            ORDER BY dh.madh ASC";  // Sắp xếp theo trường `madh` tăng dần

    return pdo_query($sql);
}
function getOrderByID($id)
{
    $sql = "SELECT dh.*, tk.* 
            FROM donhang dh 
            INNER JOIN taikhoan tk ON dh.matk = tk.matk Where dh.madh=?
            ORDER BY dh.madh ASC";  // Sắp xếp theo trường `madh` tăng dần

    return pdo_query_one($sql, $id);
}

function getOrderStatus($status)
{
    $sql = "SELECT dh.*, tk.hoten 
            FROM donhang dh 
            INNER JOIN taikhoan tk ON dh.matk = tk.matk 
            Where dh.trangthai=?
            ORDER BY dh.madh ASC";  // Sắp xếp theo trường `madh` tăng dần

    return pdo_query($sql, $status);
}
function updateStatusOrder($id)
{
    $sql = "UPDATE donhang SET trangthai='đang giao' WHERE madh=? ";
    return pdo_execute($sql, $id);
}
