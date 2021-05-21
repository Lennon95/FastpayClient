<?php declare(strict_types=1);


namespace Fastpay\Client\DTO;


use Fastpay\Client\Interfaces\FactoryMethod;

class Parcela implements FactoryMethod
{
    private string $referencia;
    private \DateTimeImmutable $dataCobranca;
    private \DateTimeImmutable $dataPagamento;
    private \DateTimeImmutable $dataVencimento;
    private string $tipo;
    private string $situacao;
    private int $numero;
    private float $valor;
    private float $valorTaxaFc;

    private function __construct(
        string $referencia,
        \DateTimeImmutable $dataCobranca,
        \DateTimeImmutable $dataPagamento,
        \DateTimeImmutable $dataVencimento,
        string $tipo,
        string $situacao,
        int $numero,
        float $valor,
        float $valorTaxaFc
    ) {
        $this->referencia = $referencia;
        $this->dataCobranca = $dataCobranca;
        $this->dataPagamento = $dataPagamento;
        $this->dataVencimento = $dataVencimento;
        $this->tipo = $tipo;
        $this->situacao = $situacao;
        $this->numero = $numero;
        $this->valor = $valor;
        $this->valorTaxaFc = $valorTaxaFc;
    }

    public function getReferencia(): string
    {
        return $this->referencia;
    }

    public function getDataCobranca(): \DateTimeImmutable
    {
        return $this->dataCobranca;
    }

    public function getDataPagamento(): \DateTimeImmutable
    {
        return $this->dataPagamento;
    }

    public function getDataVencimento(): \DateTimeImmutable
    {
        return $this->dataVencimento;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getSituacao(): string
    {
        return $this->situacao;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getValorTaxaFc(): float
    {
        return $this->valorTaxaFc;
    }

    public static function construct(array $data): self
    {
        if (!isset($data['ref_parcela']))
            throw new InvalidDataException('Dados invalidos: referencia da parcela nao informada.');

        if (!isset($data['dt_cobranca']))
            throw new InvalidDataException('Dados invalidos: data de cobrança nao informada.');

        if (!isset($data['dt_pagamento'])) // Parcela pode nao estar paga
            $data['dt_pagamento'] = '0000-00-00';

        if (!isset($data['dt_vencimento']))
            throw new InvalidDataException('Dados invalidos: data de vencimento nao informado.');

        if (!isset($data['tipo']))
            throw new InvalidDataException('Dados invalidos: tipo de pagamento da parcela nao informado.');

        if (!isset($data['situacao']))
            throw new InvalidDataException('Dados invalidos: situacao da parcela nao informada.');

        if (!isset($data['nu_parcela']))
            throw new InvalidDataException('Dados invalidos: numero da parcela nao informada.');

        if (!isset($data['vl_parcela']))
            throw new InvalidDataException('Dados invalidos: valor da parcela nao informado.');

        if (!isset($data['vl_taxa_fc']))
            throw new InvalidDataException('Dados invalidos: valor da taxa de fundo comum da parcela nao informado.');

        if (!($dataCobranca = \DateTimeImmutable::createFromFormat('Y-m-d', $data['dt_cobranca'])))
            throw new InvalidDataException('Formato da data de cobrança invalido: esperado Y-m-d.');

        if (!($dataPagamento = \DateTimeImmutable::createFromFormat('Y-m-d', $data['dt_pagamento'])))
            throw new InvalidDataException('Formato da data de pagamento invalido: esperado Y-m-d.');

        if (!($dataVencimento = \DateTimeImmutable::createFromFormat('Y-m-d', $data['dt_vencimento'])))
            throw new InvalidDataException('Formato da data de vencimento invalido: esperado Y-m-d.');

        return new self(
            $data['ref_parcela'],
            $dataCobranca,
            $dataPagamento,
            $dataVencimento,
            $data['tipo'],
            $data['situacao'],
            (int) $data['nu_parcela'],
            (float) $data['vl_parcela'],
            (float) $data['vl_taxa_fc']
        );
    }
}