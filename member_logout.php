<?php
$_SESSION = array();
if (isset($_COOKIE[session_name()]) === true)
{
    setcookie(session_name(),'', time() -42000, '/');
}
@session_destroy();
require 't_member_logout.php';
?>
