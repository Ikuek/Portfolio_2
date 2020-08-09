<?php
session_start();
session_regenerate_id(true);
require_once ('../common/common.php');

$dbh = connect();
$dbh->query('SET NAMES utf8');
$sql = 'SELECT code, name, price,pic FROM mst_product WHERE 1';
$stmt = array();

foreach ($dbh->query($sql) as $row) {
    array_push($stmt,$row);
}
require 't_shop_list.php';
?>
