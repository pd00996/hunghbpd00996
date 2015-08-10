<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Bá Hưng Shop, ba hung shop, bahungshop, bahungdtdd" />
<!-- InstanceBeginEditable name="EditRegion_title" -->
<title>Quản trị</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../CSS/main.css"/>
<link rel="stylesheet" type="text/css" href="../Jquery%20UI/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
	<script src="../Jquery%20UI/js/jquery-1.10.2.js"></script>
	<script src="../Jquery%20UI/js/jquery-ui-1.10.4.custom.js"></script>
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
</style>
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
<body >
<div id="main">

    
    <div class="content_center"><!-- InstanceBeginEditable name="content_center" -->
	<?php 
    require_once('../util/main.php');
    
?>
<?php 
    include '../view/header_admin.php';
?>
 	 <div  class="admin">
    <div class="content_admin"><b>Quản trị website</b></div><br />
    <div class="qt">
    <img width="150px" src="images/cart-blank.png" />
    <h3><a href="product">Quản lý sản phẩm</a></h3>
	</div>
    <div class="qt">
    <img width="150px" src="images/icon.add.to.cart.png" />
    <h3><a href="category">Quản lý loại sản phẩm</a></h3>
    </div>
    <div class="qt">
    <img width="150px" src="images/quote.png" />
    <h3><a href="orders">Quản lý đơn hàng</a></h3>
    </div>
    <div class="qt">
    <img width="150px" src="images/User-icon.png" />
    <h3><a href="account">Quản lý tài khoản</a></h3>
    </div>
  
</div>
<?php include 'view/footer.php'; ?>

	
	<!-- InstanceEndEditable -->

</div>
</body>
<!-- InstanceEnd --></html>
