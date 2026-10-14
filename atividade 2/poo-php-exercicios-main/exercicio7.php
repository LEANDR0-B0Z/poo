<?php

require_once "Produto.php";

try {
    echo "<h3>Exercício 7 — Múltiplas constantes relacionadas</h3>";

    $disponivel = new Produto("Console", 3500.00, 4, Produto::CATEGORIA_PADRAO, Produto::STATUS_DISPONIVEL);
    $esgotado = new Produto("Fone Bluetooth", 300.00, 0, Produto::CATEGORIA_PADRAO, Produto::STATUS_ESGOTADO);
    $emBreve = new Produto("Smartwatch", 800.00, 10, Produto::CATEGORIA_PADRAO, Produto::STATUS_EM_BREVE);

    echo $disponivel->exibirDetalhes() . "<br>";
    echo $esgotado->exibirDetalhes() . "<br>";
    echo $emBreve->exibirDetalhes();
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
