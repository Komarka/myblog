<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Authorization</title>

</head>
<body>
<div id="main">
<div id="head">
<p>Contacts: 066-033-32-37 or <a href="#">Mail us</a></p>
<p>Rights are reserved,if you have some problems on the site,please contact us.</p>

</div>
<button class="btn">Share with your story</button>
<div id="form_id">

<form hidden name="main" method="post" action="content.php" id="form">
<h1>Join us</h1>
Name: <br />
<input name="name" class="inputs" id="name" type="text" placeholder="Enrer your name"  /> <br />
Email: <br />
<input name="email" id="email" class="inputs" type="text" placeholder="Enter your mail"  /> <br />
Password: <br />
<input name="password" type="password" class="inputs" id="password"  placeholder="Enter your password" maxlength="8"  /> <br />
<p><a href=forgot.php>Forgot my password</a></p>
<button  type="submit" name="enter" id="button">Register</button>

</form>
</div>
<div id="contact">
</div>
</div>
</body>
</html>
<script>

$(".btn").click(function(){
	$("#form").slideDown();
	$(".btn").hide();
});

 var inputs = $("form :input");
$(inputs).keypress(function(e){
    if (e.keyCode == 13 || e.keyCode == 66){
      e.preventDefault();
       inputs[inputs.index(this)+1].focus();

    }
});

</script>
<style>
body{
	padding:0;
	margin:0;
	background-image:url('http://fonday.ru/images/tmp/11/6/original/11612PtyiOWBEcDsMerAX.jpg');
	-moz-background-size: 100%; 
    -webkit-background-size: 100%; 
    -o-background-size: 100%; 
    background-size: 100%;
    background-repeat: no-repeat;

}
.btn {
  background: #003559;
  background-image: -webkit-linear-gradient(top, #003559, #4cb82b);
  background-image: -moz-linear-gradient(top, #003559, #4cb82b);
  background-image: -ms-linear-gradient(top, #003559, #4cb82b);
  background-image: -o-linear-gradient(top, #003559, #4cb82b);
  background-image: linear-gradient(to bottom, #003559, #4cb82b);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Georgia;
  color: #ccde04;
  font-size: 25px;
  padding: 0px 20px 15px 23px;
  text-decoration: none;
}

.btn:hover {
  background: #80694b;
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #80694b, #c7401e);
  background-image: -moz-linear-gradient(top, #80694b, #c7401e);
  background-image: -ms-linear-gradient(top, #80694b, #c7401e);
  background-image: -o-linear-gradient(top, #80694b, #c7401e);
  background-image: linear-gradient(to bottom, #80694b, #c7401e);
  text-decoration: none;
}
.btn{
	position:absolute;
	left:400px;
	bottom:480px;
}
#head{
	border-top:3px solid #CDC5C5;
	width:1025px;
	height:104px;
	position: absolute;
	bottom:0;
 background: #141414;
  background-image: -webkit-linear-gradient(top, #141414, #382622);
  background-image: -moz-linear-gradient(top, #141414, #382622);
  background-image: -ms-linear-gradient(top, #141414, #382622);
  background-image: -o-linear-gradient(top, #141414, #382622);
  background-image: linear-gradient(to bottom, #141414, #382622);
}
#head p{


	text-shadow: 0px 0px 3px rgba(0, 0, 0, 0.82);
	color: #EDDADA;
	font-size: 18px;
}
#head a{
	text-decoration: none;
	color:yellow;
}
#head a:hover{
	text-decoration: underline;
}
#form{

    width: 650px;
    height: 330px;
    margin: 100px auto 50px auto;
    padding: 20px;
    position: relative;
    background: #fff url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAMAAAAECAMAAAB883U1AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAAlQTFRF7+/v7u7u////REBVnAAAAAN0Uk5T//8A18oNQQAAABZJREFUeNpiYGJiYmBiYgRiBhAGCDAAALsAFJhiJ+UAAAAASUVORK5CYII=);
    border: 1px solid #ccc;
    border-radius: 3px;  
}

#form::before, 
#form::after {
    content: "";
    position: absolute;
    bottom: -3px;
    left: 2px;
    right: 2px;
    top: 0;
    z-index: -1;
    background: #fff;
    border: 1px solid #ccc;            
}

#form::after {
    left: 4px;
    right: 4px;
    bottom: -5px;
    z-index: -2;
    box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
}
#form h1 {
    position: relative;
    font: italic 1em/3.5em 'trebuchet MS',Arial, Helvetica;
    color: #999;
    text-align: center;
    margin: 0 0 20px;
}

#form h1::before,
#form h1::after{
    content:'';
    position: absolute;
    border: 1px solid rgba(0,0,0,.15);
    top: 10px;
    bottom: 10px;
    left: 0;
    right: 0;
}

#form h1::after{
    top: 0;
    bottom: 0;
    left: 10px;
    right: 10px;
}
::-webkit-input-placeholder {
   color: #bbb;
}

:-moz-placeholder {
   color: #bbb;
}                         

.placeholder{
    color: #bbb; /* polyfill */
}        

#form input{
    margin: 5px 0;
    padding: 15px;
    width: 100%;
    *width: 518px; /* IE7 and below */
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 3px;    
}

#form input:focus{
        outline: 0;
        border-color: #aaa;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
}        

#form button{
    margin: 2px 0 0 0;
    padding: 15px 8px;            
    width: 100%;
    cursor: pointer;
    border: 1px solid #2493FF;
    overflow: visible;
    display: inline-block;
    color: #fff;
    font: bold 1.4em arial, helvetica;
    text-shadow: 0 -1px 0 rgba(0,0,0,.4);          
    background-color: #2493ff;
    background-image: linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0)); 
    transition: background-color .2s ease-out;
    border-radius: 3px;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3), 0 1px 0 rgba(255, 255, 255, .5) inset;                                    
}

#form button:hover{
      background-color: #7cbfff;
        border-color: #7cbfff;
}

#form button:active{
    position: relative;
    top: 3px;
    text-shadow: none;
    box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
}



</style>

