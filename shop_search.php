<?php
header("Content-type: text/html; charset=utf-8");
require_once ('../common/common.php');
$dbh = connect();
$dbh->query('SET NAMES utf8');

if (($_GET['search'])==='') {
  echo "<script type='text/javascript'>alert('検索ワードを入力してください。'); window.history.back();</script>";
  exit();
} else {
  $search = htmlspecialchars($_GET['search']);
  $sql = "SELECT code, name, price, pic FROM mst_product WHERE name or comment LIKE '%$search%'";
  $stmt = array();
  foreach ($dbh->query($sql) as $row) {
    array_push($stmt,$row);
  }
  $result = count($stmt);
}
require 't_shop_search.php';
?>
