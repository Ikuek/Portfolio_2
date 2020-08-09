<?php
	session_start();
	session_regenerate_id(true);

	require_once('../common/common.php');

	$post=sanitize($_POST);

	$max = $post['max'];
	for ($i=0;$i<$max;$i++) {
		if (preg_match("/^[0-9]+$/", $post['quantity'.$i])=== 0) {
			echo '半角数字で入力してください。<br/>';
			echo '<a href="shop_cartlook.php">カートに戻る</a>';
			exit();
		}
		if ($post['quantity'.$i]<1 || 50<$post['quantity'.$i]) {
			echo 'カートに入れれるのは1回50口までです。<br/>';
			echo '<a href="shop_cartlook.php">カートに戻る</a>';
			exit();
		}
		$quantity[] = $post['quantity'.$i];
	}

	$cart = $_SESSION['cart'];

	for ($i=$max;0<=$i;$i--) {
		if(isset($_POST['delete'.$i])=== true) {
			array_splice($cart,$i,1);
			array_splice($quantity,$i,1);
		}
	}

	$_SESSION['cart']=$cart;
	$_SESSION['quantity']=$quantity;

	header('Location:shop_cartlook.php');
?>