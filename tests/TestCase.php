<?php declare(strict_types=1);

namespace Tests;


use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;

class TestCase extends PHPUnit_TestCase
{
    protected function getGuzzleClientWithMockedHandlerSuccess()
    {
        $mock = new MockHandler([
            new Response(
                200,
                $this->getFastapiSucessfulResponseHeaders(),
                $this->getFastapiSucessfulResponseBodyJson()
            )
        ]);

        $handlerStack = HandlerStack::create($mock);
        return new Client(['handler' => $handlerStack]);
    }

    protected function getFastapiSucessfulResponseHeaders(): array
    {
        return [
            'Server' => ' nginx',
            'Content-Type' => ' application/json',
            'Transfer-Encoding' => 'chunked',
            'Connection' => 'keep-alive',
            'Vary' => 'Accept-Encoding',
            'X-Powered-By' => 'PHP/7.2.16',
            'Cache-Control' => 'no-cache, private',
            'Date' => 'Mon, 05 Apr 2021 14:09:41 GMT',
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With, fc-connection',
            'Strict-Transport-Security' => 'max-age=63072000; includeSubDomains; preload',
            'X-Frame-Options' => 'DENY',
            'X-Content-Type-Options' => 'nosniff',
            'X-XSS-Protection' => '1; mode=block',
            'X-Robots-Tag' => 'none',
            'Content-Encoding' => 'gzip'
        ];
    }

    protected function getFastapiSucessfulResponseBodyJson(): string
    {
        return '
        {
          "success": true,
          "data": [
            {
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
              "parcelas": [
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33335,
                  "dt_cobranca": "2022-04-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-04-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 1,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "6.04"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33336,
                  "dt_cobranca": "2022-05-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-05-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 2,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33337,
                  "dt_cobranca": "2022-06-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-06-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 3,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33338,
                  "dt_cobranca": "2022-07-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-07-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 4,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33339,
                  "dt_cobranca": "2022-08-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-08-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 5,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33340,
                  "dt_cobranca": "2022-09-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-09-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 6,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33341,
                  "dt_cobranca": "2022-10-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-10-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 7,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33342,
                  "dt_cobranca": "2022-11-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-11-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 8,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33343,
                  "dt_cobranca": "2022-12-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-12-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 9,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "875bed61-c6f6-4213-9ff1-af2fbccbc979",
                  "ref_parcela": 33344,
                  "dt_cobranca": "2023-01-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2023-01-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 10,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                }
              ]
            },
            {
              "nu_venda": "34914-w4EF4-rMhDm",
              "nm_cliente": "CONTA SERASA TESTE CPF",
              "nu_documento": "05384515805",
              "dt_venda": "2021-04-04",
              "nu_referencia": "1617545024",
              "tipo": "CREDITO",
              "tipo_venda": "PB",
              "situacao": "ATIVO",
              "nu_parcelas": 10,
              "vl_venda": "1300.00",
              "parcelas": [
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33325,
                  "dt_cobranca": "2022-04-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-04-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 1,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "6.04"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33326,
                  "dt_cobranca": "2022-05-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-05-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 2,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33327,
                  "dt_cobranca": "2022-06-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-06-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 3,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33328,
                  "dt_cobranca": "2022-07-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-07-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 4,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33329,
                  "dt_cobranca": "2022-08-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-08-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 5,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33330,
                  "dt_cobranca": "2022-09-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-09-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 6,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33331,
                  "dt_cobranca": "2022-10-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-10-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 7,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33332,
                  "dt_cobranca": "2022-11-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-11-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 8,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33333,
                  "dt_cobranca": "2022-12-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-12-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 9,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                },
                {
                  "fid": "26ea6cd4-e693-4bc2-8d61-d0f73d3f8538",
                  "ref_parcela": 33334,
                  "dt_cobranca": "2023-01-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2023-01-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 10,
                  "vl_parcela": "130.00",
                  "vl_taxa_fc": "5.39"
                }
              ]
            },
            {
              "nu_venda": "34913-YDDVn-mTIE8",
              "nm_cliente": "CONTA SERASA TESTE CPF",
              "nu_documento": "05384515805",
              "dt_venda": "2021-04-04",
              "nu_referencia": "1617543910",
              "tipo": "CREDITO",
              "tipo_venda": "PB",
              "situacao": "ATIVO",
              "nu_parcelas": 3,
              "vl_venda": "11636.00",
              "parcelas": [
                {
                  "fid": "a3224513-cabc-454e-9b0e-49706af42dd7",
                  "ref_parcela": 33322,
                  "dt_cobranca": "2022-04-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-04-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 1,
                  "vl_parcela": "3878.67",
                  "vl_taxa_fc": "155.41"
                },
                {
                  "fid": "a3224513-cabc-454e-9b0e-49706af42dd7",
                  "ref_parcela": 33323,
                  "dt_cobranca": "2022-05-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-05-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 2,
                  "vl_parcela": "3878.67",
                  "vl_taxa_fc": "154.76"
                },
                {
                  "fid": "a3224513-cabc-454e-9b0e-49706af42dd7",
                  "ref_parcela": 33324,
                  "dt_cobranca": "2022-06-04",
                  "dt_pagamento": "2021-04-04",
                  "dt_vencimento": "2022-06-04",
                  "tipo": "CREDITO",
                  "situacao": "PAGO",
                  "nu_parcela": 3,
                  "vl_parcela": "3878.67",
                  "vl_taxa_fc": "154.76"
                }
              ]
            }
          ],
          "paginate": {
            "current_page": 1,
            "first_page_url": "https://api-sandbox.fpay.me/vendas?page=1",
            "from": 1,
            "last_page": 1085,
            "last_page_url": "https://api-sandbox.fpay.me/vendas?page=1085",
            "next_page_url": "https://api-sandbox.fpay.me/vendas?page=2",
            "path": "https://api-sandbox.fpay.me/vendas",
            "per_page": "3",
            "prev_page_url": null,
            "to": 3,
            "total": 3253
          },
          "errors": []
        }';
    }
}
