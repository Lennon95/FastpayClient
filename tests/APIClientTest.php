<?php declare(strict_types=1);

namespace Tests;


use Fastpay\Client\APIClient;
use Fastpay\Client\DTO\ConsultaVenda;

class APIClientTest extends TestCase
{
    public function testSuccessfulRequest()
    {
        $httpClient = $this->getGuzzleClientWithMockedHandlerSuccess();

        $apiClient = new APIClient();
        $apiClient->setHttpClient($httpClient);
        $filtros = ['page' => 0, 'per_page' => 3];

        $expectedConsultaVenda = ConsultaVenda::construct(json_decode($this->getFastapiSucessfulResponseBodyJson(), true));
        $actualConsultaVenda = $apiClient->consultarVendas($filtros);

        /* Testa ConsultaVenda */
        $this->assertEquals($expectedConsultaVenda->getPaginaAtual(), $actualConsultaVenda->getPaginaAtual());
        $this->assertEquals($expectedConsultaVenda->getPaginaFinal(), $actualConsultaVenda->getPaginaFinal());
        $this->assertEquals($expectedConsultaVenda->getQtdVendaConsulta(), $actualConsultaVenda->getQtdVendaConsulta());
        $this->assertEquals($expectedConsultaVenda->getTotalVendas(), $actualConsultaVenda->getTotalVendas());
        $this->assertEquals($expectedConsultaVenda->getVendasPorPagina(), $actualConsultaVenda->getVendasPorPagina());
    }
}
