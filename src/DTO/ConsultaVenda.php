<?php declare(strict_types=1);


namespace Fastpay\Client\DTO;


use Fastpay\Client\Interfaces\FactoryMethod;

class ConsultaVenda implements FactoryMethod
{
    private int $paginaAtual;
    private int $paginaFinal;
    private int $vendasPorPagina;
    private int $qtdVendaConsulta;
    private int $totalVendas;
    private array $vendas;

    private function __construct(
        int $paginaAtual,
        int $paginaFinal,
        int $vendasPorPagina,
        int $qtdVendaConsulta,
        int $totalVendas,
        array $vendas
    ) {
        $this->paginaAtual = $paginaAtual;
        $this->paginaFinal = $paginaFinal;
        $this->vendasPorPagina = $vendasPorPagina;
        $this->qtdVendaConsulta = $qtdVendaConsulta;
        $this->totalVendas = $totalVendas;
        $this->vendas = $vendas;
    }

    public function getPaginaAtual(): int
    {
        return $this->paginaAtual;
    }

    public function getPaginaFinal(): int
    {
        return $this->paginaFinal;
    }

    public function getVendasPorPagina(): int
    {
        return $this->vendasPorPagina;
    }

    public function getQtdVendaConsulta(): int
    {
        return $this->qtdVendaConsulta;
    }

    public function getTotalVendas(): int
    {
        return $this->totalVendas;
    }

    public function getVendas(): array
    {
        return $this->vendas;
    }

    public static function construct(array $data): self
    {
        if (!isset($data['data']))
            throw new InvalidDataException('Dados invalidos: vendas nao informadas.');
        $vendas = array_map(fn ($venda) => Venda::construct($venda), $data['data']);

        if (!isset($data['paginate']))
            throw new InvalidDataException('Dados invalidos: informacoes de paginacao nao informada.');
        $paginate = $data['paginate'];

        if (!isset($paginate['current_page']))
            throw new InvalidDataException('Dados invalidos: pagina atual nao informada.');

        if (!isset($paginate['last_page']))
            throw new InvalidDataException('Dados invalidos: pagina final nao informada.');

        if (!isset($paginate['per_page']))
            throw new InvalidDataException('Dados invalidos: vendas por pagina nao informada.');

        if (!isset($paginate['from'], $paginate['to']))
            throw new InvalidDataException('Dados invalidos: inicio ou fim da paginacao nao informadas.');
        $totalVendasPagina = ($paginate['to'] - $paginate['from']) + 1;

        if (!isset($paginate['total']))
            throw new InvalidDataException('Dados invalidos: total de vendas nao informada.');

        return new self(
            (int) $paginate['current_page'],
            (int) $paginate['last_page'],
            (int) $paginate['per_page'],
            (int) $totalVendasPagina,
            (int) $paginate['total'],
            $vendas
        );
    }
}