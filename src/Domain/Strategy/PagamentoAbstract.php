<?php

namespace Store\Domain\Strategy;

abstract class PagamentoAbstract implements PagamentoInterface
{
    protected float $valor;

    public function __construct(float $valor)
    {
        $this->valor = $valor;
    }
}