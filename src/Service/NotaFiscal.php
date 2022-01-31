<?php

namespace Store\Service;

use Ds\Vector;
use Store\Helper\ConverteMoeda;

class NotaFiscal
{
    public function emitirNotaFiscal(Vector $produtos, float $totalPago, string $formaDePagamento)
    {
        echo "\t NOTA FISCAL \n";

        foreach ($produtos as $produto) {
            echo $produto->getNome() . "\t" . 'R$' . ConverteMoeda::paraReal($produto->getPreco()) . PHP_EOL;
            echo PHP_EOL . '------------' . PHP_EOL;
        }

        $formaPagamento = str_replace('Store\\Strategy\\', '', $formaDePagamento);

        echo  'Total: ' . $totalPago . "\t" . 'Forma de pagamento: ' . $formaPagamento . PHP_EOL;
    }
}