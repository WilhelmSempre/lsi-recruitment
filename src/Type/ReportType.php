<?php

namespace App\Type;

use App\Entity\ReportFilter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ReportType
 */
class ReportType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('local', ChoiceType::class, [
                'required' => false,
                'choices' => array_flip($options['locals']),
                'label' => 'filter.local',
                'empty_data' => null,
                'placeholder' => 'filter.local',
            ])
            ->add('dateFrom', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'filter.dateFrom',
                ]
            ])
            ->add('dateTo', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => false,
                'html5' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'filter.dateTo',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'filter.submit',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                [
                    'data_class' => ReportFilter::class,
                    'locals' => [],
                    'translation_domain' => 'filter',
                ]
            );
    }
}