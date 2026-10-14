<?php

class TesteEscopo
{
    public static string $mensagemClasse = "Sou uma propriedade estática da classe.";
    public string $mensagemObjeto = "Sou uma propriedade de instância do objeto.";

    /*
     * self::$algo acessa um membro da classe, compartilhado por todas as instâncias.
     * $this->algo acessa um membro do objeto atual e só existe em métodos de instância.
     * O teste abaixo gera "Using $this when not in object context" se for descomentado.
     *
     * public static function testeComErro(): string
     * {
     *     return $this->mensagemObjeto;
     * }
     */
    public static function testeCorrigido(): string
    {
        return self::$mensagemClasse;
    }
}

echo "<h3>Exercício 5 — Comparando self:: e \$this</h3>";
echo TesteEscopo::testeCorrigido();
