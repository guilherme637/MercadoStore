<?php

namespace Store\Domain\Strategy;

interface PagamentoInterface
{
    public function efetuarPagamento(float $totalAPagar): int;
}