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
            ->add('nip', null, ['label' => 'NIP', 'attr' => [
                'data-regex' => 'nip',
            ]])
            ->add('name', null, ['label' => 'Nazwa', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 50,
            ]])
            ->add('firstName', null, ['label' => 'Imię', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 20,
            ]])
            ->add('lastName', null, ['label' => 'Nazwisko', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 40,
            ]])
            ->add('street', null, ['label' => 'Ulica', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 40,
            ]])
            ->add('houseNumber', null, ['label' => 'Numer domu', 'attr' => [
                'data-minlength' => 1,
                'data-maxlength' => 5,
            ]])
            ->add('apartamentNumber', null, ['label' => 'Numer mieszkania', 'attr' => [
                'data-minlength' => 1,
                'data-maxlength' => 5,
            ]])
            ->add('postCode', null, ['label' => 'Kod pocztowy', 'attr' => [
                'data-regex' => 'post_code',
            ]])
            ->add('city', null, ['label' => 'Miasto', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 40,
            ]])
            ->add('email', null, ['label' => 'Email', 'attr' => [
                'data-regex' => 'email',
            ]])
            ->add('phone', null, ['label' => 'Telefon', 'attr' => [
                'data-regex' => 'phone',
            ]])
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
