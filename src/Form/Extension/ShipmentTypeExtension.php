<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Form\Extension;

use Setono\SyliusPickupPointPlugin\Form\Type\PickupPointIdChoiceType;
use Setono\SyliusPickupPointPlugin\Provider\ProviderInterface;
use Sylius\Bundle\CoreBundle\Form\Type\Checkout\ShipmentType;
use Sylius\Component\Core\Model\ShipmentInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

final class ShipmentTypeExtension extends AbstractTypeExtension
{
    /** @var ServiceRegistryInterface */
    private $providerRegistry;

    /**
     * @param ServiceRegistryInterface $providerRegistry
     */
    public function __construct(ServiceRegistryInterface $providerRegistry)
    {
        $this->providerRegistry = $providerRegistry;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
                $form = $event->getForm();

                /** @var ShipmentInterface $shipment */
                $shipment = $event->getData();

                $providerCode = $shipment->getMethod()->getPickupPointProvider();

                /** @var ProviderInterface $provider */
                $provider = $this->providerRegistry->get($providerCode);

                $form->add('pickupPointId', PickupPointIdChoiceType::class, [
                    'label' => 'setono_sylius_pickup_point.form.shipment.pickup_point_id',
                    'placeholder' => 'setono_sylius_pickup_point.form.shipment.select_pickup_point',
                    'required' => true,
                    'pickup_point_type' => $provider->getPickupPointType(),
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
