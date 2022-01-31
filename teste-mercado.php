<?php

use Store\Entity\Carrinho;
use Store\Entity\Produto;
use Store\Service\Caixa;
use Store\Strategy\Cartao;

require 'vendor/autoload.php';

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
$caixa->pagamento(new Cartao(33.21, 2));