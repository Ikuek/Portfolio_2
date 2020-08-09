<?php

require_once ('../common/common.php');

$post = sanitize($_POST);

$name = $post['name'];
$email = $post['email'];
$zip1 = $post['zip1'];
$zip2 = $post['zip2'];
$address = $post['address'];
$tel = $post['tel'];

$order = $post['order'];
$pass = $post['pass'];
$pass2 = $post['pass2'];
$sex = $post['sex'];
$year = $post['year'];
$month = $post['month'];
$day = $post['day'];

$flg = true;

if($name==='') {
    echo "<script type='text/javascript'>alert('名前が入力されていません。'); window.history.back();</script>";
    $flg = false;
}

//emamilの重複チェック
$dbh = connect();
$dbh->query('SET NAMES utf8');
//$email = filter_input(INPUT_POST, 'email');
$sql = 'SELECT count(*) as cnt FROM member WHERE email=?';
$stmt = $dbh->prepare($sql);

$data = array();
$data[] = $email;
$stmt->execute($data);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (0 < $row['cnt']) {
    echo "<script type='text/javascript'>alert('このメールアドレスはすでに登録されています。'); window.history.back();</script>";
    exit();
}

//メールアドレスチェック
if (preg_match('/^[\w\-\.]+\@[\w\-\.]+\.([a-z]+)$/',$email)===0) {
    echo "<script type='text/javascript'>alert('メールアドレスを正確に入力してください。'); window.history.back();</script>";
    $flg = false;
}


//郵便番号チェック
if (preg_match('/^\d{3}$/',$zip1)===0) {
    echo "<script type='text/javascript'>alert('郵便番号を正しく入力してください。'); window.history.back();</script>";
    $flg = false;
}
if (preg_match('/^\d{4}$/',$zip2)===0) {
    echo "<script type='text/javascript'>alert('郵便番号を正しく入力してください。'); window.history.back();</script>";
    $flg = false;
}

//アドレスチェック
if ($address === '') {
    echo "<script type='text/javascript'>alert('住所が入力されていません。'); window.history.back();</script>";
    $flg = false;
}

//電話番号チェック
if (preg_match('/^\d{2,5}-?\d{2,5}-?\d{4,5}$/',$tel)===0) {
    echo "<script type='text/javascript'>alert('電話番号を正確に入力してください。'); window.history.back();</script>";
    $flg = false;
}

if ($order === 'register')
{
    //パスワードチェック
    if ($pass === ''){
        echo "<script type='text/javascript'>alert('パスワードを入力してください。'); window.history.back();</script>";
        $flg = false;
    }
    if ($pass !== $pass2){
        echo "<script type='text/javascript'>alert('パスワードが一致しません。'); window.history.back();</script>";
        $flg = false;
    }

    //生年月日チェック
    $now = date("Ymd");
    $birth = $year.$month.$day;
    if ($birth - $now > 0) {
        echo "<script type='text/javascript'>alert('生年月日を正しく入力してください。'); window.history.back();</script>";
    }
    if (empty($year) || empty($month) || empty($day)) {
        echo "<script type='text/javascript'>alert('生年月日を入力してください。'); window.history.back();</script>";
    } 
    if (!checkdate( $month, $day, $year)) {
        echo "<script type='text/javascript'>alert('生年月日を正しく入力してください。'); window.history.back();</script>";
    }
}

require 't_check_shop_form.php';
?>
