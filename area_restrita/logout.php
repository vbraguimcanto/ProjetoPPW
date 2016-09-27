<?php
	session_start('verificaUsuario');
    ob_start();
    if(!isset($_SESSION['cpfUser']) && !isset($_SESSION['senhaUser'])){
    	$redirect = "index.php";
    	header("location:$redirect");
    }
    else{
    	session_destroy();
    	session_unset(['cpfUser']);
    	session_unset(['senhaUser']);
    	$redirect = "index.php";
    	header("location:$redirect");
    }
?>