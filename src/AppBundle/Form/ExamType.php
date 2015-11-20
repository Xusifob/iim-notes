<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExamType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,[
                'attr' => [
                    'class' => 'form-control form-control-solid placeholder-no-fix',
                    'placeholder' => 'Nom',
                ]
            ])
            ->add('content','textarea',[
                'attr' => [
                    'class' => 'form-control form-control-solid placeholder-no-fix',
                    'placeholder' => 'Content',
                ]
            ])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Exam'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_exam';
    }
}
