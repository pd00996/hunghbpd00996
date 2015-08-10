<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Bá Hưng Shop, ba hung shop, bahungshop, bahungdtdd" />
<!-- InstanceBeginEditable name="EditRegion_title" -->
<title>Bá Hưng Mobile</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="ĐTDĐ, điện thoại di động" />
	<meta name="description" content="ĐTDĐ "/>
	<link rel="stylesheet" type="text/css" href="images/Jquery UI/engine1/style.css" />
<script type="text/javascript" src="images/Jquery UI/engine1/jquery.js"></script>
<script type="text/javascript">
$(function() {
    $( document ).tooltip();
  });
</script>
<style>
  label {
    display: inline-block;
    width: 5em;
  }
  </style>
  <?php 
    require_once('util/main.php');

	require_once('model/product_db.php');
	// Set the featured product IDs in an array
	//$product_ids = array(1,2,3,4);
// Note: You could also store a list of featured products in the database

// Get an array of featured products from the database
/*$products = array();
foreach ($product_ids as $product_id) {
    $product = get_product($product_id);
    $products[] = $product;   // add product to array
}*/
$products = get_products();
?>
<?php 
    include 'view/header.php';
    
?>


<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="CSS/main.css"/>
<link rel="stylesheet" type="text/css" href="Jquery%20UI/css/ui-lightness/jquery-ui-1.10.4.custom.css"/>
	<script src="Jquery%20UI/js/jquery-1.10.2.js"></script>
	<script src="Jquery%20UI/js/jquery-ui-1.10.4.custom.js"></script>
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
    
    <div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><a href="#" title="SAMSUNG"><img src="images/data1/images/anh1.jpg" alt="SAMSUNG" title="SAMSUNG" id="wows1_0"/></li></a>
<li><a href="#" title="HTC"><img src="images/data1/images/anh2.jpg" alt="HTC" title="HTC" id="wows1_1"/></li></a>
<li><a href="#" title="NOKIA"><img src="images/data1/images/anh3.jpg" alt="NOKIA" title="NOKIA" id="wows1_2"/></li></a>
<li><a href="#" title="APPLE"><img src="images/data1/images/anh4.jpg" alt="APPLE" title="APPLE" id="wows1_3"/></li></a>
<li><a href="#" title="LG"><img src="images/data1/images/anh5.jpg" alt="LG" title="LG" id="wows1_4"/></li></a>
<li><a href="#" title="OPPO"><img src="images/data1/images/anh6.jpg" alt="anh6" title="OPPO" id="wows1_5"/></li></a>
</ul>
</div>
<div class="ws_bullets"><div>
<a href="#" title="SAMSUNG"><img src="images/data1/tooltips/anh1.jpg" alt="SAMSUNG"/>1</a>
<a href="#" title="HTC"><img src="images/data1/tooltips/anh2.jpg" alt="HTC"/>2</a>
<a href="#" title="NOKIA"><img src="images/data1/tooltips/anh3.jpg" alt="NOKIA"/>3</a>
<a href="#" title="APPLE"><img src="images/data1/tooltips/anh4.jpg" alt="APPLE"/>4</a>
<a href="#" title="LG"><img src="images/data1/tooltips/anh5.jpg" alt="LG"/>5</a>
<a href="#" title="OPPO"><img src="images/data1/tooltips/anh6.jpg" alt="anh6"/>6</a>
</div></div>

	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="Jquery UI/engine1/wowslider.js"></script>
	<script type="text/javascript" src="Jquery UI/engine1/script.js"></script>
    <div  class="sphot">
    <div class="content_sphot"><b>Sản phẩm nỗi bật</b></div>
        <?php 
include 'home_view.php';
?>     
    </div>
   
	<?php include 'view/footer.php'; ?>
	
	<!-- InstanceEndEditable -->

</div>
</body>
<!-- InstanceEnd --></html>
