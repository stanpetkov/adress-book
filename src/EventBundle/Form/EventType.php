<?php

namespace EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\Email;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->
        add('firstname', null, array('label' => false))->
        add('lastname', null, array('label' => false))->
        add('street', null, array('label' => false))->
        add('zip', null, array('label' => false))->
        add('city', null, array('label' => false))->
        add('country', null, array('label' => false))->
        add('phonenumber', null, array('label' => false))->
        add('birthday', DateType::class, [
                   'widget' => 'single_text',
                   'format' => 'dd-MM-yyyy',
                   'attr' => [
                       'class' => 'form-control input-inline datepicker',
                       'data-provide' => 'datepicker',
                       'data-date-format' => 'dd-mm-yyyy',
                       'label' => false
                   ]
            ])
            ->add('email', EmailType::class, array(
                'constraints' => array(
                    new Email(array('checkMX' => true)),
                ),
            ))->
        add('picture', FileType::class, array('data_class' => null, 'required' => true));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EventBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eventbundle_event';
    }





}
