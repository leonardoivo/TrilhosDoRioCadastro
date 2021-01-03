

<?php
session_start();
$usuario=null;
$usuario=isset($_SESSION["usuario"])?$_SESSION["usuario"]:null;
ob_start();
if($usuario>0){
$pagina="<!DOCTYPE html>
<html>
<head>

<meta charset=\"utf-8\" />
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" /> 
<!-- CSS-->
<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">
<!--Javascript -->
<script src=\"js/jquery-3.2.1.min.js\"></script>
<script src=\"js/bootstrap.min.js\"></script>

</head>
<body>
<img src=\"img/titulo01.png\" >                          
<nav class=\"navbar navbar-expand-lg  navbar-dark bg-dark\">
  <a class=\"navbar-brand\" href=\"index.php\">Home</a>
  <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navTeste\" aria-controls=\"navTeste\" aria-expanded=\"false\" aria-label=\"Alterna navegação\">
    <span class=\"navbar-toggler-icon\"></span>
  </button>
  <div class=\"collapse navbar-collapse\" id=\"navTeste\">
    <ul class=\"navbar-nav mr-auto\">
      <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"Associados.php\">Ver Associados </a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\"href=\"ListarUsuarios.php\">Usuarios</a>
      </li>
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"index.php?saida=1\" onclick='location.replace(\"../login.html\")'>Sair</a>
      </li>
    </ul>  
  </div>
</nav>

</body>
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