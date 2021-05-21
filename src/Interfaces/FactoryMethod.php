<?php declare(strict_types=1);


namespace Fastpay\Client\Interfaces;


interface FactoryMethod
{
    public static function construct(array $data): self;
}