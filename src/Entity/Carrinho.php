<?php

namespace Store\Entity;

use Ds\Vector;

class Carrinho
{
    private Vector $produto;

    public function __construct()
    {
        $this->produto = new Vector();
    }

    public function addProduto(Produto $produto): self
    {
        $this->produto->push($produto);

        return $this;
    }

    public function rmUltimoProduto(): void
    {
        $this->produto->pop();
    }

    public function rmProdutoEspecifico(int $index): void
    {
        $this->produto->remove($index);
    }

    public function limparCarrinho(): void
    {
        $this->produto->clear();
    }

    public function totalIntensNoCarrinho(): int
    {
        return $this->produto->copy()->count();
    }

    public function getProdutos(): Vector
    {
        return $this->produto->copy();
    }
}