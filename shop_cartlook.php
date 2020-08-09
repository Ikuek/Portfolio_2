<?php
session_start();
session_regenerate_id(true);

require ('../common/common.php');

try {

    if (isset($_SESSION['cart'])===true) {
	    $cart = $_SESSION['cart'];
	    $quantity = $_SESSION['quantity'];
	    $max = count($cart);
    } else {
	    $max = 0;
    }

    if ($max === 0) {
		$message =  'カートは空です。';
    } else {

    $dbh = connect();
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    foreach ($cart as $key=>$val) {
	    $sql = 'SELECT code,name,price,pic FROM mst_product WHERE code=?';
        $stmt = $dbh->prepare($sql);
	    $data[0] = $val; //procode
	    $stmt->execute($data);
	    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

	    $pro_name[] = $rec['name'];
	    $pro_price[] = $rec['price'];
	    if ($rec['pic'] === '') {
		    $pro_pic[] = '';
	    } else {
		    $pro_pic[]='<img src="../product/pic/'.$rec['pic'].'">';
        }
	}
	
    $total = 0;
    for($i=0; $i<$max; $i++) {
        $subtotal = $pro_price[$i] * $quantity[$i];
        $total += $subtotal;
    }
}

$dbh=null;

} catch (Exception $e) {
	echo'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
require 't_shop_cartlook.php';
?>
