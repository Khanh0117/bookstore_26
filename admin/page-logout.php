<?php
session_start();
unset( $_SESSION[ 'usernameadmin' ] );
header('location: page-login.php');
?>