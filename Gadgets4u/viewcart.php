<?php
session_start();

$connection = mysqli_connect('localhost','root','','sunrise');
$total = count($_SESSION['products_id']);
$i = 0;
// echo '<pre>';

// print_r($_SESSION['products_id']);
// print_r($_SESSION['products_quantity']);
$query = "SELECT * FROM products WHERE product_id IN (";
foreach($_SESSION['products_id'] as $key=>$value)
{	

	if(++$i == $total )
	{
		$query .= $value.')';
	}
	else
	{
		$query .= $value.',';
	}
}

$result = mysqli_query($connection,$query);

$_SESSION['cart_items'] = array();

while($object  = mysqli_fetch_object($result))

{
	array_push($_SESSION['cart_items'],$object);



	

}

// echo '<pre>';

// print_r($_SESSION['cart_items']);







?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
	<style type="text/css">
	body
	{
		font-family: helvetica;
	}
		table
		{
			width: 80%;
			background-color: white;
			font-family: helvetica;
			text-align: justify;
			border:1px solid #DEDEDE;
		}
		body
		{
			background-color: #F7F7F7;
		}
	
		#total
		{
			height: 400px;
			width: 300px;
			border:1px solid #DEDEDE;
			position: relative;
			left: 910px;
		}

	
	</style>
</head>
<body>
	<center><h2>CART</h2></center>
	<center>
<table>
	<tr id="heading">
		<th>Item</th>
		<th>Quantity</th>
		<th>Unit Price</th>
		<th>Sub Total</th>
	</tr>

	<?php

	if(count($_SESSION['cart_items'])  == 0)
	{
		echo '<script>window.location.href="error.php"</script>';
	}
	for($i=0;$i<count($_SESSION['cart_items']);$i++)
	{
		
		?>
			<tr style="text-align: justify;">
				<td><img src="<?=  $_SESSION['cart_items'][$i]->product_image;  ?>" height="100" width="100"><?= $_SESSION['cart_items'][$i]->product_name;   ?></td>
				<td>
					<form>
					<select onchange="updatetotal(<?php echo $_SESSION['cart_items'][$i]->product_id; ?>,<?php echo $_SESSION['cart_items'][$i]->product_price; ?>)">
					<option value="1">1</option>
						<option value="2">2</option>
							<option value="3">3</option>
								<option value="4">4</option>

				</select>
			</form>
			</td>
				<td><?= $_SESSION['cart_items'][$i]->product_price;  ?></td>
				<td id="<?=  $_SESSION['cart_items'][$i]->product_id;  ?>" class="prices"> 
                   
					<?= $_SESSION['cart_items'][$i]->product_price;  ?>
					
				</td>

				<td>
					<button onclick="deleteitem(<?=  $_SESSION['cart_items'][$i]->product_id;  ?>)" style="color:red;">&times;</button>
				</td>
			</tr>
		<?php
		
	}

	?>
</table>

</center>
<div id="total">
	<div>
		<span  class="text text-primary">Total:</span>
		<h4 id="totalamount"></h4>
	</div>

	  <button id="payment-button"  class="btn btn-danger">Pay with Khalti</button>
	<a href="index.php" class="btn btn-primary">Continue Shopping</a>
	
</div>


<script type="text/javascript">
	function updatetotal(productid,productprice)
	{
		var amt = event.target.value;
		//console.log(productid);
		var product_id = productid;
		var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	    xhr.open('GET', "updatequantity.php?quan="+amt+"&id="+productid+"&price="+productprice);
	    xhr.onreadystatechange = function() {
	        if (xhr.readyState>3 && xhr.status==200) {
	        	document.getElementById(productid).innerHTML = xhr.responseText;	
	        	var prices = document.getElementsByClassName('prices');
	        	console.log(prices);
	        	total = 0;
	        	for(i=0;i<prices.length;i++)
	        	{
	        	total = total + parseInt(prices[i].innerText);
	        	}
	        	document.getElementById('totalamount').innerHTML = total;

	        }
	    };
	    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	    xhr.send();
	}



</script>
 <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_21cabcbc022e4c7891ec5626bd4205bc",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    

                    
                   

                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

         var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            checkout.show({amount:total });
        }
    </script>


    <!-- Paste this code anywhere in you body tag -->
    ...
    <script>

    		function deleteitem(x)
    		{
    				$.post('delete_cart_item.php',{id:x},function(data)
    				{
    						window.location.href='viewcart.php';
    				});
    		}
    </script>
</body>
</html>


