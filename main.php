<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<?php
@session_start();
$name=$_SESSION['name'];
$name=ucfirst(strtolower($name));
echo "<div id=head>";
echo "<p>Hi,".$name."!</p>";
echo "<p> If you want to change some info please press <a href='index.php'>here</a></p>";
echo "<button id = no>No,thanks</button>";
echo "</div>";
?>
<?php
if(isset($_POST['send'])){
  $nick=htmlspecialchars(trim(stripslashes($_POST['nick']))); 
    $db=mysqli_connect("localhost","root","","mydb");
    mysqli_query($db,"set character_set_client='cp1251'");
mysqli_query ($db,"set character_set_results='cp1251'");
mysqli_query ($db,"set collation_connection='cp1251_general_ci'");
  $target="image/".basename($_FILES['file']['name']);
  $file_name=$_FILES['file']['name'];
  $file_tmp=$_FILES['file']['tmp_name'];
  $file_size=$_FILES['file']['size'];
  $text=htmlspecialchars(trim(stripslashes($_POST['text']))); 
$file_type=$_FILES['file']['type'];
if($file_size>1024*3*1024){
  die ("The size of the photo is too big");
}
else if(empty($text)){ 
  die("Fill the text-field");
  }
else if($file_name==''){
  die("there is no photo");
}
else if(($file_type != "image/jpg") && ($file_type != "image/jpeg") && ($file_type != "image/png")){
  die("Not the propriate type of the photo");
}else{
  move_uploaded_file($file_tmp, $target);
  
  $sql="INSERT INTO blog(image,text,user_name)VALUES('$file_name','$text','$nick')";
  mysqli_query($db,$sql) or die (mysqli_error());
  $sql_2="SELECT * FROM blog";
$result=mysqli_query($db,$sql_2);
while($row=mysqli_fetch_array($result)){
  $add="The story is written by :";
  $id=$row['id'];
  echo "<div id=blog>";
    echo "<h1>".$add.$row['user_name']."</h1>";
  echo "<hr>";
  echo "<img src='image/".$row['image']."' height=300 width=300>";
   echo "<p id=para>".$row['text']."</p>";
   echo "<a href='place.php?place=$id'>Delete</a>";
   echo "<br/>";
     echo "<a href='edit.php?edit=$id'>Update</a>";
   echo "</div>";
}
}
mysqli_close($db);
 }
?>
<div id="story" hidden>

 <form  action="main.php" method="post" enctype="multipart/form-data" >
 Your Nick: <br />
<input name="nick"  id="nick" type="text" placeholder="Enrer your nick"  /> <br />
    <p><b>Write your story:</b></p>
    <p><textarea rows="10" cols="45" name="text" id="textarea" placeholder="The maximum is 1000 letters" maxlength="1000"></textarea></p>
    <span id="result"></span>
    <p>Download a photo: <br />
      <input type="file" name="file"><br></p>
    <p><button type="submit" name="send" id="send">Submit</button></p>
  </form>
</div>
<button  hidden id = "btn">Create your story</button>
</div>
</body>
</html>

<script>
$(document).ready(function(){
$("#head").slideDown();
})
$("#no").click(function(){
  $("#head").slideUp();
  $("#btn").fadeIn(600);
});
$("#btn").click(function(){
$("#story").slideDown();
})
$("#textarea").keypress(function(){
var letters=$("#textarea").val().length;
var max=1000;
var remaining=max-letters;
$("#result").text(remaining + " characters remaining");
if(remaining==0){
  alert("You have more than 1000 symbols");
}
})


</script>
<style>
body{
 
  padding:0;
  margin:0;
background: #3E3E47;

background-size:100%;
  

}
}
</style>
<style>
#head{ 
  display: none;
  position:absolute;
  left:0px;
  top:0px;
  width:1025px;
  height:120px;
  background: #2e4220;
  background-image: -webkit-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: -moz-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: -ms-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: -o-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: linear-gradient(to bottom, #2e4220, #6aa8cf);
  border-radius: 20px;
}
#head p{
  color:white;
font-size: 23px;
text-align: center;
margin:3px;
}
#head a{
  text-decoration: none;
  color:yellow;
}
#head a:hover{
  text-decoration: underline;
}
#delete{
margin-left:75px;
  
}
#no{
  margin:8px;
  position: absolute;
  left:440px;
cursor: pointer;
  background: #2e4220;
  background-image: -webkit-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: -moz-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: -ms-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: -o-linear-gradient(top, #2e4220, #6aa8cf);
  background-image: linear-gradient(to bottom, #2e4220, #6aa8cf);
  -webkit-border-radius: 12;
  -moz-border-radius: 12;
  border-radius: 12px;
  text-shadow: 0px 1px 2px #1f011f;
  -webkit-box-shadow: 0px 0px 0px #40c258;
  -moz-box-shadow: 0px 0px 0px #40c258;
  box-shadow: 0px 0px 0px #40c258;
  font-family: Courier New;
  color: #08f093;
  font-size: 15px;
  padding: 11px;
  border: dotted #0e0d0f 0px;
  text-decoration: none;
}

#no:hover {
  background: #1b1e85;
  background-image: -webkit-linear-gradient(top, #1b1e85, #bfb541);
  background-image: -moz-linear-gradient(top, #1b1e85, #bfb541);
  background-image: -ms-linear-gradient(top, #1b1e85, #bfb541);
  background-image: -o-linear-gradient(top, #1b1e85, #bfb541);
  background-image: linear-gradient(to bottom, #1b1e85, #bfb541);
  text-decoration: none;
}
#btn {
  position:absolute;
  left:400px;
  cursor: pointer;
  -webkit-border-radius: 10;
  -moz-border-radius: 10;
  border-radius: 10px;
  text-shadow: 1px 1px 11px #35c484;
  font-family: Georgia;
  color: #2dfab9;
  font-size: 20px;
  background: #1e313d;
  padding: 10px 20px 17px 20px;
  border-top: solid #8a778a 1px;
  text-decoration: none;
}

#btn:hover {
  cursor: pointer;
  background: #73712e;
  background-image: -webkit-linear-gradient(top, #73712e, #474032);
  background-image: -moz-linear-gradient(top, #73712e, #474032);
  background-image: -ms-linear-gradient(top, #73712e, #474032);
  background-image: -o-linear-gradient(top, #73712e, #474032);
  background-image: linear-gradient(to bottom, #73712e, #474032);
  text-decoration: none;
}
#story{
border-radius: 15px;
  position:absolute;
  top:80px;
  left:310px;
  width:400px;
  height:350px;
  border:3px dashed yellow;
 background: #5ba889;
  background-image: -webkit-linear-gradient(top, #5ba889, #7aa62e);
  background-image: -moz-linear-gradient(top, #5ba889, #7aa62e);
  background-image: -ms-linear-gradient(top, #5ba889, #7aa62e);
  background-image: -o-linear-gradient(top, #5ba889, #7aa62e);
  background-image: linear-gradient(to bottom, #5ba889, #7aa62e);
}
#send {
  cursor: pointer;
  position:absolute;
  bottom:5px;
  left:250px;
  background: #45371a;
  background-image: -webkit-linear-gradient(top, #45371a, #4d1f7d);
  background-image: -moz-linear-gradient(top, #45371a, #4d1f7d);
  background-image: -ms-linear-gradient(top, #45371a, #4d1f7d);
  background-image: -o-linear-gradient(top, #45371a, #4d1f7d);
  background-image: linear-gradient(to bottom, #45371a, #4d1f7d);
  -webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  text-shadow: 4px 1px 14px #daffd1;
  -webkit-box-shadow: 0px 1px 8px #6a915d;
  -moz-box-shadow: 0px 1px 8px #6a915d;
  box-shadow: 0px 1px 8px #6a915d;
  font-family: Arial;
  color: #a6ffce;
  font-size: 16px;
  padding: 3px 20px 13px 20px;
  border-top: solid #8a778a 1px;
  text-decoration: none;
}

#send:hover {
  background: #bdb715;
  text-decoration: none;
}
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
#blog{

 margin:35px;
  width:850px;
  height:600px;
box-shadow: inset 3px 14px 78px 11px #1754A3,-2px 5px 5px 1px #242424;
-webkit-box-shadow: inset 3px 14px 78px 11px #1754A3,-2px 5px 5px 1px #242424;
-moz-box-shadow: inset 3px 14px 78px 11px #1754A3,-2px 5px 5px 1px #242424;
-o-box-shadow: inset 3px 14px 78px 11px #1754A3,-2px 5px 5px 1px #242424;
  background:#A6E3B9;
border-radius: 18%/1% 31% 20% 50%; 
-webkit-border-radius: 18%/1% 31% 20% 50%; 
-moz-border-radius: 18%/1% 31% 20% 50%;
overflow: hidden;
 

}
#blog h1{
color: rgb(105, 214, 154);
font-size: 30px;
text-align: center;
text-shadow: rgb(3, 3, 3) 3px 2px 7px;
}
#blog p{
  float:right;
  color:#1E1D61;
  letter-spacing:0.5px;
  word-spacing:2px;
  font-size: 20px;
  text-align:left;

}
#blog img{
  float:left;
  margin: 7px 7px 7px 0;
border-radius: 87px; 
-webkit-border-radius: 87px; 
-moz-border-radius: 87px;
border:5px double #36B9D6;
}




</style>


