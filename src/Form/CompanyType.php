<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nip', null, ['label' => 'NIP'])
            ->add('name', null, ['label' => 'Nazwa'])
            ->add('firstName', null, ['label' => 'Imię'])
            ->add('lastName', null, ['label' => 'Nazwisko'])
            ->add('street', null, ['label' => 'Ulica'])
            ->add('houseNumber', null, ['label' => 'Numer domu'])
            ->add('apartamentNumber', null, ['label' => 'Numer mieszkania'])
            ->add('postCode', null, ['label' => 'Kod pocztowy'])
            ->add('city', null, ['label' => 'Miasto'])
            ->add('email', null, ['label' => 'Email'])
            ->add('phone', null, ['label' => 'Telefon'])
            ->add('save', SubmitType::class, ['label' => 'Zapisz'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
