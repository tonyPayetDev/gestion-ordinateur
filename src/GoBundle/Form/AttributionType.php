<?php

namespace GoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttributionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('creneau', EntityType::class, [
                'class' => 'GoBundle:Creneau',
                'choice_label' => 'titre',
                'label' => 'Choix creneau ?'])
            ->add('utilisateur', EntityType::class, [
                'class' => 'GoBundle:Utilisateur',
                'choice_label' => 'nom',
                'label' => 'Choix Utilisateur ?'])
            ->add('ordinateur', EntityType::class, [
                'class' => 'GoBundle:Ordinateur',
                'choice_label' => 'nom',
                'label' => 'Choix ordinateur ?'])
          ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GoBundle\Entity\Attribution'
        ));
    }

    public function getBlockPrefix()
    {
        return 'gobundle_attribution';
    }
}
