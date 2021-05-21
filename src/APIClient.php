<?php declare(strict_types=1);


namespace Fastpay\Client;


use Fastpay\Client\DTO\ConsultaVenda;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class APIClient
{
    /**
     * O valor de cada filtro aqui
     * indica se o filtro eh obrigatorio
     */
    const getVendas_params = [
        'nu_referencia' => false,
        'nu_venda' => false,
        'page' => false,
        'per_page' => false,
        'dt_venda' => false
    ];

    private Client $httpClient;
    private string $clientCode;
    private string $clientKey;
    private bool $httpError;

    public function __construct(
        string $baseUri = 'https://api-sandbox.fpay.me',
        string $clientCode = 'FC-SB-15',
        string $clientKey = '6ea297bc5e294666f6738e1d48fa63d2',
        bool $httpError = false
    ) {
        $this->httpClient = new Client(['base_uri' => $baseUri]);
        $this->clientCode = $clientCode;
        $this->clientKey = $clientKey;
        $this->httpError = $httpError;
    }

    public function setHttpClient(Client $httpClient): self
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    public function setCredentials(string $clientCode, string $clientKey): self
    {
        $this->clientCode = $clientCode;
        $this->clientKey = $clientKey;
        return $this;
    }

    public function setHttpError(bool $httpError): self
    {
        $this->httpError = $httpError;
        return $this;
    }

    /**
     * @param array $filtros
     * @return ConsultaVenda
     * @throws GuzzleException
     */
    public function consultarVendas(array $filtros = []): ConsultaVenda
    {
        $this->validateFiltrosVendas($filtros);
        $uri = '/vendas?'.http_build_query($filtros);
        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Client-Code' => $this->clientCode,
                'Client-key' => $this->clientKey,
            ],
            'http_errors' => $this->httpError
        ];

        $response = $this->httpClient->get($uri, $options);
        $data = json_decode($response->getBody()->read($response->getBody()->getSize()), true);
        return ConsultaVenda::construct($data);
    }

    private function validateFiltrosVendas(array $filtros)
    {
        foreach ($filtros as $filtro => $valor) {
            if (!in_array($filtro, array_keys(self::getVendas_params)))
                throw new \InvalidArgumentException("Filtro {$filtro} invalido.");
        }
        foreach (self::getVendas_params as $filtro => $obrigatorio) {
            if (!$obrigatorio)
                continue;
            if (!in_array($filtro, array_keys($filtros)))
                throw new \InvalidArgumentException("Filtro obrigatorio {$filtro} nao informado.");
        }
    }
}