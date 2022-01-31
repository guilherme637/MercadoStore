<?php

namespace Strategy;

use Store\Entity\Carrinho;
use Store\Entity\Produto;
use Store\Service\Caixa;
use Store\Strategy\Cartao;
use PHPUnit\Framework\TestCase;

class CartaoTest extends TestCase
{
    private Cartao $cartao;

    protected function setUp(): void
    {
        $this->cartao = new Cartao(45, 1);
    }

    public function testEfetuarPagamentoCartaoSemJuros()
    {
        $pagamento = $this->cartao->efetuarPagamento(33.21);

        self::assertEquals(11.79, $pagamento);
    }

    public function testEfetuarPagamentoCartaoComJuros()
    {
        $pagamento = $this->cartao->efetuarPagamento(33.21);

        self::assertEquals(11.79, $pagamento);
    }

    public function testEfetuarPagamentoCartaoUltrapassandoLimiteParaDividir()
    {
        $carrinho = new Carrinho();

        $carrinho
            ->addProduto(new Produto('Arroz', 5.50))
            ->addProduto(new Produto('Feijão', 4.50))
            ->addProduto(new Produto('Óleo', 4.10))
            ->addProduto(new Produto('Açucar', 7.11))
            ->addProduto(new Produto('Farinha', 2.50))
            ->addProduto(new Produto('Macarrão', 9.50));

        $caixa = new Caixa($carrinho);

        $caixa->calcularCompra();

        self::expectException(\DomainException::class);

        $caixa->pagamento(new Cartao(31.21, 10));

        self::expectExceptionMessage('É possivel dividir apenas 9 vezes no cartão');
    }
}
