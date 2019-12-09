<?php


namespace Setono\SyliusPickupPointPlugin\Provider;


use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Sylius\Component\Core\Model\OrderInterface;

final class ZasilkovnaProvider implements ProviderInterface
{
    /**
     * A unique code identifying this provider
     */
    public function getCode(): string
    {
        return 'zasilkovna';
    }

    /**
     * Will return the name of this provider
     */
    public function getName(): string
    {
        return 'Zásilkovna';
    }

    /**
     * Will return an array of pickup points
     *
     * @return PickupPointInterface[]
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
     * @return string
     */
    public function getPickupPointType(): string
    {
        return 'widget';
    }
}
