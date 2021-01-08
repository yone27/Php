<?php
function varialbe_input_text($textValue)
{
    if (!empty($textValue)) {
        $trim_text = trim($textValue);
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return "";
}

// profile image
function upload_profile($path, $file)
{
    $targetDir = $path;
    $default = "beard.png";

    // get the file
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($filename)) {
        // allow certain file format 
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowType)) {
            // upload file id the server
            if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                return $targetFilePath;
            }
        }
    }
    // return default image
    return $path . $default;
}

// get user info
function getUserInfo($con, $userId)
{
    $query = "SELECT firstname, lastname, email, profileimage FROM user WHERE userId = ?";

    $q = mysqli_stmt_init($con);
    mysqli_stmt_prepare($q, $query);
    mysqli_stmt_bind_param($q, 'i', $userId);
    mysqli_stmt_execute($q);
    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result);

    return empty($row) ? false : $row;
}
