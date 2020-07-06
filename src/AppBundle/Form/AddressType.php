<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Address;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, $options)
    {
        $builder
        ->add('customer_type', ChoiceType::class, [ 
            'choices' => [
                'Cég' =>'Cég',
                'Magánszemély' => 'Magánszemély'
            ], 
            'attr' => [
                'class' => 'form-control',
            ],
            'label' => 'Típus'])
        ->add('name', TextType::class, [ 'attr' => ['class' => 'form-control'], 'label' => 'Név / Cégnév'])
        ->add('phone_number', TextType::class, [ 'attr' => ['class' => 'form-control'], 'label' => 'Telefonszám', 'required' => false])
        ->add('tax_number', TextType::class, [ 'attr' => ['class' => 'form-control'], 'label' => 'Adószám'])
        ->add('country', ChoiceType::class, [
            'choices' =>[
                'Magyarország' => 'Magyarország',
                'Szlovákia' => 'Szlovákia',
                'Románia' => 'Románia',
            ],
            'attr' => [
                'class' => 'form-control',
            ],
            'label' => 'Ország'])
        ->add('post_code', TextType::class, [ 'attr' => ['class' => 'form-control'], 'label' => 'Irányítószám'])
        ->add('city', TextType::class, [ 'attr' => ['class' => 'form-control'], 'label' => 'Város'])
        ->add('street', TextType::class, [ 'attr' => ['class' => 'form-control'], 'label' => 'Utca, házszám']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
            'csrf_protection' => false
        ]);
    }    
}