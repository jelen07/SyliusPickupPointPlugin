<?php


namespace Setono\SyliusPickupPointPlugin\Provider;


use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class BalikNaPostuProvider implements ProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return 'balik_na_postu';
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Balík na poštu';
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
        return 'widget';
    }
}
