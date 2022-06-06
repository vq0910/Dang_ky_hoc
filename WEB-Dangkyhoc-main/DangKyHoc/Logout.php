<?php 
include('../Db/dbhelper.php');
//xoá session theo tên
unset($_SESSION['user']);
// echo($_SESSION['user']);
// if(isset($_SESSION['user'])){
//     echo("hehe");
// }
// else{
//     echo("haha");
// }
//xoá tất cả các session
session_destroy();
header('location: Login.php');
?>