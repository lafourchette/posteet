<?php

namespace LF\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * UserType.
 */
class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('firstName', 'text', array(
            'required' => true,
        ));
        $builder->add('lastName', 'text', array(
            'required' => true,
        ));
        $builder->add('bio', 'textarea', array(
            'required' => false
        ));
    }

    public function getDefaultOptions()
    {
        return array();
    }

    public function getName()
    {
        return 'user';
    }
}

