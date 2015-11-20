<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GradeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('grade',null,[
                'attr' => [
                    'class' => 'form-control form-control-solid placeholder-no-fix',
                    'placeholder' => 'Note',
                ]
            ])
            ->add('exam',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
                'empty_value'  => 'Examen'
            ])
            ->add('student',null,[
                'attr' => [
                    'class' => 'form-control',
                ],
                'empty_value'  => 'Etudiant'

            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Grade'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_grade';
    }
}
