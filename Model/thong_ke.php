<?php
function thong_ke_hang_hoa()
{
    $sql = "SELECT dm.madm, dm.tendm,"
        . " COUNT(*) so_luong,"
        . " MIN(sp.gia) gia_min,"
        . " MAX(sp.gia) gia_max,"
        . " AVG(sp.gia) gia_avg"
        . " FROM sanpham sp "
        . " JOIN danhmuc dm ON dm.madm=sp.madm "
        . " GROUP BY dm.madm, dm.tendm";
    return pdo_query($sql);
}


function thong_ke_don_hang()
{
    $sql = "SELECT COUNT(*) as tong_don_hang, AVG(tongtien) as trung_binh_don_hang, SUM(tongtien) as doanh_thu FROM donhang where trangthai='đã giao'";
    return pdo_query($sql);
}


function thong_ke_don_hang_theo_thang()
{
    $thong_ke = array();

    $sql = "SELECT DISTINCT DATE_FORMAT(ngaydathang, '%m') as thang FROM donhang";
    $result = pdo_query($sql);
    foreach ($result as $item) {
        $thang = $item['thang'];
        $sql_count = "SELECT COUNT(*) as so_don_hang FROM donhang WHERE DATE_FORMAT(ngaydathang, '%m') = '$thang' and trangthai='đã giao'";
        $result_count = pdo_query($sql_count);

        if ($result_count) {
            $so_don_hang = $result_count[0]['so_don_hang'];
        } else {
            $so_don_hang = 0;
        }

        // Lưu kết quả vào mảng thống kê
        $thong_ke[$thang] = $so_don_hang;
    }
    // return $result_count;
    return $thong_ke;
}


function countAllComment()
{
    $sql = "SELECT count(*) AS soluong FROM binhluan";
    return pdo_query_value($sql);
}

function getRecentOrders($limit)
{
    $sql = "SELECT donhang.*, taikhoan.hoten AS tenkhachhang
    FROM donhang
    JOIN taikhoan ON donhang.matk = taikhoan.matk
    ORDER BY donhang.ngaydathang DESC
    LIMIT ? ";
    return pdo_query($sql, $limit);
}


function getRecentOrder($limit)
{
    $sql = "SELECT dh.*, tk.hoten 
            FROM donhang dh 
            INNER JOIN taikhoan tk ON dh.matk = tk.matk 
            ORDER BY dh.ngaydathang desc limit $limit";  // Sắp xếp theo trường `madh` tăng dần

    return pdo_query($sql);
}

// function getRecentOrders($limit)
// {
//     $sql = "SELECT donhang.*, taikhoan.hoten AS tenkhachhang
//             FROM donhang
//             JOIN taikhoan ON donhang.matk = taikhoan.matk
//             ORDER BY donhang.ngaydathang DESC
//             LIMIT :limit";
//     return pdo_query($sql, [':limit' => $limit]);
// }