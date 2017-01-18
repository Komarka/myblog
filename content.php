<?php
session_start();
if(isset($_POST['enter'])){
	$name=htmlspecialchars(trim(strip_tags($_POST['name'])));
	$password=md5(htmlspecialchars(trim(strip_tags($_POST['password']))));
	$email=htmlspecialchars(trim(strip_tags($_POST['email'])));

$_SESSION['name']=$name;
$_SESSION['password']=$password;
$_SESSION['email']=$email;
$error=false;
 
if($name=="" && $password=="" && $email==""){
	$error=true;
	echo "<div id=error_div>";
	echo "<h1>Error!</h1>";
	echo "<p> Fill all the fields in order to continue! </p>";
	echo "<a href='index.php'>Get back to authorization</a>";
	echo "</div>";
}
 if(!preg_match("/[1-9]+/", $password)){
 	$error=true;
echo "<div id=error_div>";
	echo  "<h1>Error!</h1>";
	echo "<p> Password should contain at least one number! </p>";
	echo "<a href='index.php'>Get back to authorization</a>";
echo "</div>";
}
 if (!preg_match("/[a-z]+/i", $password)){
 	$error=true;
echo "<div id=error_div>";
	echo  "<h1>Error!</h1>";
	echo "<p> Password should contain at least one letter! </p>";
	echo "<a href='index.php'>Get back to authorization</a>";
echo "</div>";
}
if(!preg_match("/[a-z]*[0-9]*@+com|net|ru$/i", $email)){
$error=true;
echo "<div id=error_div>";
	echo  "<h1>Error!</h1>";
	echo "<p> Invalid email form,please try again </p>";
	echo "<a href='index.php'>Get back to authorization</a>";
	echo "</div>";
}
if(!$error){

	 $db_content=mysqli_connect("localhost","root","","mydb");
 mysqli_query($db_content,"set character_set_client='cp1251'");
mysqli_query ($db_content,"set character_set_results='cp1251'");
mysqli_query ($db_content,"set collation_connection='cp1251_general_ci'");
  $namer=$_POST['name'];
$sql_content="SELECT * FROM register WHERE name LIKE '%$namer%' OR email LIKE '%$email%'";
 $result_content=mysqli_query($db_content,$sql_content);
  if((mysqli_num_rows($result_content) > 0)){
  		$array=array("1996","lizkas","king","3467","2678","7345");
 	$rand=array_rand($array);
 	$value=$array[$rand];
 	$name.=$value;
 	echo "<p>This name or email exists</p>";
 	echo "<p>You can try these one ".$name."</p>";

 
 
}
 else{
 	
for($i=0;$i<16;$i++){
	$verify_string="".chr(mt_rand(32,127));
}

$sql_insert="INSERT INTO register(name,email,password,verify_string,created,verified)VALUES('$name','$email','$password','$verify_string',NOW(),0)";
  mysqli_query($db_content,$sql_insert) or die (mysqli_error());
$verify_url="http://mysite/test.php";
$verify_string=urlencode($verify_string);
$email=urlencode($email);
$message=<<<_MAIL_
To $email :
Hi, $name now you are a member of our small sociaty,but firstly you should verify your account:
$verify_url?email=$email&verify_string=$verify_string
If it will not be verified we will delete it in 5 days.
_MAIL_;

	mail($email, "User verification", $message);
	echo "check your mail";

}
}
}

?>
<style>
#error_div{
	margin:7px;
	float:left;
	width:300px;
	height:200px;
	border:3px dashed red;
}
#error_div a{
	margin:5px;
	text-decoration:none;

}
#error_div p{
	margin:5px;
color:red;
font-weight: bold;
font-size:20px;
}

</style>
