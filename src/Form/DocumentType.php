<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', HiddenType::class, ['label' => 'Typ'])
            ->add('category', ChoiceType::class, ['label' => 'Kategoria', 'choices' => [
                'Faktura VAT' => 1,
                'Faktura VAT marża' => 2,
                'Amortyzacja' => 3,
                'Inne' => 0,
            ]])
            ->add('title', null, ['label' => 'Tytuł', 'attr' => [
                'data-required' => true,
                'data-minlength' => 2,
                'data-maxlength' => 50,
            ]])
            ->add('description', null, ['label' => 'Opis', 'attr' => [
                'data-maxlength' => 255,
            ]])
            ->add('number', null, ['label' => 'Numer', 'attr' => [
                'data-required' => true,
                'data-minlength' => 4,
                'data-maxlength' => 40,
            ]])
            ->add('paymentType',  ChoiceType::class, ['label' => 'Typ płatności', 'choices' => [
                'Przelew' => 1,
                'Gotówka' => 2,
            ]])
            ->add('accountNumber', null, ['label' => 'Numer konta', 'attr' => [
                'data-regex' => 'account_number',
                'data-maxlength' => 60,
            ]])
            ->add('issueDate', DateType::class, [
                'label' => 'Data wystawienia',
                'format' => 'd.M.Y',
                'attr' => [
                    'class' => 'js-datepicker',
                    'data-required' => true,
                ],
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('paymentDate', DateType::class, [
                'label' => 'Data płatności',
                'format' => 'd.M.Y',
                'attr' => [
                    'class' => 'js-datepicker',
                    'data-required' => true,
                ],
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('place', null, ['label' => 'Miejsce', 'attr' => [
                'data-required' => true,
                'data-minlength' => 2,
                'data-maxlength' => 40,
            ]])
            ->add('net', TextType::class, ['label' => 'Netto', 'attr' => [
                'data-required' => true,
                'data-regex' => 'price',
            ]])
            ->add('taxPercent', null, ['label' => 'Podatek(%)', 'attr' => [
                'data-required' => true,
                'data-regex' => 'number',
            ]])
            ->add('tax', TextType::class, ['label' => 'Podatek', 'attr' => [
                'data-required' => true,
                'data-regex' => 'price',
            ]])
            ->add('gross', TextType::class, ['label' => 'Brutto', 'attr' => [
                'data-required' => true,
                'data-regex' => 'price',
            ]])
            ->add('buyer', null, ['label' => 'Kupujący'])
            ->add('seller', null, ['label' => 'Sprzedający'])
            ->add('viewers', null, ['label' => 'Do wglądu', 'attr' => ['data-autocomplete' => 'true']])
            ->add('save', SubmitType::class, ['label' => 'Zapisz'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
