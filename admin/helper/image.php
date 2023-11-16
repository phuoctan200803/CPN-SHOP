<?php
function save_file($fieldname, $target_dir)
{
    if (isset($_FILES)) {
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    }
    // return $file_name;
}