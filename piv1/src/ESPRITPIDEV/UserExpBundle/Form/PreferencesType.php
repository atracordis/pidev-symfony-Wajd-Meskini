<?php

namespace ESPRITPIDEV\UserExpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PreferencesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email')->add('telephone')->add('address')
            ->add('music')->add('musictaste')->add('smoking')
            ->add('allowsmoking')->add('animal')->add('haveanimal')
            ->add('confortvoiture')->add('modelevoiture')->add('marquevoiture')
            ->add('addressVar')->add('telephoneVar')->add('newsletter');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ESPRITPIDEV\UserExpBundle\Entity\Preferences'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'espritpidev_userexpbundle_preferences';
    }


}
