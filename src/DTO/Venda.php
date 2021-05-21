<?php declare(strict_types=1);


namespace Fastpay\Client\DTO;


use Fastpay\Client\Interfaces\FactoryMethod;

class Venda implements FactoryMethod
{
    private string $numero;
    private Cliente $cliente;
    private \DateTimeImmutable $dataVenda;
    private string $nroReferencia;
    private string $tipo;
    private string $tipoVenda;
    private string $situacao;
    private int $nroParcelas;
    private float $valor;
    private array $parcelas;

    private function __construct(
        string $numero,
        Cliente $cliente,
        \DateTimeImmutable $dataVenda,
        string $nroReferencia,
        string $tipo,
        string $tipoVenda,
        string $situacao,
        int $nroParcelas,
        float $valor,
        array $parcelas
    ) {
        $this->numero = $numero;
        $this->cliente = $cliente;
        $this->dataVenda = $dataVenda;
        $this->nroReferencia = $nroReferencia;
        $this->tipo = $tipo;
        $this->tipoVenda = $tipoVenda;
        $this->situacao = $situacao;
        $this->nroParcelas = $nroParcelas;
        $this->valor = $valor;
        $this->parcelas = $parcelas;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function getDataVenda(): \DateTimeImmutable
    {
        return $this->dataVenda;
    }

    public function getNroReferencia(): string
    {
        return $this->nroReferencia;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getTipoVenda(): string
    {
        return $this->tipoVenda;
    }

    public function getSituacao(): string
    {
        return $this->situacao;
    }

    public function getNroParcelas(): int
    {
        return $this->nroParcelas;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getParcelas(): array
    {
        return $this->parcelas;
    }

    public static function construct(array $data): self
    {
        $cliente = Cliente::construct($data);

        if (!isset($data['parcelas']))
            throw new InvalidDataException('Dados invalidos: parcelas da venda nao informadas.');
        $parcelas = array_map(fn ($parcela) => Parcela::construct($parcela), $data['parcelas']);

        if (!isset($data['nu_venda']))
            throw new InvalidDataException('Dados invalidos: numero da venda nao informado.');

        if (!isset($data['dt_venda']))
            throw new InvalidDataException('Dados invalidos: data da venda nao informado.');

        if (!($dataVenda = \DateTimeImmutable::createFromFormat('Y-m-d', $data['dt_venda'])))
            throw new InvalidDataException('Formato da data da venda invalido: esperado Y-m-d.');

        if (!isset($data['nu_referencia']))
            throw new InvalidDataException('Dados invalidos: numero de referencia da venda nao informado.');

        if (!isset($data['tipo']))
            throw new InvalidDataException('Dados invalidos: tipo de pagamento da venda nao informado.');

        if (!isset($data['tipo_venda']))
            throw new InvalidDataException('Dados invalidos: tipo da venda nao informado.');

        if (!isset($data['situacao']))
            throw new InvalidDataException('Dados invalidos: situacao da venda nao informada.');

        if (!isset($data['nu_parcelas']))
            throw new InvalidDataException('Dados invalidos: numero de parcelas da venda nao informado.');

        if (!isset($data['vl_venda']))
            throw new InvalidDataException('Dados invalidos: valor da venda nao informado.');

        return new self(
            $data['nu_venda'],
            $cliente,
            $dataVenda,
            $data['nu_referencia'],
            $data['tipo'],
            $data['tipo_venda'],
            $data['situacao'],
            (int) $data['nu_parcelas'],
            (float) $data['vl_venda'],
            $parcelas
        );
    }
}