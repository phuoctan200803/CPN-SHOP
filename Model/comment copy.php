<?php
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