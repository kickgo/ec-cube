<?php

namespace Eccube\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class FaxType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $options['fax01_options']['required'] = $options['required'];
        $options['fax02_options']['required'] = $options['required'];
        $options['fax03_options']['required'] = $options['required'];

        if (!isset($options['options']['error_bubbling'])) {
            $options['options']['error_bubbling'] = $options['error_bubbling'];
        }

        if (empty($options['fax01_name'])) {
            $options['fax01_name'] = $builder->getName() . '01';
        }
        if (empty($options['fax02_name'])) {
            $options['fax02_name'] = $builder->getName() . '02';
        }
        if (empty($options['fax03_name'])) {
            $options['fax03_name'] = $builder->getName() . '03';
        }

        $builder
            ->add($options['fax01_name'], 'text', array_merge($options['options'], $options['fax01_options']))
            ->add($options['fax02_name'], 'text', array_merge($options['options'], $options['fax02_options']))
            ->add($options['fax03_name'], 'text', array_merge($options['options'], $options['fax03_options']))
        ;

        $builder->setAttribute('fax01_name', $options['fax01_name']);
        $builder->setAttribute('fax02_name', $options['fax02_name']);
        $builder->setAttribute('fax03_name', $options['fax03_name']);
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $builder = $form->getConfig();
        $view->vars['fax01_name'] = $builder->getAttribute('fax01_name');
        $view->vars['fax02_name'] = $builder->getAttribute('fax02_name');
        $view->vars['fax03_name'] = $builder->getAttribute('fax03_name');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'label' => 'FAX',
            'options' => array(),
            'fax01_options' => array(
                'attr' => array(
                    'maxlength' => 3,
                ),
                'constraints' => array(
                    new Assert\Length(array('min' => 2, 'max' => 3)),
                    new Assert\Regex(array('pattern' => '/\A\d+\z/')),
                ),
            ),
            'fax02_options' => array(
                'attr' => array(
                    'maxlength' => 4,
                ),
                'constraints' => array(
                    new Assert\Length(array('min' => 2, 'max' => 4)),
                    new Assert\Regex(array('pattern' => '/\A\d+\z/')),
                ),
            ),
            'fax03_options' => array(
                'attr' => array(
                    'maxlength' => 4,
                ),
                'constraints' => array(
                    new Assert\Length(array('min' => 2, 'max' => 4)),
                    new Assert\Regex(array('pattern' => '/\A\d+\z/')),
                ),
            ),
            'fax01_name' => '',
            'fax02_name' => '',
            'fax03_name' => '',
            'error_bubbling' => false,
            'inherit_data' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'fax';
    }
}
