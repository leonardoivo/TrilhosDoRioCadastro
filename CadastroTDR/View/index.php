

<?php
session_start();
$usuario=null;
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
ob_start();
if($usuario>0){
$pagina="<!DOCTYPE html>
<html>
<head>
</head>
<body>
<img src=\"img/titulo01.png\" >
<nav>
<a href=\"Associados.php\">Ver Associados</a>
<a href=\"ListarUsuarios.php\">Usuarios</a>
<a href=\"index.php?saida=1\" onclick='location.replace(\"../login.html\")'>Sair</a>
</nav></body>
</html>";
echo $pagina;

}
else if (!isset($usuario))
{
header("Location:../login.html");
      if (headers_sent())
       {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
       }
}
 if(isset($_REQUEST["saida"]))
{
     while (ob_get_level() > 0) {
        ob_end_clean();
    }
  session_unset();
  session_destroy();
  exit(header("Location:../login.html"));
}
?>