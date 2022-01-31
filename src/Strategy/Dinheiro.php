<?php

namespace Store\Strategy;

use Store\Domain\Strategy\PagamentoAbstract;

class Dinheiro extends PagamentoAbstract
{
    public function __construct(float $valor)
    {
        parent::__construct($valor);
    }

    public function efetuarPagamento(float $totalAPagar): float
    {
        return $this->valor - $totalAPagar;
    }
}