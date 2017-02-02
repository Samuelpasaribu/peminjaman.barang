<?php
session_start(); //start session
include_once("config.inc.php"); //include config file

############# Memasuk produk baru ke keranjang belanja #########################
if(isset($_POST["id_brg"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); 
	}
	
	$statement = $mysqli_conn->prepare("SELECT nama_brg, stok_brg FROM barang WHERE id_brg=? LIMIT 1");
	$statement->bind_param('s', $new_product['id_brg']);
	$statement->execute();
	$statement->bind_result($nama_brg, $stok_brg);
	

	while($statement->fetch()){ 
		$new_product["nama_brg"] = $nama_brg; 
		$new_product["stok_brg"] = $stok_brg;  
		
		if(isset($_SESSION["products"])){  
			if(isset($_SESSION["products"][$new_product['id_brg']])) 
			{
				unset($_SESSION["products"][$new_product['id_brg']]); 
			}			
		}
		
		$_SESSION["products"][$new_product['id_brg']] = $new_product;	
	}
	
 	$total_items = count($_SESSION["products"]); //
	die(json_encode(array('items'=>$total_items)));

}

################## List Produk yang ada di keranjang belanja ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ 
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["products"] as $product){ 
			
		
			$nama_brg = $product["stok_brg"]; 
			$stok_brg = $product["nama_brg"];
			
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Total : '.($total).' <u><a href="view_cart.php" title="Review Cart dan Check-Out">Check-out</a></u></div>';
		die($cart_box); 
	}else{
		die("Keranjang Belanja Anda Kosong"); 
	}
}

################# Menghapus Item dari Keranjang Belanja ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
	$product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);

	if(isset($_SESSION["products"][$id_brg]))
	{
		unset($_SESSION["products"][$id_brg]);
	}
	
 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
}