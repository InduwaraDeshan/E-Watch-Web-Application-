<?php

require "connection.php";

$user = $_GET["id"];

$user_rs = Database::search("SELECT *FROM `user` WHERE `id` ='".$user."'");
$user_num =$user_rs->num_rows;

if($user_num == 1){

$user_data =  $user_rs->fetch_assoc();
$status_id=$user_data["status_id"];

if($status_id==1){
Database::iud("UPDATE `user` SET `status_id`='2' WHERE `id` ='".$user."'");

echo "deactivated";

}else if($status_id==2){
    Database::iud("UPDATE `user`  SET `status_id`='1' WHERE `id` ='".$user."'");
    
    echo "activated";
}
}else{
    echo "Something Went Wrong . Please try again later";
}


?>