<?php

function is_logged_in(): bool{
    session_start();
    $user_id = $_SESSION["user_id"];
    if (!isset($user_id)){
        return false;
    }
    return true;
}

function login_only($redirection){
    if (!is_logged_in()){
        header("Location: /login.php?redirect=$redirection");
    }
}

function mark_convertor($state){
    $mark = "&#x2717;";
    if ($state == true){
        $mark = "&#x2713;";
    }
    return $mark;
}

function retrieve_current_user($mysqli_conn){
    // retrieve user from db
    $userID = $_SESSION["user_id"];
    $sql_stmt = "select * from User where id=$userID;";
    $result = $mysqli_conn->query($sql_stmt);
    if ($result->num_rows > 0){
        $result->data_seek(0);
        $row = $result->fetch_assoc();
        return $row;
    }
    return null;
}

function retrieve_apartment_by_id($mysqli_conn, $id){
    // retrieve apartment from db
    $sql_stmt = "select * from Apartment where id=$id;";
    $result = $mysqli_conn->query($sql_stmt);
    if ($result->num_rows > 0){
        $result->data_seek(0);
        $row = $result->fetch_assoc();
        return $row;
    }
    return null;
}

function checkIsArrayOfImages($tmp_names){
    $len = count($tmp_names);
    $check = True;
    for ($i = 0; $i < $len; $i++) {
        if (!empty($tmp_names[$i])){
            if (!getimagesize($tmp_names[$i])){
                $CHECK = false;
            }
        }
    }
    return $check;
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}


function config_apartment_image_names_db($names){
    $len_names = count($names);
    $names_string = '';
    $names_string = $names_string . $names[0];
    for ($i = 1 ; $i < $len_names; $i++){
        $names_string = $names_string . ',' . $names[$i];
    }
    return $names_string;
}
function extract_apartment_images($names_str, $target_dir){
    $names_arr = explode(',', $names_str);
    $len_names = count($names_arr);
    for($i = 0; $i < $len_names; $i++){
        $names_arr[$i] = "http://localhost:5003/" . $target_dir . $names_arr[$i];
    }
    return $names_arr;
}

function handle_apartment_images($image_arr, $target_dir, $mysqli_conn){
    if(checkIsArrayOfImages($image_arr['tmp_name']));
    {
        $len = count($image_arr['tmp_name']);
        $new_names = [];
        for ($i = 0; $i < $len; $i++) {
            if (!empty($image_arr["tmp_name"][$i])){
                $tmp_file = $image_arr["tmp_name"][$i];
                $new_image_name = generateRandomString();
                $file_ext = strtolower(end(explode('.',$image_arr['name'][$i])));
                $newFilePath = $target_dir . $new_image_name . '.' . $file_ext;
                array_push($new_names, $new_image_name . '.' . $file_ext);
                move_uploaded_file($tmp_file, $newFilePath);
            }
        }
        $configured_name = config_apartment_image_names_db($new_names);
        return $configured_name;
    }
    
}

function retrieve_hotels($mysqli_conn){
    // retrieve hotels from db
    $userID = $_SESSION["user_id"];
    $sql_stmt = "select * from Apartment;";
    $result = $mysqli_conn->query($sql_stmt);
    if ($result->num_rows > 0){
        return $result;

    }
    return null;
}

function get_url($page){
    return "http://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"]. $page;
}

?>