<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('title', null, ['label' => 'Tytuł', 'attr' => ['data-required' => true]])
            ->add('description', null, ['label' => 'Opis'])
            ->add('number', null, ['label' => 'Numer'])
            ->add('accountNumber', null, ['label' => 'Numer konta'])
            ->add('issueDate', DateType::class, [
                'label' => 'Data wystawienia',
                'format' => 'd.M.Y',
                'attr' => ['class' => 'js-datepicker'],
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('paymentDate', DateType::class, [
                'label' => 'Data płatności',
                'format' => 'd.M.Y',
                'attr' => ['class' => 'js-datepicker'],
                'widget' => 'single_text',
                'html5' => false,
            ])
            ->add('place', null, ['label' => 'Miejsce'])
            ->add('net', null, ['label' => 'Netto', 'attr' => ['step' => '0.01']])
            ->add('taxPercent', null, ['label' => 'Podatek(%)'])
            ->add('tax', null, ['label' => 'Podatek', 'attr' => ['step' => '0.01']])
            ->add('gross', null, ['label' => 'Brutto', 'attr' => ['step' => '0.01']])
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
