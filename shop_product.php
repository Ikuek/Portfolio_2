<?php
session_start();
session_regenerate_id(true);

require_once ('../common/common.php');

try {
    $pro_code = $_GET['procode'];

    $dbh = connect();
    $dbh->query('SET NAMES utf8');
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name,price,pic,comment FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_price = $rec['price'];
    $pro_pic_name = $rec['pic'];
    $pro_comment = nl2br($rec['comment']);

    $dbh = null;

    if ($pro_pic_name === '') {
        $disp_pic = '';
    } else {
        $disp_pic = '<img src="../product/pic/'.$pro_pic_name.'">';
    }
}

catch(Exception $e) {
    echo 'ただいま障害によりご迷惑をおかけしています';
    exit();
}
require 't_shop_product.php';
?>
