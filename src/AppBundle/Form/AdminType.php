<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdminType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',null,[
                'attr' => [
                    'class' => 'form-control form-control-solid placeholder-no-fix',
                    'placeholder' => 'E-mail',
                ]
            ])
            ->add('firstName',null,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom',
                ]
            ])
            ->add('lastName',null,[
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom',
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
            'data_class' => 'AppBundle\Entity\Admin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_admin';
    }
}
