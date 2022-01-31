<?php

namespace Strategy;

use PHPUnit\Framework\TestCase;
use Store\Strategy\Dinheiro;

class DinheiroTest extends TestCase
{
    public function testEfetuarPagamentoDinheiro()
    {
        $dinheiro = new Dinheiro(45);

        $pagamento = $dinheiro->efetuarPagamento(33.21);

        self::assertEquals(11.79, $pagamento);
    }
}