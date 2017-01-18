<?php
if (isset($_POST['forgot_email'])){
	$forgot_email=$_POST['forgot_email'];
$db_forgot=mysqli_connect("localhost","root","","mydb");
$query_forgot="SELECT * FROM register WHERE email='$forgot_email'";
$result_forgot=mysqli_query($db_forgot,$query_forgot) or die(mysqli_error());
if(mysqli_num_rows($result_forgot)>0){
	$array=array("A","B","C","D","G","Z","F","k","L","F","V","n","D","q");
$rand=array_rand($array,4);
$pass=mt_rand(1242,3325);
$pass.=$array[$rand[0]];
$pass.=$array[$rand[1]];
$pass.=$array[$rand[2]];
$pass.=$array[$rand[3]];
	$query_update_forgot="UPDATE register SET password='md5($pass)' WHERE email='$forgot_email'";
	$result_update=mysqli_query($db_forgot,$query_update_forgot) or die(mysqli_error());
	$message="Hi, we have created a new password  ". $pass." for  you!\n";
$to= $forgot_email."";
    $from ="admin@ukr.net";
$subject="Forgoten password";
$headers = "From: $from\r\nReplay-To: $from\r\nContent-type: text/plain; charset=utf-8\r\n";
	mail($to, $subject, $message,$headers);
	echo "We have send to your email a new password";
	echo "<p><a href='index.php'>Go back</a></p>";
}else{
	die("There is no such email");
}
}
?>
<form  name="main" method="post" action="forgot.php" id="form">
Email: <br />
<input name="forgot_email" id="email" class="inputs" type="text" placeholder="Enter your mail"  /> <br />
<p><button type="submit" name="send" id="send">Submit</button></p>
</form>
