<?php

namespace GoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdinateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('ip');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'GoBundle\Entity\Ordinateur'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'gobundle_ordinateur';
    }
}
