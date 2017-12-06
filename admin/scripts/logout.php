<?php
    session_start();
	session_unset();
	header('Location: /promnik/admin/index.php');
?>