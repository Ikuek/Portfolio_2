<?php

try {
    
    require_once ('../common/common.php');

    $post = sanitize($_POST);

    $member_email = $post['email'];
    $member_pass = $post['pass'];

    $member_pass = md5($member_pass);
    
    
    $dbh = connect();
    $dbh->query('SET NAMES utf8');

    $sql = 'SELECT code, name FROM member WHERE email=? AND pass=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $member_email;
    $data[] = $member_pass;
    $stmt->execute($data);

    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rec !== false) {
        session_start();
        $_SESSION['member_login'] = 1;
        $_SESSION['member_code'] = $rec['code'];
        $_SESSION['member_name'] = $rec['name'];
        header('Location:shop_list.php');
    } else {
        $error = "<script type='text/javascript'>alert('メールアドレスかパスワードが間違っています。'); window.history.back();</script>";
    }
}

catch (Exception $e) {
    echo 'ただいま障害によりご迷惑おかけしています';
    exit();
}
require 't_member_login.php';
?>
