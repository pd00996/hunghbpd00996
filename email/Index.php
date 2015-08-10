<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- the head section -->
    <head>
        <title>Bá Hưng Shop Mobile</title>
<link rel="stylesheet" type="text/css" href="../images/Jquery UI/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
	<script src="../images/Jquery UI/js/jquery-1.10.2.js"></script>
	<script src="../images/Jquery UI/js/jquery-ui-1.10.4.custom.js"></script>
<style type="text/css">
a:link {text-decoration: none;}
a:visited {text-decoration: none;}
.ui-menu { 
	width: 184px; 
	z-index:9999;
	border-top-left-radius:0px;
	border-top-right-radius:0px;
	border:0px #999 solid;
	font-size:15px;
}
#menu li ul {
	border-radius: 5px;
}
#menu li a:hover {
	color:#00F;
	background:#CCC;
}
#main
{
	margin:auto;
	width:1330px;
	height:auto;
}
#wrapper {
	width:1000px;
	height:auto;
	margin:auto;
}
#header {
	width:1000px;
	height:150px;
	background:#FFF;
	
}
#menu_tab{
	width:1000px;
	height:40px;
	background:#666;
	overflow:hidden;
	margin-bottom:5px;
}
#menu_tab ul{
	float:left;
	width:700px;
	margin:0;
	padding: 5px 0 0 0 ;
	list-style:none;
}
#menu_tab ul li{
	display: inline;
	float:left;
	text-align:left;
}
#menu_tab ul li a{
	float:left;
	width:110px;
	padding:5px 0 5px 10px;
	font-size:16px;
	font-weight:bold;
	text-align:left;
	text-decoration:none;
	color:#FFF;
	background:#666;
}
#menu_tab a:hover{
	color:#00F;
}
#menu_tab ul li ul {
z-index:9999;
position:absolute;
display:none;
width:100px;
margin:25px 0 0 0;
text-align:left;
}
#menu_tab ul li:hover ul{
display:block;
}
#menu_tab ul li ul li {
width:100%;
}
#footer {
	width:1000px;
	height:auto;
	background:#FFF;
	color:#000;
	font-size:14px;
}

.chinhsach {
	margin:0 0 0 10px;
	width:300px;
	float:left;
}
.khachhang {
	width:300px;
	float:left;
}
.thongtin{
	width:330px;
	float:left;
}
.content_text {
	width:982px;
	margin:5px 0 0 0px;
	border:1px #333 solid;
	border-radius: 5px;
	padding:0 5px 5px 0px;
	text-decoration:none;
	height:auto;
	padding-left:10px;
}
.content_tab {
	width:994px;
	background:#CCC;
	height:24px;
	padding:5px 0px 0 3px;
	border-top-right-radius:5px;
	border-top-left-radius:5px;
	margin-left:-10px;
}
#seach {
	float:right;
	margin-top:10px;
	font-size:16px;
	margin-right:10px;
}
</style>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
    </head>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
</head>
		<script type="text/javascript">

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53320103-1', 'auto');
  ga('send', 'pageview');


	</script>
    <?php 
	$app_path = '../../Hunghbpd00996_Assignment2';
	?>
    <!-- the body section -->
    <body>
    <div id="main">
    <div id="wrapper">
	<div id="header"><img width="1000px"; height="150px" src="images/banner.jpg"/></div>
    <div id="menu_tab">
        <ul>
        <li><a href="<?php echo $app_path; ?>"><strong>Trang chủ</strong></a></li>
        <li><a href="#"><strong>Tin tức</strong></a>
        </li>
        <li><a href="#"><strong>Sản phẩm</strong></a>    
        </li>
        <li><a href="#"><strong>Liên hệ</strong></a></li>
        </ul>
        <div id="seach">
        <a href="#">Đăng nhập</a>
        </div>
         </div>
  <div  class="content_text">
    <div class="content_tab"><b>Liên hệ</b></div>
       
<?php
    require_once 'MailHelper.php';
    
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'show_email';
    }
    
    switch ($action) {
        case 'show_email':
            include 'EmailForm.php';
            break;
        case 'send_email':
            include 'EmailController.php';
            include 'EmailForm.php';
            break;

    }
?>
</div>
 </body>
<?php include '../view/footer.php'; ?>