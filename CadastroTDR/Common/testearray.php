<?php
$vetorInteresses1 = array(
'expedicoes'=>array('Caminhadas e Expedições de pesquisa e reconhecimento ferroviário',0),
'informacoes'=>array('Troca de informações e dados ferroviários',0),
'livrosePublicacoes'=>array('Leitura de livros e publicações históricas e/ou ferroviárias',0),
'ferromodelismo'=>array('Ferromodelismo',0),
'filantropia'=>array('Ações filantrópicas',0),
'producaoMaterial'=>array('Produção de material audiovisual com temática histórico-ferroviária',0),
'projetos'=>array('Propostas e sugestões de projetos ferroviários e de mobilidade',0),
'preservacao'=>array('Propostas e sugestões de preservação e restauração histórico-ferroviária',0),
'outro'=>array('Outros',0),
'teste'=>array('TESTE',0)
);
$vetorInteresses2 = array();
array_push($vetorInteresses2,array('Caminhadas e Expedições de pesquisa e reconhecimento ferroviário',0));
array_push($vetorInteresses2,array('Troca de informações e dados ferroviários',0));
array_push($vetorInteresses2,array('Leitura de livros e publicações históricas e/ou ferroviárias',0));
array_push($vetorInteresses2,array('Ferromodelismo',0));
array_push($vetorInteresses2,array('Ações filantrópicas',0));
array_push($vetorInteresses2,array('Produção de material audiovisual com temática histórico-ferroviária',0));
array_push($vetorInteresses2,array('Propostas e sugestões de projetos ferroviários e de mobilidade',0));
array_push($vetorInteresses2,array('Propostas e sugestões de preservação e restauração histórico-ferroviária',0));
array_push($vetorInteresses2,array('Outros',0));
array_push($vetorInteresses2,array('TESTE',0));

$arr = array_keys($vetorInteresses1);
echo "<table border=1>";

for($i=0;count($vetorInteresses1)>$i;$i++){

  $valor= $vetorInteresses1[$arr[$i]];

 echo "<tr><td>".$valor[0]."</td>"."<td>".$valor[1]."</td></tr>";
//   for($j=0;count($valor)>$j;$j++){
//      echo $valor[$j]."<br/>";

//   }
   // echo "<td>".$teste[$arr[$i]]."</td>";
}
 echo "</table>";

//print_r($vetorInteresses1);

// foreach($vetorInteresses1 as $linha){



// }

?>