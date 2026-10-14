<?php

class ProdutoUtil
{
    public static function formatarMoeda(float $valor): string
    {
        return "R$ " . number_format($valor, 2, ",", ".");
    }

    public static function calcularDesconto(float $preco, float $percentualDesconto): float
    {
        if ($percentualDesconto < 0 || $percentualDesconto > 100) {
            throw new InvalidArgumentException("O percentual de desconto deve estar entre 0% e 100%.");
        }

        return $preco * (1 - $percentualDesconto / 100);
    }
}
