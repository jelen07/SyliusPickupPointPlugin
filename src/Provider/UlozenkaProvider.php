<?php


namespace Setono\SyliusPickupPointPlugin\Provider;


use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class UlozenkaProvider implements ProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return 'ulozenka';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Uloženka';
    }

    /**
     * @inheritDoc
     */
    public function findPickupPoints(OrderInterface $order): array
    {
        // TODO: Implement findPickupPoints() method.
    }

    public function findOnePickupPointById(string $id): ?PickupPointInterface
    {
        // TODO: Implement findOnePickupPointById() method.
    }

    /**
     * @inheritDoc
     */
    public function getPickupPointType(): string
    {
        return 'selectbox';
    }
}
