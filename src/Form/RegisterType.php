<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, ['label' => 'Login', 'attr' => [
                'data-minlength' => 3,
                'data-maxlength' => 10,
                'data-regex' => 'username',
            ]])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Powtórz poprawnie hasło',
                'required' => true,
                'first_options' => ['label' => 'Hasło'],
                'second_options' => ['label' => 'Powtórz hasło'],
            ])
            ->add('email', null, ['label' => 'E-mail', 'attr' => [
                'data-regex' => 'email',
            ]])
            ->add('firstName', null, ['label' => 'Imię', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 20,
            ]])
            ->add('lastName', null, ['label' => 'Nazwisko', 'attr' => [
                'data-minlength' => 2,
                'data-maxlength' => 40,
            ]])
            ->add('save', SubmitType::class, ['label' => 'Zarejestruj'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
