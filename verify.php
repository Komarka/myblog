<?php
$db_verify=mysqli_connect("localhost","root","","mydb") or die(mysqli_error());
$email=$_REQUEST['email'];
$verify_string=$_REQUEST['verify_string'];
$update="UPDATE register SET verified=1 WHERE email='$email' AND verify_string='$verify_string' AND verified=0";
$result=mysqli_query($db_verify,$update);
if(mysqli_affected_rows($db_verify)==1){
	echo "Thank you!Your account is verified";
}else{
	die("Sorry something went wrong");
}
?>
<p>To continue click<a href="main.php">here</a></p>
