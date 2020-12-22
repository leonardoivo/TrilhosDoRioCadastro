<?php

  
define('WWW_ROOT',dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
require_once(WWW_ROOT.DS.'autoloader.php');
use FG\BL\{TextoJornalistico as texto,Entrevista as Conversa,Secao};
//use \ArrayObject;

//use FG\DAL\CrudSecao;



$texto = new texto();

$texto->setTitulo("Eu sou burro<br/>");
echo $texto->GetTitulo();
$NovaEntrevista = new Conversa();
$NovaEntrevista->setTitulo("Eu nao sou burro<br/>");
echo $NovaEntrevista->GetTitulo();
//$conectar = new Crud();
//$conectar->imprimir();

echo("--------teste de gravação<br/>");


$dado = new Secao();
$dado->CriarSecao("test2");
$dado->ListarSecao();




echo("--------fim teste de gravação <br/>");

//$dado = new CrudSecao();
//$dado->GravarSecao("test2");
//$dado->ListarSecao();



$cabecalhoinsert="insert into TextoJornalistico (";
$valores= "values (";
$campos = array("idtextojor"=>"1", "texto"=>"2", "datapublicacao"=>"3", "idusuario"=>"4", "autor"=>"5", "id_secao"=>"6", "idcoluna"=>"7", "idtipotexto"=>"8", "titulo"=>"9", "subtitulo"=>"10");
//$numcampos= count($campos);

foreach($campos as $key=>$value)
{
  $cabecalhoinsert.= $key.",";
}

$totalcb=strlen($cabecalhoinsert);
$cabecalho=substr($cabecalhoinsert,0,$totalcb-1);
$cabecalho.=")";

foreach($campos as $key=>$value)
{
    $valores .= $campos[$key].',';
}
echo "<br/>";
$totalIn=strlen($valores);
$entradas=substr($valores,0,$totalIn-1);
$entradas.=")";

$resutante = $cabecalho.$entradas;
echo $resutante;








//echo $inserir;




?>