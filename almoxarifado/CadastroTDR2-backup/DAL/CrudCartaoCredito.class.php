<?php
namespace TrilhosDorioCadastro\DAL{
    use TrilhosDorioCadastro\DAL\Crud;
    use TrilhosDorioCadastro\DTO\CartaoCreditoDTO;
    use TrilhosDorioCadastro\LO\CartaoCreditoLO;
    use \ArrayObject;
    use \PDO;
    class CrudCartaoCredito extends Crud{
        public function __construct()
        {
            $this->conexao = new Crud();
           
        }
        public function ListarCartaoCredito(){
    
            $resultado=$this->conexao->query("select * from CartaoCredito");
             $CartaoCredito = new CartaoCreditoLO();
            while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
            {
                 $CartaoCreditoDT= new CartaoCreditoDTO();
                $CartaoCreditoDT->idCartao=$linha['idCartao'];
                $CartaoCreditoDT->bandeira=$linha['bandeira'];
                $CartaoCreditoDT->numeroCartao=$linha['numeroCartao'];
                $CartaoCreditoDT->Titular=$linha['Titular'];
                $CartaoCreditoDT->dataDeValidade=$linha['dataDeValidade'];
                $CartaoCreditoDT->codigo=$linha['codigo'];     
                $CartaoCreditoDT->codigo=$linha['id_associado'];
                $CartaoCredito->add($CartaoCreditoDT);
            }
            return $CartaoCredito;
            }
            public function ListarCartaoCreditoPorId($idCartao){
        
                $resultado=$this->conexao->query("select * from CartaoCredito where idCartaoCredito={$idCartao}");
                 $CartaoCredito = new CartaoCreditoLO();
                while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                {
                    $CartaoCreditoDT= new CartaoCreditoDTO();
                    $CartaoCreditoDT->idCartao=$linha['idCartao'];
                    $CartaoCreditoDT->bandeira=$linha['bandeira'];
                    $CartaoCreditoDT->numeroCartao=$linha['numeroCartao'];
                    $CartaoCreditoDT->Titular=$linha['Titular'];
                    $CartaoCreditoDT->dataDeValidade=$linha['dataDeValidade'];
                    $CartaoCreditoDT->codigo=$linha['codigo']; 
                    $CartaoCreditoDT->codigo=$linha['id_associado'];
                    $CartaoCredito->add($CartaoCreditoDT);
        
                }
                return $CartaoCredito;
                }
                public function ListarCartaoCreditoPorBandeira($bandeira){
        
                    $resultado=$this->conexao->query("select * from CartaoCredito where bandeira={$bandeira}");
                     $CartaoCredito = new CartaoCreditoLO();
                    while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                    {
                        $CartaoCreditoDT= new CartaoCreditoDTO();
                        $CartaoCreditoDT->idCartao=$linha['idCartao'];
                        $CartaoCreditoDT->bandeira=$linha['bandeira'];
                        $CartaoCreditoDT->numeroCartao=$linha['numeroCartao'];
                        $CartaoCreditoDT->Titular=$linha['Titular'];
                        $CartaoCreditoDT->dataDeValidade=$linha['dataDeValidade'];
                        $CartaoCreditoDT->codigo=$linha['codigo'];
                        $CartaoCreditoDT->codigo=$linha['id_associado'];
                        $CartaoCredito->add($CartaoCreditoDT);
            
                    }
                    return $CartaoCredito;
                    }
                
                    public function ListarCartaoCreditoPorAssociado($id_associado){
        
                        $resultado=$this->conexao->query("select * from CartaoCredito where id_associado={$id_associado}");
                         $CartaoCredito = new CartaoCreditoLO();
                        while($linha=$resultado->fetch(PDO::FETCH_ASSOC))
                        {
                            $CartaoCreditoDT= new CartaoCreditoDTO();
                            $CartaoCreditoDT->idCartao=$linha['idCartao'];
                            $CartaoCreditoDT->bandeira=$linha['bandeira'];
                            $CartaoCreditoDT->numeroCartao=$linha['numeroCartao'];
                            $CartaoCreditoDT->Titular=$linha['Titular'];
                            $CartaoCreditoDT->dataDeValidade=$linha['dataDeValidade'];
                            $CartaoCreditoDT->codigo=$linha['codigo'];
                            $CartaoCreditoDT->codigo=$linha['id_associado'];
                            $CartaoCredito->add($CartaoCreditoDT);
                
                        }
                        return $CartaoCredito;
                        }
                    
        
        public function GravarCartaoCredito(CartaoCreditoDTO $CartaoCreditoDT)
        {
        $this->efetivar=$this->conexao->prepare("INSERT INTO CartaoCredito(bandeira,numeroCartao,Titular,dataDeValidade,codigo,id_associado) VALUES  (:bandeira,:numeroCartao,:Titular,:dataDeValidade,:codigo,:id_associado)");
        $this->efetivar->bindValue("bandeira",$CartaoCreditoDT->bandeira);
        $this->efetivar->bindValue("numeroCartao",$CartaoCreditoDT->numeroCartao);
        $this->efetivar->bindValue("Titular",$CartaoCreditoDT->Titular);
        $this->efetivar->bindValue("dataDeValidade",$CartaoCreditoDT->dataDeValidade);
        $this->efetivar->bindValue("codigo",$CartaoCreditoDT->codigo);     
        $this->efetivar->bindValue("id_associado",$CartaoCreditoDT->id_associado);     

        $this->efetivar->execute();
        echo "\nPDOStatement::errorInfo():\n";
        $arr = $this->efetivar->errorInfo();
        print_r($arr);
        
        }
        
        public function AlterarCartaoCredito($idCartao,CartaoCreditoDTO $CartaoCreditoDT){
            $this->efetivar=$this->conexao->prepare("UPDATE CartaoCredito SET bandeira=:bandeira,numeroCartao=:numeroCartao,Titular=:Titular,dataDeValidade=:dataDeValidade,codigo=:codigo,id_associado=:id_associado WHERE idCartao=:idCartao");
            $this->efetivar->bindValue("idCartaoCredito",$idCartao);
            $this->efetivar->bindValue("bandeira",$CartaoCreditoDT->bandeira);
            $this->efetivar->bindValue("numeroCartao",$CartaoCreditoDT->numeroCartao);
            $this->efetivar->bindValue("Titular",$CartaoCreditoDT->Titular);
            $this->efetivar->bindValue("dataDeValidade",$CartaoCreditoDT->dataDeValidade);
            $this->efetivar->bindValue("codigo",$CartaoCreditoDT->codigo);
            $this->efetivar->bindValue("id_associado",$CartaoCreditoDT->id_associado);     
            $this->efetivar->execute();
            echo "\nPDOStatement::errorInfo():\n";
            $arr = $this->efetivar->errorInfo();
            print_r($arr);
        
        }
        
        public function ExcluirCartaoCredito($idCartao){
        
            $this->efetivar=$this->conexao->prepare("delete from  CartaoCredito where idCartao=?");
            $this->efetivar->bindValue(1,$idCartao);
            $this->efetivar->execute();
        
        
        }




    }

}

?>