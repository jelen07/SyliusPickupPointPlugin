<?php


namespace Setono\SyliusPickupPointPlugin\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

final class PickupPointDetailType extends AbstractType
{
    /**
     * @return string
     */
    public function getParent(): string
    {
        return HiddenType::class;
    }
}
