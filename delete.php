<?php
include_once('main.php');
if(isset($_GET['place'])){
    $db_2=mysqli_connect("localhost","root","","mydb");
    $del_id=$_GET['place'];
    $sql_delete="DELETE FROM blog WHERE id = '$del_id'";
    $result_del=mysqli_query($db_2,$sql_delete) or die (mysqli_error());
}
?>
