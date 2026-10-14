<?php

require_once "Produto.php";
require_once "ProdutoUtil.php";

try {
    echo "<h3>Exercício 8 — Juntando tudo</h3>";

    $cadeira = new Produto("Cadeira Gamer", 1200.00, 8, Produto::CATEGORIA_PADRAO, Produto::STATUS_DISPONIVEL);
    $produtoPadrao = Produto::criarProdutoPadrao();
    $precoComDesconto = $cadeira->aplicarDescontoEspecial(15.0);

    echo $cadeira->exibirDetalhes() . "<br>";
    echo $produtoPadrao->exibirDetalhes() . "<br><br>";
    echo "Preço formatado: " . ProdutoUtil::formatarMoeda($cadeira->getPreco()) . "<br>";
    echo "Preço com 15% de desconto: " . ProdutoUtil::formatarMoeda($precoComDesconto) . "<br><br>";
    echo "Total de produtos: " . Produto::$totalProdutos . "<br>";
    echo "Estoque acumulado: " . Produto::$estoqueTotal . " unidades<br>";
    echo "Categoria padrão: " . Produto::CATEGORIA_PADRAO;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
