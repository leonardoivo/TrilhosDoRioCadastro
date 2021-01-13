<?php
namespace TrilhosDorioCadastro\DAL{
use \PDO;
 class Crud extends PDO{
     public      $TipoDatabase='mysql';
     protected   $EnderecoDB='localhost';
     protected   $banco='TrilhosDoRioCadastro';
     protected   $usuariodb='root';
     protected   $senhadb='784512';
     protected   $tabela="";

//      public      $TipoDatabase='mysql';
//      protected   $EnderecoDB='localhost';
//      protected   $banco='trilh781_CadastroTDR';
  //   protected   $usuariodb='trilh781_cadtdr';
//      protected   $senhadb='PiiLu1dRRLXbWoB7';
//      protected   $tabela="";

//   public      $TipoDatabase='mysql';
//   protected   $EnderecoDB='localhost';
//   protected   $banco='u753388672_TDRCad';
//   protected   $usuariodb='u753388672_root';
//   protected   $senhadb='TDRCadTeste1';
//   protected   $tabela="";
 
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