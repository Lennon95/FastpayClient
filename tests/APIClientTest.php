<?php declare(strict_types=1);

namespace Tests;


use Fastpay\Client\APIClient;
use Fastpay\Client\DTO\ConsultaVenda;
use Fastpay\Client\DTO\InvalidDataException;
use GuzzleHttp\Exception\GuzzleException;

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

        $this->assertEquals($expectedConsultaVenda->getPaginaAtual(), $actualConsultaVenda->getPaginaAtual());
        $this->assertEquals($expectedConsultaVenda->getPaginaFinal(), $actualConsultaVenda->getPaginaFinal());
        $this->assertEquals($expectedConsultaVenda->getQtdVendaConsulta(), $actualConsultaVenda->getQtdVendaConsulta());
        $this->assertEquals($expectedConsultaVenda->getTotalVendas(), $actualConsultaVenda->getTotalVendas());
        $this->assertEquals($expectedConsultaVenda->getVendasPorPagina(), $actualConsultaVenda->getVendasPorPagina());
        $this->assertEquals($expectedConsultaVenda->getVendas(), $actualConsultaVenda->getVendas());
    }

    public function testInvalidDataException()
    {
        $invalidData = json_decode($this->getFastapiSucessfulResponseBodyJson(), true);
        unset($invalidData['data']);

        $this->expectException(InvalidDataException::class);
        ConsultaVenda::construct($invalidData);
    }

    public function testInvalidFiltrosThrowsInvalidArgumentException()
    {
        $httpClient = $this->getGuzzleClientWithMockedHandlerSuccess();

        $apiClient = new APIClient();
        $apiClient->setHttpClient($httpClient);
        $filtros = ['filtro_inexistes' => 0];

        $this->expectException(\InvalidArgumentException::class);
        $apiClient->consultarVendas($filtros);
    }

    public function testHttpErrorThrowsGuzzleException()
    {
        $httpClient = $this->getGuzzleClientWithMockedHandlerFailure();

        $apiClient = new APIClient();
        $apiClient->setHttpClient($httpClient)->setHttpError(true);

        $this->expectException(GuzzleException::class);
        $apiClient->consultarVendas([]);
    }
}
