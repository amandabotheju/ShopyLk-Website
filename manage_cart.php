<?php 

session_start();


if($_SERVER["REQUEST_METHOD"]=="POST") 
{
	if(isset($_POST['AddToCart'])) 
	{
		if(isset($_SESSION['cart'])) 
		{
			$items=array_column($_SESSION['cart'],'item_name');
			if(in_array($_POST['item_name'],$items))
			{
				echo 
				"<script>
					alert('Item already added!!');
					window.location.href='shop.php';
				</script>";
			}

			else{
			$count=count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'image'=>$_POST['image'],'qtyy'=>1);
			echo 
				"<script>
					alert('Item added to cart');
					window.location.href='shop.php';
				</script>";
			}
		}
		else 
		{
			$_SESSION['cart'][0]=array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'image'=>$_POST['image'],'qtyy'=>1);
			echo 
				"<script>
					alert('Item added to cart');
					window.location.href='shop.php';
				</script>";
		}
	}






	if (isset($_POST['remove'])) {
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['item_name']==$_POST['item_name']) {
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart']=array_values($_SESSION['cart']);
				echo"<script>
				
				window.location.href='cartnew.php';</script>";
			}
		}
	}
}


 ?>