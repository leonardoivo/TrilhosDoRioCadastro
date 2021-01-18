<?php
use TrilhosDorioCadastro\BL\{ManterAssociado as ManterBL};
require '../StartLoader/autoloader.php';
$AssociadosLt = new ManterBL();
$Meiospag=$AssociadosLt->ObterTotaisTipoMeioPagJson();

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($Meiospag);
exit(0);

?>