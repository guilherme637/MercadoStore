<?php

namespace Store\Entity;

class Produto
{
    private string $nome;
    private float $preco;

    public function __construct(string $nome, $preco)
    {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
}