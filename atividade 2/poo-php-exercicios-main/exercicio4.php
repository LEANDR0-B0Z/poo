<?php

require_once "Produto.php";

try {
    echo "<h3>Exercício 4 — Método fábrica estático</h3>";

    $produtoPadrao = Produto::criarProdutoPadrao();

    echo "Produto criado sem usar new fora da classe:<br>";
    echo $produtoPadrao->exibirDetalhes();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
