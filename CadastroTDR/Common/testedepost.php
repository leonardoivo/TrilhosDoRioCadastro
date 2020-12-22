<?php
// $content = http_build_query(array(
//     'field1' => 'Value1',
//     'field2' => 'Value2',
//     'field3' => 'Value3',
// ));
$cpf=32;
$content = http_build_query(array(
    'cpf' => $cpf,
));
$context = stream_context_create(array(
    'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($content)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
        'method'  => 'POST',
        'content' => $content,
    )
));

$result = file_get_contents('http://localhost/TrilhosDoRioCadastro/CadastroTDR/View/CadDadosBancarios.php', null, $context);
//$result = file_get_contents('http://localhost:90/TrilhosDoRioCadastro/CadastroTDR/View/CadDadosBancarios.php', false, $context, -1, 40000);
//var_dump($result);
echo $result;

?>