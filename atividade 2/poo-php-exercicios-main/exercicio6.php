<?php

require_once "Produto.php";

try {
    echo "<h3>Exercício 6 — Constante de classe</h3>";

    $produto = new Produto("Smartphone", 2500.00, 5);
    $precoComDesconto = $produto->aplicarDescontoEspecial(20.0);

    echo $produto->exibirDetalhes() . "<br><br>";
    echo "Categoria padrão: " . Produto::CATEGORIA_PADRAO . "<br>";
    echo "Desconto máximo permitido: " . Produto::DESCONTO_MAXIMO_PERMITIDO . "%<br>";
    echo "Preço após 20% de desconto: R$ " . number_format($precoComDesconto, 2, ",", ".");
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
