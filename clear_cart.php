<?php
$_SESSION = array();
if (isset($_COOKIE[session_name()]) === true)
{
    setcookie(session_name(),'', time() -42000, '/');
}
@session_destroy();

echo "<script type='text/javascript'>alert('カートを空にしました。'); window.history.back();</script>";

?>
