<?php
namespace TrilhosDorioCadastro\BL{

use TrilhosDorioCadastro\DAL\{CrudConta,CrudBanco,CrudAgenciaBancaria,CrudCartaoCredito,CrudCadastroAssociado,CrudTipoPagamento};
use TrilhosDorioCadastro\DTO\{BancoDTO,AgenciaBancariaDTO,ContaDTO,CartaoCreditoDTO,CadastroAssociadoDTO,TipoPagamentoDTO,DadoBancarioJV_DTO};
use TrilhosDorioCadastro\LO\{BancoLO,AgenciaBancariaLO,ContaLO,CartaoCreditoLO,CadastroAssociadoLO, TipoPagamentoLO,DadoBancarioJV_LO};

class ManterPagamento{
private $idbanco;
private $nomebanco;
private $codigobancario;
private $nomeagencia; 
private $numeroagencia;
private $tipoconta; 
private $numeroconta; 
private $digitoconta; 
private $id_associado;    
private $bandeira;
private $numeroCartao;
private $Titular;
private $dataDeValidade; 
private $codigo;
private $idTipoPagamento; 



public function __construct()
{
    $arguments = func_get_args();
    $numberOfArguments = func_num_args();

    if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
        call_user_func_array(array($this, $function), $arguments);
    }
}

    public function __construct10($id_associado,$idTipoPagamento,$idbanco,$nomebanco,$codigobancario,$nomeagencia,$numeroagencia,$tipoconta,$numeroconta,$digitoconta)
    {
        $this->idbanco=$idbanco;
        $this->nomebanco=$nomebanco;
        $this->codigobancario=$codigobancario;
        $this->nomeagencia=$nomeagencia; 
        $this->numeroagencia=$numeroagencia;
        $this->tipoconta=$tipoconta; 
        $this->numeroconta=$numeroagencia; 
        $this->digitoconta=$digitoconta; 
        $this->id_associado=$id_associado;
        $this->idTipoPagamento=$idTipoPagamento; 
    }
   
    public function __construct3($id_associado,$idTipoPagamento,CartaoCreditoDTO $CartaoDTO)
    {
        $this->id_associado=$id_associado;
        $this->bandeira=$CartaoDTO->bandeira;
        $this->numeroCartao=$CartaoDTO->numeroCartao;
        $this->Titular=$CartaoDTO->Titular;
        $this->dataDeValidade=$CartaoDTO->dataDeValidade; 
        $this->codigo=$CartaoDTO->codigo;
        $this->idTipoPagamento=$idTipoPagamento; 
        
    }
   
    public function __construct4($id_associado,$idTipoPagamento, ContaDTO $ContaDTO, AgenciaBancariaDTO $AgenciaDTO)
    {
       
        $this->idbanco=$AgenciaDTO->idbanco;
        $this->nomeagencia=$AgenciaDTO->nomeagencia; 
        $this->numeroagencia=$AgenciaDTO->numeroagencia;
        $this->tipoconta=$ContaDTO->tipoconta; 
        $this->numeroconta=$ContaDTO->numeroconta; 
        $this->digitoconta=$ContaDTO->digitoconta; 
        $this->id_associado=$id_associado;
        $this->idTipoPagamento=$idTipoPagamento;    
     }

    

function CadastarBanco($BancoDTO){
$Banco  = new CrudBanco();
$Banco->GravarBanco($BancoDTO);

}

function EditarBanco($BancoDTO,$idbanco){
    $Banco  = new CrudBanco();
    $Banco->AlterarBanco($BancoDTO,$idbanco);

}

function BuscarBanco($buscar){
   $ListBanco = new BancoLO();
   $Banco  = new CrudBanco();
   $ListBanco = $Banco->ListaBanco($buscar);
   return $ListBanco;
}

function BuscarBancoLinha($idbanco){
    $ListBanco = new BancoLO();
    $Banco  = new CrudBanco();
    $ListBanco = $Banco->ListaBancoPorID($idbanco);
    return $ListBanco;

}

function ExcluirBanco($idbanco){
    $Banco  = new CrudBanco();
    $Banco->ExcluirBanco($idbanco);


}

function CadastarConta($ContaDTO){
 $Conta = new CrudConta();
 $Conta->GravarConta($ContaDTO);

}
function EditarConta($idconta,ContaDTO $Conta){

    $ContaDAL = new CrudConta();
    $ContaDAL->AlterarConta($Conta,$idconta);

}
function BuscarContaPorLinha($idconta){
    $ContaDAL = new CrudConta();
    $ContaDAL->ListarContaPorId($idconta);


}
function ExcluirConta($idconta){
    $ContaDAL = new CrudConta();
    $ContaDAL->ExcluirConta($idconta);

}

function CadastarAgencia(AgenciaBancariaDTO  $agenciaDTO){
$agencia = new CrudAgenciaBancaria();
$agencia->GravarAgenciaBancaria($agenciaDTO);
}
function EditarAgencia($idagencia,AgenciaBancariaDTO $agenciaDTO){
$agencia = new CrudAgenciaBancaria();
$agencia->GravarAgenciaBancaria($agenciaDTO);
}
function BuscarAgencia($buscar){
    $agencia = new CrudAgenciaBancaria();
    $Lagencia = new AgenciaBancariaLO();
    $Lagencia = $agencia->ListarAgenciaBancariaPorNome($buscar);
    return $Lagencia;
}
function ExcluirAgencia($idagencia){
$agencia = new CrudAgenciaBancaria();
$agencia->ExcluirAgenciaBancaria($idagencia);

}

function CadastarCartao(CartaoCreditoDTO $cartao){
$cartaoCred = new CrudCartaoCredito();
$cartaoCred->GravarCartaoCredito($cartao);

}
function EditarCartao($idcartao,CartaoCreditoDTO $cartaoDTO){
$cartaoCred = new CrudCartaoCredito();
$cartaoCred->AlterarCartaoCredito($idcartao,$cartaoDTO);

}
function BuscarCartaoID($idcartao){
    $CartaoCred = new CrudCartaoCredito();
    $LCartaoCred = new CartaoCreditoLO();
    $LCartaoCred= $CartaoCred->ListarCartaoCreditoPorId($idcartao);

    return $LCartaoCred;
}

function BuscarCartaoPorAssociado($id_associado){
    $CartaoCred = new CrudCartaoCredito();
    $LCartaoCred = new CartaoCreditoLO();
    $LCartaoCred= $CartaoCred->ListarCartaoCreditoPorAssociado($id_associado);
    return $LCartaoCred;
}
function BuscarCartaoPorBandeira($bandeira){
    $CartaoCred = new CrudCartaoCredito();
    $LCartaoCred = new CartaoCreditoLO();
    $LCartaoCred= $CartaoCred->ListarCartaoCreditoPorBandeira($bandeira);
    
    return $LCartaoCred;
}

function ExcluirCartao($idcartao){
$CartaoCred = new CrudCartaoCredito();
$CartaoCred->ExcluirCartaoCredito($idcartao);
}

public function CadastraTipoPagamento(TipoPagamentoDTO $tipopagamento){
$cadTipoPagamento = new CrudTipoPagamento();
$cadTipoPagamento->GravarTipoPagamento($tipopagamento);


}

public function ListarTiposPagamentos(){
$TipoPagamentos= new CrudTipoPagamento();
$ListTipoPagamento = new TipoPagamentoLO();
$ListTipoPagamento= $TipoPagamentos->ListarTipoPagamento();
return $ListTipoPagamento;
}

function ListarTodosOsBancos(){
    $ListBanco = new BancoLO();
    $Banco  = new CrudBanco();
    $ListBanco = $Banco->ListarBancos();
    return $ListBanco;
 }


public function ListarTiposPagamentosPorID($idtipopagamento){
    $TipoPagamentos= new CrudTipoPagamento();
    $ListTipoPagamento = new TipoPagamentoLO();
    $ListTipoPagamento= $TipoPagamentos->ListarTipoPagamento();
    return $ListTipoPagamento;
    }
    
 public function ListarDadosBancariosPorID($id_associado){
   $dadoBancario = new CrudConta();
   $ListDadosBancarios = new DadoBancarioJV_LO();
   $ListDadosBancarios= $dadoBancario->ListarDadosBancarios($id_associado);
   return $ListDadosBancarios;
 }


public function CadastrarDadosPagamento($tipopagamento){
     switch($tipopagamento){

  case 1:
    //    $BancoDTO = new BancoDTO();
    //    $BancoDTO->nomebanco=$this->nomebanco;
    //    $BancoDTO->codigobancario=$this->codigobancario;
    //    $this->CadastarBanco($BancoDTO);

       $agenciaDTO = new AgenciaBancariaDTO();
       $agenciaDTO->idbanco=$this->idbanco;
       $agenciaDTO->nomeagencia=$this->nomeagencia; 
       $agenciaDTO->numeroagencia=$this->numeroagencia;
       $this->CadastarAgencia($agenciaDTO);
       $agencia = new CrudAgenciaBancaria();

       $ContaDTO = new ContaDTO();
       $ContaDTO->tipoconta=$this->tipoconta;
       $ContaDTO->idagencia=$agencia->ListarAgenciaBancariaPorNumero($this->numeroagencia);
       $ContaDTO->numeroconta=$this->numeroconta;
       $ContaDTO->digitoconta=$this->digitoconta; 
       $ContaDTO->id_associado=$this->id_associado;
       $this->CadastarConta($ContaDTO);
       break;
  case 2:
       $CartaoCred= new CartaoCreditoDTO();
       $CartaoCred->id_associado=$this->id_associado;
       $CartaoCred->bandeira=$this->bandeira;
       $CartaoCred->numeroCartao=$this->numeroCartao;
       $CartaoCred->Titular=$this->Titular;
       $CartaoCred->dataDeValidade=$this->dataDeValidade; 
       $CartaoCred->codigo=$this->codigo;
       $CartaoCred->idTipoPagamento=$this->idTipoPagamento;
       $this->CadastarCartao($CartaoCred); 
  break;
  case 'Boleto':

        break;

      }


    }

  }
}

?>