<?php
include_once "config.php";
session_start();
$page = isset($_GET['mod']) ? $_GET['mod'] : 'page';
$path = "./Controller/{$page}.php";

if (file_exists($path) & isset($_GET['act'])) {
    require "{$path}";
} else {
    header("location:?mod=page&act=home");
}