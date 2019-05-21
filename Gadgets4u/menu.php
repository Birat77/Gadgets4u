<?php

$menu = $_GET['cat'];

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.product
		{
			height:300px;
			width:300px;
			border:1px solid blue;
		}
		.product_image
		{
			height: 200px;
		}
		.product_image > img
		{
			height: 200px;
			width:300px;
		}
		.card{
			float: left;
			margin:20px;
		}
	</style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>

<div class="main-grid">
    <div class="header" style="background-color:#83B735;height:40px;width:100%;">
 <center>    <p style="color:white;text-align:center;line-height:40px;">Free Shipping All over Nepal</p> </center>  


    </div>
<div class="banner">
<div class="logo">
<img src="image/alog.png" alt="" height="50px" width="150px" style="margin-left:60px;">
</div>
<div class="search" style="margin:10px;">
<input id="search" type="search" name="search" placeholder="&#128270;Search products Here" style="">
</div>
<div class="cart">
    <ul>
        <li><a href="#" style="text-decoration:none;color:black;">LOGIN/REGISTER</a></li>
        <li><i class="far fa-heart fa-2x"></i></li>
        <li><a href="viewcart.php">viewcart</a></li>
    </ul>


</div>


</div>
<div class="nav-bar">

<ul>
<i class="fas fa-list" id="tesai"></i><li>BROWSE CATEGORIES</li><i class="fas fa-caret-down"></i>
<li>HOME</li><i class="fas fa-caret-down"></i>
<li>SHOP</li><i class="fas fa-caret-down"></i>
<li>BLOG</li><i class="fas fa-caret-down"></i>
<li>PAGES</li><i class="fas fa-caret-down"></i>
<li>ELEMENTS</li><i class="fas fa-caret-down"></i>
<li>BUY</li><i class="fas fa-caret-down"></i>
<li>SPECIAL OFFER</li>
</ul>

</div>

<div class="wrapper" style="background-color:#e6ffff;">
<div class="side-bar">
<ul>
<a href="menu.php?cat=mobile"><li id="stationery"> <i class="fas fa-home" style="margin-right:10px;" ></i>Mobile <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li></a>
<a href="menu.php?cat=laptop"><li><i class="fa fa-car" style="margin-right:10px;"></i>Comuter <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li></a>
<a href="menu.php?cat=headphones"><li><i class="fa fa-headphones" style="margin-right:10px;"> </i>  Headphones <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li></a>
<a href="menu.php?cat=speaker"><li><i class="fa fa-gift" style="margin-right:10px;"> </i> Speakers <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li></a>
<li><i class="fa fa-medkit" style="margin-right:10px;"></i>Smartwatch <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li>
<li><i class="fas fa-home"style="margin-right:10px;"></i> Coolers <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li>
<li><i class="fas fa-home" style="margin-right:10px;"></i> Accesories <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li>
<li><i class="fa fa-wifi" style="margin-right:10px;"> </i>Notebooks <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li>
<li><i class="fas fa-home" style="margin-right:10px;"></i> Electronic Appliances<i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li>

<li><i class="fas fa-home" style="margin-right:10px;"></i>Home <i style="float:right;margin-right:10px;line-height:50px;color:#c5d4e2;" class="fas fa-caret-right"></i></li>

</ul>
</div>
<div class="menuitems">
	<?php   $connection = mysqli_connect('localhost','root','','sunrise');   
		$items = array();
		$query = "SELECT * FROM  products WHERE product_category = '$menu'";
		
		$res = mysqli_query($connection,$query);

		while($row = mysqli_fetch_assoc($res))
		{
			array_push($items,$row);
		}
		foreach($items as $item)
		{
			?>

				<!-- <div class="product">
					<div class="product_image">
						<img src="<?=  $item['product_image'];  ?>">
					</div>
					<div class="product_info">
						<?=  $item['product_price'];  ?>
					</div>
					<center><button class="btn btn-primary">Add To cart</button></center>
				</div> -->
				<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?=  $item['product_image'];  ?>" alt="Card image cap" height="200" width="200">
  <div class="card-body">
    <h5 class="card-title"><?=  $item['product_name'];  ?></h5>
    <p class="card-text"><?=  $item['product_price'];  ?></p>
    <a href="addtocart.php?id=<?php echo $item['product_id']; ?>" class="btn btn-primary"  >Add to Cart  </a>
  </div>
</div>


			<?php
		}

		

		 ?>



</div>

</div>
<script type="text/javascript">
	
</script>
</body>
</html>

