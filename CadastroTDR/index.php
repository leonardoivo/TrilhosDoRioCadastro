<?php
include("../config.php");
session_start();
ob_start();
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
if(isset($usuario)){
header("Location:View/index.php");

}else{
		
    header("Location:login.html");
    
    }
    if(isset($_REQUEST["saida"]))
{
     while (ob_get_level() > 0) {
        ob_end_clean();
    }
  session_unset();
  session_destroy();
  exit(header("Location:login.html"));
}
?>