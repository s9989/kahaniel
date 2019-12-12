<?php

namespace App\Form;

use App\Entity\PKWIU;
use App\Entity\Position;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position', null, ['label' => 'Pozycja'])
            ->add('title', null, ['label' => 'Opis'])
            ->add('category', ChoiceType::class, ['label' => 'Kategoria', 'choices' => array_flip(PKWIU::CATEGORIES)])
            ->add('unit', ChoiceType::class, ['label' => 'Jednostka', 'choices' => [
                'Usługa' => 1,
                'Sztuka' => 2,
                'Kilogram' => 3,
                'Litr' => 4,
            ]])
            ->add('amount', null, ['label' => 'Ilość'])
            ->add('net', null, ['label' => 'Netto'])
            ->add('taxPercent', null, ['label' => 'Podatek'])
            ->add('save', SubmitType::class, ['label' => 'Zapisz'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Position::class,
        ]);
    }
}
