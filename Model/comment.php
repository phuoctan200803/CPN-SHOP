<?php

require_once 'pdo.php';

function comment_insert($ma_kh, $ma_sp, $noi_dung)
{
    $sql = "INSERT INTO binhluan(matk, masp, noidung) VALUES (?, ?, ?)";
    pdo_execute($sql, $ma_kh, $ma_sp, $noi_dung);
}

function comment_update($mabl, $ma_kh, $ma_sp, $noi_dung)
{
    $sql = "UPDATE binhluan SET matk=?, masp=?, noidung=? WHERE mabl=?";
    pdo_execute($sql, $ma_kh, $ma_sp, $noi_dung, $mabl);
}

function comment_delete($mabl)
{

    $sql = "DELETE FROM binhluan WHERE mabl=?";
    if (is_array($mabl)) {
        foreach ($mabl as $mabl_item) {
            pdo_execute($sql, $mabl_item);
        }
    } else {
        pdo_execute($sql, $mabl);
    }
}

function comment_select_all()
{
    $sql = "SELECT * FROM binhluan ORDER BY thoigianbinhluan DESC";
    return pdo_query($sql);
}

function comment_select_by_id($mabl)
{
    $sql = "SELECT * FROM binhluan WHERE mabl=?";
    return pdo_query_one($sql, $mabl);
}

function comment_exist($mabl)
{
    $sql = "SELECT count(*) FROM binhluan WHERE mabl=?";
    return pdo_query_value($sql, $mabl) > 0;
}
function comment_product()
{
    $sql = "SELECT sp.tensp, sp.masp, bl.mabl, COUNT(*) as so_luong,
            MAX(bl.thoigianbinhluan) as cu_nhat,
            MIN(bl.thoigianbinhluan) as moi_nhat
            FROM sanpham sp 
            JOIN binhluan bl ON sp.masp = bl.masp 
            GROUP BY sp.tensp, sp.masp
            HAVING so_luong > 0";
    return pdo_query($sql);
}

function comment_select_by_san_pham($ma_sp)
{
    $sql = "SELECT tk.hoten, bl.thoigianbinhluan, bl.noidung, tk.matk, bl.mabl
    from binhluan bl
    join taikhoan tk on bl.matk=tk.matk
    where masp=?
    ";
    return pdo_query($sql, $ma_sp);
}

function insertComment($matk, $masp, $content)
{
    $sql = " INSERT INTO binhluan (matk,masp,noidung) VALUES  (?,?,?)";
    return pdo_execute($sql, $matk, $masp, $content);
}


function countComment($masp)
{
    $sql = "SELECT count(*) AS soluong FROM binhluan WHERE masp = ?";
    return pdo_query_value($sql, $masp);
}

function getCommentLimit($masp, $st, $stp)
{
    $sql = "SELECT bl.*, tk.hoten, tk.anh FROM binhluan bl INNER JOIN taikhoan tk ON bl.matk = tk.matk WHERE bl.masp = ? ORDER BY thoigianbinhluan DESC LIMIT $st, $stp";
    return pdo_query($sql, $masp);
}
