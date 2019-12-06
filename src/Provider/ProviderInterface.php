<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Provider;

use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Sylius\Component\Core\Model\OrderInterface;

interface ProviderInterface
{
    /** @var string */
    public CONST PICKUP_POINT_TYPE_SELECTBOX = 'selectbox';

    /**
     * A unique code identifying this provider
     */
    public function getCode(): string;

    /**
     * Will return the name of this provider
     */
    public function getName(): string;

    /**
     * Will return an array of pickup points
     *
     * @return PickupPointInterface[]
     */
    public function findPickupPoints(OrderInterface $order): array;

    public function findOnePickupPointById(string $id): ?PickupPointInterface;

    /**
     * @return string
     */
    public function getPickupPointType(): string;
}
