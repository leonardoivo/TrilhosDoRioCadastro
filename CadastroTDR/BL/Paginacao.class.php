<?php

namespace TrilhosDorioCadastro\BL {



    class Paginacao 
    {
        public $totalLinhas;
        public $linhasPorPagina;
        public $paginaCorrente;
        public $totalPagina;
        public $incremento;
        public $decremento;
        public $avanco;
        public $retorno;
        public $paginaAtual;
        public $numero_pagina;


        public function ObterPaginaCorrente($linhasPorPagina, $numero_pagina)
        {

            $this->paginaCorrente = ($linhasPorPagina * $numero_pagina) - $linhasPorPagina;

            return $this->paginaCorrente;
        }
        public function ObterTotalDePaginas($TotalLinhas, $linhasPorPagina)
        {

            $this->totalPagina = ceil($TotalLinhas / $linhasPorPagina);
            return $this->totalPagina;
        }

        public function incremento()
        {
            $this->incremento = $this->numero_pagina + 1;
        }
        public function decremento()
        {
            $this->decremento = $this->numero_pagina - 1;
        }
        public function Avancar()
        {
            $this->avanco = ($this->incremento > $this->totalPaginas) ? 1 : $this->incremento;
        }
        public function Retornar()
        {
            $this->retorno = (1 > $this->decremento) ? 1 : $this->decremento;
        }
    }
}
