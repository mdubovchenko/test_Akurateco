<?php

declare(strict_types=1);

class Order
{
    public function __construct(
        private string $id = 'order-12345',
        private float $amount = 1.99,
        private string $description = 'Product',
        private string $currency = 'USD',
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
