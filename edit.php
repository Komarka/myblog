<?php
include_once("main.php");
if(isset($_GET['edit'])){
	$update_id=$_GET['edit'];
    $db_3=mysqli_connect("localhost","root","","mydb");
   $sql_update="SELECT *FROM  blog WHERE id = '$update_id'";
    $result_update=mysqli_query($db_3,$sql_update) or die (mysqli_error());
   while($update=mysqli_fetch_array($result_update)){
  echo "<form  action=update.php method=post enctype=multipart/form-data >";
echo " Your Nick: <br />";
echo "<input name=update_nick  value='".$update['user_name']."' id=nick type=text  /> <br />";
 echo "   <p><b>Write your story:</b></p>";
  echo " <p><textarea rows=10 cols=45 name=update_text  id=textarea placeholder=The maximum is 1000 letters maxlength=1000>".$update['text']."</textarea></p>";
     echo "<p><button type=submit name=update id=send>Update</button></p>";
  echo "<input type=hidden name=id value='".$update['id']."'>";

  echo "</form>";
}
}
?>
