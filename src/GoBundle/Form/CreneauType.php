<?php

namespace GoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('datedebut')->add('datefin');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'GoBundle\Entity\Creneau'
        ]);
    }

    public function getBlockPrefix()
    {
        return 'gobundle_creneau';
    }
}
