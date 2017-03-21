<?php

namespace ESPRITPIDEV\UserExpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ComplaintsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('content')->add('attachment', FileType::class, array('data_class' => null,'required' => false,'label' => 'Attachment'))
            ->add('type', ChoiceType::class, array(
            'choices' => array(
                'The driver has been disrespectful' => 'The driver has been disrespectful',
                'A passenger has been disrespectful' => 'A passenger has been disrespectful',
                'A passenger has been too loud' => 'A passenger has been too loud',
                'The driver has been too loud' => 'The driver has been too loud',
                'A passenger did not pay his share' => 'A passenger did not pay his share',
                'A passenger was late' => 'A passenger was late',
                'A driver was late' => 'A driver was late',
                'A passenger was smoking' => 'A passenger was smoking',
                'A driver was smoking' => 'A driver was smoking',
                'A passenger brought animals' => 'A passenger brought animals',
                'A driver brought animals' => 'A driver brought animals'),
        ))   ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ESPRITPIDEV\UserExpBundle\Entity\Complaints'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'espritpidev_userexpbundle_complaints';
    }


}
