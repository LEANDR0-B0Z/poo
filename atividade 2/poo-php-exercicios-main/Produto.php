<?php

class Produto
{
    public const CATEGORIA_PADRAO = "Geral";
    public const DESCONTO_MAXIMO_PERMITIDO = 50.0;
    public const STATUS_DISPONIVEL = "Disponível";
    public const STATUS_ESGOTADO = "Esgotado";
    public const STATUS_EM_BREVE = "Em breve";

    public static int $totalProdutos = 0;
    public static int $estoqueTotal = 0;

    private static array $todos = [];

    private string $nome;
    private float $preco;
    private int $quantidadeEstoque;
    private string $categoria;
    private string $status;

    public function __construct(
        string $nome,
        float $preco,
        int $quantidadeEstoque,
        string $categoria = self::CATEGORIA_PADRAO,
        string $status = self::STATUS_DISPONIVEL
    ) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setQuantidadeEstoque($quantidadeEstoque);
        $this->setCategoria($categoria);
        $this->setStatus($status);

        self::$totalProdutos++;
        self::$estoqueTotal += $this->quantidadeEstoque;
        self::$todos[] = $this;
    }

    public static function criarProdutoPadrao(): self
    {
        return new self("Produto Genérico", 10.00, 1);
    }

    public static function listarTodos(): void
    {
        foreach (self::$todos as $produto) {
            echo $produto->exibirDetalhes() . "<br>";
        }
    }

    public function aplicarDescontoEspecial(float $percentual): float
    {
        if ($percentual < 0 || $percentual > self::DESCONTO_MAXIMO_PERMITIDO) {
            throw new InvalidArgumentException(
                "O desconto deve estar entre 0% e " . self::DESCONTO_MAXIMO_PERMITIDO . "%"
            );
        }

        return $this->preco * (1 - $percentual / 100);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $nome = trim($nome);
        if ($nome === "") {
            throw new InvalidArgumentException("O nome do produto é obrigatório.");
        }

        $this->nome = $nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        if ($preco < 0) {
            throw new InvalidArgumentException("O preço não pode ser negativo.");
        }

        $this->preco = $preco;
    }

    public function getQuantidadeEstoque(): int
    {
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque(int $quantidadeEstoque): void
    {
        if ($quantidadeEstoque < 0) {
            throw new InvalidArgumentException("A quantidade em estoque não pode ser negativa.");
        }

        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $categoria = trim($categoria);
        $this->categoria = $categoria === "" ? self::CATEGORIA_PADRAO : $categoria;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $statusValidos = [
            self::STATUS_DISPONIVEL,
            self::STATUS_ESGOTADO,
            self::STATUS_EM_BREVE,
        ];

        if (!in_array($status, $statusValidos, true)) {
            throw new InvalidArgumentException("Status inválido informado.");
        }

        $this->status = $status;
    }

    public function exibirDetalhes(): string
    {
        return "Produto: {$this->nome} | Categoria: {$this->categoria} | Status: {$this->status} | "
            . "Preço: R$ " . number_format($this->preco, 2, ",", ".")
            . " | Estoque: {$this->quantidadeEstoque} un.";
    }
}
