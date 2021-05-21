<?php declare(strict_types=1);


namespace Fastpay\Client\DTO;


use Fastpay\Client\Interfaces\FactoryMethod;

class Cliente implements FactoryMethod, \JsonSerializable
{
    private string $nome;
    private string $documento;

    private function __construct(string $nome, string $documento)
    {
        $this->nome = $nome;
        $this->documento = $documento;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDocumento(): string
    {
        return $this->documento;
    }

    public static function construct(array $data): self
    {
        if (!isset($data['nm_cliente']))
            throw new InvalidDataException('Dados invalidos: nome do cliente nao informado.');

        if (!isset($data['nu_documento']))
            throw new InvalidDataException('Dados invalidos: documento do cliente nao informado.');

        return new self($data['nm_cliente'], $data['nu_documento']);
    }

    public function jsonSerialize(): array
    {
        return [
            'nome' => $this->getNome(),
            'documento' => $this->getDocumento()
        ];
    }
}