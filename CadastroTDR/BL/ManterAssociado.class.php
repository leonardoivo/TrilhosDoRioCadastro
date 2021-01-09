<?php
namespace TrilhosDorioCadastro\BL{
use TrilhosDorioCadastro\DAL\{CrudCadastroAssociado,CrudOrigemAssociado};
use TrilhosDorioCadastro\LO\{CadastroAssociadoLO,OrigemAssociadoLO};
class ManterAssociado{


public function CadastrarAssociado($CadAssociadoDTO)
{
  $cadastrar = new CrudCadastroAssociado();
   $cadastrar->GravarCadastroAssociado($CadAssociadoDTO);
}
public function EditarAssociado($CadAssociado,$id_associado){
   $ediAssociado = new CrudCadastroAssociado();
   $ediAssociado->AlterarCadastroAssociado($CadAssociado,$id_associado);

}
public function ExcluirAssociado($idassociado){

$Excluir = new CrudCadastroAssociado();
$Excluir->ExcluirCadastroAssociado($idassociado);
       
}
public function BuscarIDAssociadoCPF($cpf)
{
$ListarAssociado = new CrudCadastroAssociado();
$id_associado = $ListarAssociado->BuscarIDAssociadoCPF($cpf);
return $id_associado;

}
public function ListarAssociados()
{
  $ListarGeral = new CrudCadastroAssociado();
  $LlistarGeral = new CadastroAssociadoLO();
  $LlistarGeral=$ListarGeral->ListarCadastroAssociados();
  return $LlistarGeral;

}
public function ListarAsssociadosRecentes()
{
  $ListarGeral = new CrudCadastroAssociado();
  $LlistarGeral = new CadastroAssociadoLO();
  $LlistarGeral=$ListarGeral->ListarCadastroAssociadosUltimos();
  return $LlistarGeral;

}

public function ListarAssociadosComPaginacao($paginaCorrente,$linhasPorPagina)
{
  $ListarGeral = new CrudCadastroAssociado();
  $LlistarGeral = new CadastroAssociadoLO();
  $LlistarGeral=$ListarGeral->ListarCadastroAssociadosComPaginacao($paginaCorrente,$linhasPorPagina);
  return $LlistarGeral;

}

public function ListarTotais(){
$totais=0;
$ListarTotal = new CrudCadastroAssociado();
$totais=$ListarTotal->ObterTotalAssociados();
return $totais;
}

public function ConfirmaExistenciaAssociado($cpf){
  $confirma=false;
  $ExisteAssociado = new CrudCadastroAssociado();
  $confirma=$ExisteAssociado->ConfirmaExistenciaUsuario($cpf);
  return $confirma;
}


public function ListarAssociado($nomeassociado){
        $ListarAssociado = new CrudCadastroAssociado();
        $LlistarAssociado= new CadastroAssociadoLO();
        $LlistarAssociado=$ListarAssociado->BuscarAssociado($nomeassociado);
      return $LlistarAssociado;

  }

  public function ListarAssociadoPorCPF($cpf){
    $ListarAssociado = new CrudCadastroAssociado();
    $LlistarAssociado= new CadastroAssociadoLO();
    $LlistarAssociado=$ListarAssociado->BuscarAssociadoCPF($cpf);
  return $LlistarAssociado;

}

public function ListarAssociadoID($id_associado){
  $ListarAssociado = new CrudCadastroAssociado();
  $LlistarAssociado= new CadastroAssociadoLO();
  $LlistarAssociado=$ListarAssociado->BuscarAssociadoPorID($id_associado);
return $LlistarAssociado;

}

public function ObterDadosNovoAssociadoEmail($cpf){
  $ListAssociados = new CadastroAssociadoLO();
  $ListAssociados= $this->ListarAssociadoPorCPF($cpf);
  $HtmlEmailParte1=""; 
  $HtmlEmailParte2="";
  $HtmlEmailParte3="";
  $HtmlEmailFinal="";
  $HtmlEmailParte1="<!DOCTYPE html>
  <html><head></head><body><h1>Dados do Associado</h1><p>Segue os dados no novo associado:</p><table>";
foreach ($ListAssociados->getCadastroAssociados()as $associado) {   
  $HtmlEmailParte2="<tr><td>
CPF:{$associado->cpf}</td></tr>
<tr><td>Nome:{$associado->nome}</td><td> Sobrenome: {$associado->sobrenome}</td></tr>
<tr><td>Endereço:{$associado->endereco}</td><td>Numero:{$associado->numero}</td><td> Complemento: {$associado->complemento}</td><td>CEP:{$associado->cep}</td></tr>
<tr><td> Bairro:{$associado->Bairro}</td><td>Cidade: {$associado->Cidade} </td><td>Estado:{$associado->Estado}</td><td>Pais:{$associado->pais}</td></tr>
<tr><td>Nome da mãe:{$associado->nomePai}</td><td>Nome do pai:{$associado->nomePai}</td></tr>
<tr><td>Data de Nascimento: {$associado->data_De_nascimento}</td><td> Naturalidade:{$associado->naturalidade}</td></tr>
<tr><td>Email:{$associado->email}</td><td>Telefone:{$associado->complemento}</td></tr>";
  }
  $HtmlEmailParte3="</table></body></html>";

$HtmlEmailFinal=$HtmlEmailParte1.$HtmlEmailParte2.$HtmlEmailParte3;
return $HtmlEmailFinal;
}

 }
}

?>