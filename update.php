<?php
if (isset($_POST['update'])){
	 $db_4=mysqli_connect("localhost","root","","mydb");
	 $textic=$_POST['update_text'];
	 $nicki=$_POST['update_nick'];
	 $id=$_POST['id'];
	 $sql_update2="UPDATE blog SET text='$textic',user_name='$nicki' WHERE id='$id'";
	 if(mysqli_query($db_4,$sql_update2)){
	header("Location:main.php");
	 }
	 else{
	 	die(mysqli_error());
	 }
}
?>
