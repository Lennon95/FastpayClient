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

    public static function construct(array $data): Venda
    {
        /*
        "nu_venda": "34915-Alv7z-SuBCK",
      "nm_cliente": "CONTA SERASA TESTE CPF",
      "nu_documento": "05384515805",
      "dt_venda": "2021-04-04",
      "nu_referencia": "1617545384",
      "tipo": "CREDITO",
      "tipo_venda": "PB",
      "situacao": "ATIVO",
      "nu_parcelas": 10,
      "vl_venda": "1300.00",
      "parcelas"
        */
    }
}