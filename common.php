<?php

function connect() {
    return new PDO("mysql:dbname=shop","root","root");
}

function checkmember(){
if (isset($_SESSION['member_login']) === false)
{
    echo '<a href="member_login.html">ログイン</a><br/>';
    echo '<br/>';
} else {
    echo $_SESSION['member_name']. ' 様';
    echo '<br/><a href="member_logout.php">ログアウト</a><br/>';
    echo '<b/>';
}
}

function checkstaff(){
    if (isset($_SESSION['login']) === false)
{
    echo 'ログインされていません<br/>';
    echo '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
} else {
    echo $_SESSION['staff_name'];
    echo 'さんログイン中<br/>';
    echo '<b/>';
}
}

function sanitize($before)
{
    foreach ($before as $key => $value)
    {
        $after[$key] = htmlspecialchars($value);
    }
    return $after;
}

?>