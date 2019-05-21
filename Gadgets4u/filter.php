
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="filter.php" method="POST" id="myform" >
		<select name="filter">
			<option value="mobile">Mobile</option>
			<option value="electronics">Electronics</option>
			<option value="Laptop">Laptop</option>
			
		</select>
		<input type="submit" name="submit">

	</form>
<script type="text/javascript">
	
</script>
</body>
</html>


<?php
include 'process.php';
$items = array();

$db = new Database();

$sql = "SELECT * FROM products";

if(isset($_POST['filter']))
{
	$category = $_POST['filter'];
	
	$sql .= " WHERE product_category = ' $category '";
}
echo $sql;
$result = $db->link->query($sql);

while($row = mysqli_fetch_array($result))
{
	array_push($items,$row);
}
echo '<pre>';
print_r($items);









?>
