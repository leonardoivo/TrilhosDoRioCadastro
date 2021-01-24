<?php
namespace TrilhosDorioCadastro\BL{
use TrilhosDorioCadastro\DAL\{CrudInteressados,CrudOrigemInteressados,CrudTipoPagamento};
use TrilhosDorioCadastro\LO\{InteressadosLO,OrigemInteressadosLO};
class ManterInteressados{


public function CadastrarInteressados($CadInteressadosDTO)
{
  $cadastrar = new CrudInteressados();
   $cadastrar->GravarInteressados($CadInteressadosDTO);
}
public function EditarInteressados($CadInteressados,$id_Interessados){
   $ediInteressados = new CrudInteressados();
   $ediInteressados->AlterarInteressados($CadInteressados,$id_Interessados);

}
public function ExcluirInteressados($idInteressados){

$Excluir = new CrudInteressados();
$Excluir->ExcluirInteressados($idInteressados);
       
}
public function BuscarIDInteressadosInteressadosEmail($email)
{
$ListarInteressados = new CrudInteressados();
$id_Interessados = $ListarInteressados->BuscarIDInteressadosEmail($email);
return $id_Interessados;

}
public function ListarInteressadoss()
{
  $ListarGeral = new CrudInteressados();
  $LlistarGeral = new InteressadosLO();
  $LlistarGeral=$ListarGeral->ListarInteressadoss();
  return $LlistarGeral;

}
public function ListarAsssociadosRecentes()
{
  $ListarGeral = new CrudInteressados();
  $LlistarGeral = new InteressadosLO();
  $LlistarGeral=$ListarGeral->ListarInteressadossUltimos();
  return $LlistarGeral;

}

public function ListarInteressadossComPaginacao($paginaCorrente,$linhasPorPagina)
{
  $ListarGeral = new CrudInteressados();
  $LlistarGeral = new InteressadosLO();
  $LlistarGeral=$ListarGeral->ListarInteressadossComPaginacao($paginaCorrente,$linhasPorPagina);
  return $LlistarGeral;

}

public function ListarTotais(){
$totais=0;
$ListarTotal = new CrudInteressados();
$totais=$ListarTotal->ObterTotalInteressados();
return $totais;
}

public function ConfirmaExistenciaInteressados($nome,$sobrenome){
  $confirma=false;
  $ExisteInteressados = new CrudInteressados();
  $confirma=$ExisteInteressados->ConfirmaExistenciaInteressado($nome,$sobrenome);
  return $confirma;
}


public function ListarInteressados($nomeInteressados){
        $ListarInteressados = new CrudInteressados();
        $LlistarInteressados= new InteressadosLO();
        $LlistarInteressados=$ListarInteressados->BuscarInteressados($nomeInteressados);
      return $LlistarInteressados;

  }

  public function ListarInteressadosPorCPF($cpf){
    $ListarInteressados = new CrudInteressados();
    $LlistarInteressados= new InteressadosLO();
    $LlistarInteressados=$ListarInteressados->BuscarInteressadosCPF($cpf);
  return $LlistarInteressados;

}

public function ListarInteressadosID($id_Interessados){
  $ListarInteressados = new CrudInteressados();
  $LlistarInteressados= new InteressadosLO();
  $LlistarInteressados=$ListarInteressados->BuscarInteressadosPorID($id_Interessados);
return $LlistarInteressados;

}

public function ObterDadosNovoInteressadosEmail($cpf){
  $ListInteressadoss = new InteressadosLO();
  $ListInteressadoss= $this->ListarInteressadosPorCPF($cpf);
  $HtmlEmailParte1=""; 
  $HtmlEmailParte2="";
  $HtmlEmailParte3="";
  $HtmlEmailFinal="";
  $HtmlEmailParte1="<!DOCTYPE html>
  <html><head></head><body><h1>Dados do Interessados</h1><p>Segue os dados no novo Interessados:</p><table>";
foreach ($ListInteressadoss->getInteressadoss()as $Interessados) {   
  $HtmlEmailParte2="<tr><td>
CPF:{$Interessados->cpf}</td></tr>
<tr><td>Nome:{$Interessados->nome}</td><td> Sobrenome: {$Interessados->sobrenome}</td><td> Sexo: {$Interessados->sexo}</td>
</tr>
<tr><td>Endereço:{$Interessados->endereco}</td><td>Numero:{$Interessados->numero}</td><td> Complemento: {$Interessados->complemento}</td><td>CEP:{$Interessados->cep}</td></tr>
<tr><td> Bairro:{$Interessados->Bairro}</td><td>Cidade: {$Interessados->Cidade} </td><td>Estado:{$Interessados->Estado}</td><td>Pais:{$Interessados->pais}</td></tr>
<tr><td>Nome da mãe:{$Interessados->nomePai}</td><td>Nome do pai:{$Interessados->nomePai}</td></tr>
<tr><td>Data de Nascimento: {$Interessados->data_De_nascimento}</td><td> Naturalidade:{$Interessados->naturalidade}</td></tr>
<tr><td>Email:{$Interessados->email}</td><td>Telefone:{$Interessados->telefone}</td></tr>";
  }
  $HtmlEmailParte3="</table></body></html>";

$HtmlEmailFinal=$HtmlEmailParte1.$HtmlEmailParte2.$HtmlEmailParte3;
return $HtmlEmailFinal;
}




public function ObterTotaisTipoMeioPagJson()
{
  $totaisMeiosPag = array(
    'dados' => array(
        'cols' => array(
            array('type' => 'string', 'label' => 'meiosPag'),
            array('type' => 'number', 'label' => 'totais'),
        ),  
        'rows' => array()
    ),
    'config' => array(
        'title' => 'Total de meios de pagamentos',
        'width' => 470,
        'height' => 400
    )
);
  
     $obterTotaisMeiosPag = new CrudTipoPagamento();

     foreach($obterTotaisMeiosPag->ListarTotaisPorMeiosPag() as $linha){
        $totaisMeiosPag['dados']['rows'][] = array('c' => array( array('v' => $linha['meiosPag']),
        array('v' => (int)$linha['totais']) 
        ));


     }
     return $totaisMeiosPag;
    
}



public function ObterInteressesInteressados(){
  $vetorInteresses = array(
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
$listInteressadoss = new InteressadosLO();
$listInteressadoss = $this->ListarInteressadoss();
foreach($listInteressadoss->getInteressados() as $InteressadosInteresses){


  foreach(explode(",",$InteressadosInteresses->interesses) as $interesse){
    switch($interesse){
      case 'Caminhadas e Expedições de pesquisa e reconhecimento ferroviário':
        
       $vetorInteresses['expedicoes'][1]+=1;
           
      break;
     
      case 'Troca de informações e dados ferroviários':
      $vetorInteresses['informacoes'][1]+=1;    
      break;
      
      case 'Leitura de livros e publicações históricas e/ou ferroviárias':
       $vetorInteresses['livrosePublicacoes'][1]+=1;
      
      break;
      case 'Ferromodelismo':
       $vetorInteresses['ferromodelismo'][1]+=1;
      
      break;
      case 'Ações filantrópicas':
       $vetorInteresses['filantropia'][1]+=1;
      
      break;
      case 'Produção de material audiovisual com temática histórico-ferroviária':
       $vetorInteresses['producaoMaterial'][1]+=1;
      

      break;
       case 'Propostas e sugestões de projetos ferroviários e de mobilidade':
         $vetorInteresses['projetos'][1]+=1;
        

       break;
       case 'Propostas e sugestões de preservação e restauração histórico-ferroviária':
         $vetorInteresses['preservacao'][1]+=1;
        
       break;
       case 'Outro':
         $vetorInteresses['outro'][1]+=1;

       break;
      
       default:
         $vetorInteresses['teste'][1]+=1;

       break;


    }
  }
  
  }
   return $vetorInteresses;
}

 }
}

?>