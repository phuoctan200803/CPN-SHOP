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
    $sql = "SELECT COUNT(*) as tong_don_hang, AVG(tongtien) as trung_binh_don_hang, SUM(tongtien) as doanh_thu FROM donhang";
    return pdo_query($sql);
}


function thong_ke_don_hang_theo_thang()
{
    $thong_ke = array();

    $sql = "SELECT DISTINCT DATE_FORMAT(ngaydathang, '%m') as thang FROM donhang";
    $result = pdo_query($sql);
    foreach ($result as $item) {
        $thang = $item['thang'];
        $sql_count = "SELECT COUNT(*) as so_don_hang FROM donhang WHERE DATE_FORMAT(ngaydathang, '%m') = '$thang'";
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