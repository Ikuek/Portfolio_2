<?php
session_start();
session_regenerate_id(true);
require ('../common/common.php');

$code = $_SESSION['member_code'];

$dbh = connect();
$dbh->query('SET NAMES utf8');

$sql = 'SELECT name,email,zip1,zip2,address,tel FROM member WHERE code=?';
$stmt = $dbh->prepare($sql);
$data[] = $code;
$stmt->execute($data);
$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$dbh = null;

$name = $rec['name'];
$email = $rec['email'];
$zip1 = $rec['zip1'];
$zip2 = $rec['zip2'];
$address = $rec['address'];
$tel = $rec['tel'];

require 't_quick_check.php';
?>
