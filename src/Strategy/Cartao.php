<?php

namespace Store\Strategy;

use Store\Domain\Strategy\PagamentoAbstract;

class Cartao extends PagamentoAbstract
{
    private int $dividir;

    public function __construct(float $valor, int $dividir)
    {
        parent::__construct($valor);
        $this->dividir = $dividir;
    }

    public function efetuarPagamento(float $totalAPagar): float
    {
        if ($this->dividir > 9) {
            throw new \DomainException('É possivel dividir apenas 9 vezes no cartão');
        }

        //se a compra for divida 2 a 9 e valor for maior que 200 reais então é sem juros
        //se a compra for didivda em 4 a 9 e o valor for menor que 200 é com juros


        $valorAPagar = $totalAPagar / $this->dividir;

        if ($this->dividir >= 4 && $this->dividir <= 9 && $this->valor < 200) {
            return  $valorAPagar * 0.2;
        }

        return $this->valor - $valorAPagar;
    }
}