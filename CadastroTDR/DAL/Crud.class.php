<?php
namespace TrilhosDorioCadastro\DAL{
use \PDO;
 class Crud extends PDO{

   public      $TipoDatabase='mysql';
   protected   $EnderecoDB='localhost';
   protected   $banco='TrilhosDoRioCadastro';
   protected   $usuariodb='root';
   protected   $senhadb='784512';
  // protected   $senhadb='#NovoCadastroTDR01' TDRCadTeste1  u753388672_TDRCad	u753388672_root;
   protected   $tabela="";
 
  public function __construct()
  {
         try
         {
          parent::__construct($this->TipoDatabase.':host='.$this->EnderecoDB.';dbname='.$this->banco,$this->usuariodb,$this->senhadb);
 
         }
         catch(\PDOException $e)
         {
         echo $e->getMessage();
 
         }
  }

 }
}

?>