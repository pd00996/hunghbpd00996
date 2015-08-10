<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- the head section -->
    <head>
        <title>Bá Hưng Shop Mobile</title>
        <link rel="stylesheet" type="text/css"
              href="<?php echo $app_path; ?>main.css" />

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
        <li><a><strong>Sản phẩm</strong></a>
        <ul>
        <li>
        <?php
            require_once('model/database.php');
            require_once('model/category_db.php');
            
            $categories = get_categories();
            foreach($categories as $category) :
                $name = $category['tenloaisanpham'];
                $id = $category['idloaisanpham'];
                $url = $app_path . 'catalog?category_id=' . $id;
				$send_email = $app_path.'email';
        ?>
        <a href="<?php echo $url; ?>">
               <?php echo $name; ?>
            </a></li>
          
        <?php endforeach; ?>
        </ul>
        
        </li>
        <li><a href="#"><strong>Liên hệ</strong></a></li>
        <li><a href="<?php echo $app_path; ?>admin"><strong>Quản trị̣</strong></a></li>
        </ul>
        
        
      <?php include 'view/sidebar.php'; ?>
  </div>
  
        </body>
        