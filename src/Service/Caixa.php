<?php

namespace Store\Service;

use Store\Domain\Strategy\PagamentoInterface;
use Store\Entity\Carrinho;
use Store\Helper\ConverteMoeda;
use Store\Strategy\Dinheiro;

class Caixa
{
    private Carrinho $carrinho;
    private NotaFiscal $notaFiscal;
    private float $totalAPagar;

    public function __construct(Carrinho $carrinho)
    {
        $this->carrinho = $carrinho;
        $this->notaFiscal = new NotaFiscal();
    }

    public function calcularCompra()
    {
        $produtos = $this->carrinho->getProdutos();

        if ($produtos->isEmpty()) {
            throw new \DomainException('Carrinnho está vazio.');
        }

        foreach ($produtos->toArray() as $produto) {
            echo '------------------------------------------------' . PHP_EOL;
            echo PHP_EOL . $produto->getNome() . "\t" . 'R$' . ConverteMoeda::paraReal($produto->getPreco()) . PHP_EOL;
            echo PHP_EOL . '------------------------------------------------' . PHP_EOL;
        }

        $total = $produtos->map(function ($produtos) {
            return $produtos->getPreco();
        });

        $this->totalAPagar = $total->sum();

        echo 'Total: ' . 'R$' . ConverteMoeda::paraReal($total->sum()) . PHP_EOL;
    }

    public function pagamento(PagamentoInterface $formaDePagamento)
    {
        $pagamento = $formaDePagamento->efetuarPagamento($this->totalAPagar);

        if ($pagamento < 0 && $formaDePagamento instanceof Dinheiro) {
            return 'Total a pagar: ' . $pagamento;
        }

        echo "\n PAGAMENTO EFETUADO COM SUCESSO \n\n";

        $this->notaFiscal->emitirNotaFiscal(
            $this->carrinho->getProdutos(),
            $this->totalAPagar,
            get_class($formaDePagamento)
        );
    }
}