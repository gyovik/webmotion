<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use \AppBundle\Form\AddressType;

use Symfony\Component\OptionsResolver\OptionsResolver;

use \AppBundle\Entity\ItemOrder;

class OrderItemType extends AddressType
{
    public function buildForm(FormBuilderInterface $builder, $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('priceWoTax', HiddenType::class, [ 'data' => '17890' ])
        ->add('tax', HiddenType::class, [ 'data' => '4857' ])
        ->add('fullPrice', HiddenType::class, [ 'data' => '22847' ])
        ->add('orderNumber', HiddenType::class, [ 'data' => '1234' ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ItemOrder::class,
            'csrf_protection' => false
        ]);
    }    
}
