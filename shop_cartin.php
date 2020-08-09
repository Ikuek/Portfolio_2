<?php
session_start();
session_regenerate_id(true);
require_once ('../common/common.php');

try {
    $pro_code = $_GET['procode'];
    
    $message = 'カートに追加しました。';

    if (isset($_SESSION['cart']) === true) {
        $cart = $_SESSION['cart'];
        $quantity = $_SESSION['quantity'];
        
        if (in_array($pro_code,$cart) === true) {
            $message = 'すでにカートに入っています。';
            goto last;
        }
    }
    $cart[] = $pro_code;
    $quantity[] = 1;
    $_SESSION['cart'] = $cart;
    $_SESSION['quantity'] = $quantity;
    header('Location:shop_cartlook.php ');
    exit();
    last:
}

catch(Exception $e) {
    echo 'ただいま障害によりご迷惑をおかけしています';
    exit();
}
require 't_shop_cartin.php';
?>
