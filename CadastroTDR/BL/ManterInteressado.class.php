<?php

namespace TrilhosDorioCadastro\BL {

  use TrilhosDorioCadastro\DAL\{CrudInteressados, CrudOrigemInteressados, CrudTipoPagamento};
  use TrilhosDorioCadastro\LO\{InteressadosLO, OrigemInteressadosLO};

  class ManterInteressado
  {


    public function CadastrarInteressados($CadInteressadosDTO)
    {
      $cadastrar = new CrudInteressados();
      $cadastrar->GravarInteressados($CadInteressadosDTO);
    }
    public function EditarInteressados($CadInteressados, $id_Interessados)
    {
      $ediInteressados = new CrudInteressados();
      $ediInteressados->AlterarInteressados($CadInteressados, $id_Interessados);
    }
    public function ExcluirInteressados($idInteressados)
    {

      $Excluir = new CrudInteressados();
      $Excluir->ExcluirInteressados($idInteressados);
    }
    public function BuscarIDInteressadosInteressadosEmail($email)
    {
      $ListarInteressados = new CrudInteressados();
      $id_Interessados = $ListarInteressados->BuscarIDInteressadosEmail($email);
      return $id_Interessados;
    }
    public function ListarInteressados()
    {
      $ListarGeral = new CrudInteressados();
      $LlistarGeral = new InteressadosLO();
      $LlistarGeral = $ListarGeral->ListarInteressados();
      return $LlistarGeral;
    }
    public function ListarInteressadosPorNome($nomeInteressado)
    {
      $ListarInteressados = new CrudInteressados();
      $LlistarInteressados = new InteressadosLO();
      $LlistarInteressados = $ListarInteressados->BuscarInteressados($nomeInteressado);
      return $LlistarInteressados;
    }
    public function ListarInteressadosRecentes()
    {
      $ListarGeral = new CrudInteressados();
      $LlistarGeral = new InteressadosLO();
      $LlistarGeral = $ListarGeral->ListarInteressadosUltimos();
      return $LlistarGeral;
    }

    public function ListarInteressadosComPaginacao($paginaCorrente, $linhasPorPagina)
    {
      $ListarGeral = new CrudInteressados();
      $LlistarGeral = new InteressadosLO();
      $LlistarGeral = $ListarGeral->ListarInteressadosComPaginacao($paginaCorrente, $linhasPorPagina);
      return $LlistarGeral;
    }

    public function ListarTotais()
    {
      $totais = 0;
      $ListarTotal = new CrudInteressados();
      $totais = $ListarTotal->ObterTotalInteressados();
      return $totais;
    }

    public function ConfirmaExistenciaInteressados($nome, $sobrenome)
    {
      $confirma = false;
      $ExisteInteressados = new CrudInteressados();
      $confirma = $ExisteInteressados->ConfirmaExistenciaInteressado($nome, $sobrenome);
      return $confirma;
    }


    public function ListarInteressadoss($nomeInteressados)
    {
      $ListarInteressados = new CrudInteressados();
      $LlistarInteressados = new InteressadosLO();
      $LlistarInteressados = $ListarInteressados->BuscarInteressados($nomeInteressados);
      return $LlistarInteressados;
    }

    public function ListarInteressadosPorEmail($email)
    {
      $ListarInteressados = new CrudInteressados();
      $LlistarInteressados = new InteressadosLO();
      $LlistarInteressados = $ListarInteressados->BuscarInteressadosEmail($email);
      return $LlistarInteressados;
    }


    public function ListarInteressadosPorNomeSobrenome($nome, $sobrenome)
    {
      $ListarInteressados = new CrudInteressados();
      $LlistarInteressados = new InteressadosLO();
      $LlistarInteressados = $ListarInteressados->BuscarInteressadosNomeSobrenome($nome, $sobrenome);
      return $LlistarInteressados;
    }

    public function ListarInteressadosID($id_Interessados)
    {
      $ListarInteressados = new CrudInteressados();
      $LlistarInteressados = new InteressadosLO();
      $LlistarInteressados = $ListarInteressados->BuscarInteressadosPorID($id_Interessados);
      return $LlistarInteressados;
    }

    public function ObterDadosNovoInteressadosNomeSobrenome($nome, $sobrenome)
    {
      $ListInteressados = new InteressadosLO();
      $ListInteressados = $this->ListarInteressadosPorNomeSobrenome($nome, $sobrenome);
      $HtmlEmailParte1 = "";
      $HtmlEmailParte2 = "";
      $HtmlEmailParte3 = "";
      $HtmlEmailFinal = "";
      $HtmlEmailParte1 = "<!DOCTYPE html>
  <html><head></head><body><h1>Dados do Interessado</h1><p>Segue os dados no novo Interessado:</p><table>";
      foreach ($ListInteressados->getInteressados() as $Interessados) {
        $HtmlEmailParte2 = "
<tr><td>Nome:{$Interessados->nome}</td><td> Sobrenome: {$Interessados->sobrenome}</td></tr>
<tr><td>Email:{$Interessados->email}</td><td>Telefone:{$Interessados->telefone}</td></tr>";
      }
      $HtmlEmailParte3 = "</table></body></html>";

      $HtmlEmailFinal = $HtmlEmailParte1 . $HtmlEmailParte2 . $HtmlEmailParte3;
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

      foreach ($obterTotaisMeiosPag->ListarTotaisPorMeiosPag() as $linha) {
        $totaisMeiosPag['dados']['rows'][] = array('c' => array(
          array('v' => $linha['meiosPag']),
          array('v' => (int)$linha['totais'])
        ));
      }
      return $totaisMeiosPag;
    }



    public function ObterInteressesDosInteressados()
    {
      $vetorInteresses = array(
        'expedicoes' => array('Caminhadas e Expedições de pesquisa e reconhecimento ferroviário', 0),
        'informacoes' => array('Troca de informações e dados ferroviários', 0),
        'livrosePublicacoes' => array('Leitura de livros e publicações históricas e/ou ferroviárias', 0),
        'ferromodelismo' => array('Ferromodelismo', 0),
        'filantropia' => array('Ações filantrópicas', 0),
        'producaoMaterial' => array('Produção de material audiovisual com temática histórico-ferroviária', 0),
        'projetos' => array('Propostas e sugestões de projetos ferroviários e de mobilidade', 0),
        'preservacao' => array('Propostas e sugestões de preservação e restauração histórico-ferroviária', 0),
        'outro' => array('Outros', 0),
        'teste' => array('TESTE', 0)
      );
      $listInteressadoss = new InteressadosLO();
      $listInteressadoss = $this->ListarInteressados();
      foreach ($listInteressadoss->getInteressados() as $InteressadosInteresses) {


        foreach (explode(",", $InteressadosInteresses->interesses) as $interesse) {
          switch ($interesse) {
            case 'Caminhadas e Expedições de pesquisa e reconhecimento ferroviário':

              $vetorInteresses['expedicoes'][1] += 1;

              break;

            case 'Troca de informações e dados ferroviários':
              $vetorInteresses['informacoes'][1] += 1;
              break;

            case 'Leitura de livros e publicações históricas e/ou ferroviárias':
              $vetorInteresses['livrosePublicacoes'][1] += 1;

              break;
            case 'Ferromodelismo':
              $vetorInteresses['ferromodelismo'][1] += 1;

              break;
            case 'Ações filantrópicas':
              $vetorInteresses['filantropia'][1] += 1;

              break;
            case 'Produção de material audiovisual com temática histórico-ferroviária':
              $vetorInteresses['producaoMaterial'][1] += 1;


              break;
            case 'Propostas e sugestões de projetos ferroviários e de mobilidade':
              $vetorInteresses['projetos'][1] += 1;


              break;
            case 'Propostas e sugestões de preservação e restauração histórico-ferroviária':
              $vetorInteresses['preservacao'][1] += 1;

              break;
            case 'Outro':
              $vetorInteresses['outro'][1] += 1;

              break;

            default:
              $vetorInteresses['teste'][1] += 1;

              break;
          }
        }
      }
      return $vetorInteresses;
    }
  }
}
