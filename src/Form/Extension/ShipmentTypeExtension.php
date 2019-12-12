<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Form\Extension;

use Setono\SyliusPickupPointPlugin\Form\Type\PickupPointDetailType;
use Setono\SyliusPickupPointPlugin\Form\Type\PickupPointIdChoiceType;
use Sylius\Bundle\CoreBundle\Form\Type\Checkout\ShipmentType;
use Sylius\Component\Core\Model\ShipmentInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class ShipmentTypeExtension extends AbstractTypeExtension
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, static function (FormEvent $event) {
                $form = $event->getForm();

                /** @var ShipmentInterface $shipment */
                $shipment = $event->getData();

                $form->add('pickupPointId', PickupPointIdChoiceType::class, [
                    'label' => 'setono_sylius_pickup_point.form.shipment.pickup_point_id',
                    'placeholder' => 'setono_sylius_pickup_point.form.shipment.select_pickup_point',
                    'required' => true,
                    'shipment' => $shipment,
                ]);

                $form->add('pickupPointDetail', PickupPointDetailType::class, [
                    'required' => true,
                    'mapped' => false,
                ]);
            })
        ;
    }

    /**
     * @return iterable
     */
    public static function getExtendedTypes(): iterable
    {
        return [ShipmentType::class];
    }
}
