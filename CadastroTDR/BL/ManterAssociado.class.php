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





 }
}

?>