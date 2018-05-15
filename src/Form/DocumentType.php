<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', null, ['label' => 'Typ'])
            ->add('category', null, ['label' => 'Kategoria'])
            ->add('title', null, ['label' => 'Tytuł'])
            ->add('description', null, ['label' => 'Opis'])
            ->add('number', null, ['label' => 'Numer'])
            ->add('accountNumber', null, ['label' => 'Numer konta'])
            ->add('issueDate', DateType::class, ['label' => 'Data wystawienia', 'attr' => ['class' => 'js-datepicker'], 'widget' => 'single_text', 'html5' => false])
            ->add('paymentDate', DateType::class, ['label' => 'Data płatności', 'attr' => ['class' => 'js-datepicker'], 'widget' => 'single_text', 'html5' => false])
            ->add('place', null, ['label' => 'Miejsce'])
            ->add('net', null, ['label' => 'Netto'])
            ->add('taxPercent', null, ['label' => 'Podatek(%)'])
            ->add('tax', null, ['label' => 'Podatek'])
            ->add('gross', null, ['label' => 'Brutto'])
            ->add('buyer', null, ['label' => 'Kupujący'])
            ->add('seller', null, ['label' => 'Sprzedający'])
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
