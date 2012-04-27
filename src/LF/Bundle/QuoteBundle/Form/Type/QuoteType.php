<?php

namespace LF\Bundle\QuoteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * QuoteType.
 */
class QuoteType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('author', 'text', array(
        		'label' => 'Auteur'
        ));
        $builder->add('text', ($options['mode'] == 'link' || $options['mode'] == 'image') ? 'text' : 'textarea', array(
        		'label' => ($options['mode'] == 'link' || $options['mode'] == 'image') ? 'Description' : 'Citation',
        		'required' => false
        ));
        if ($options['mode'] == 'link') {
	        $builder->add('link', 'text', array(
	        	'label' => 'Lien'
	        ));
        } elseif ($options['mode'] == 'image') {
	        $builder->add('image', 'file', array(
	        		'label' => 'Image'
	       	));
        }
    }

    public function getDefaultOptions()
    {
        return array(
            'data_class' => 'LF\Bundle\QuoteBundle\Entity\Quote',
        	'mode' => null
        );
    }

    public function getName()
    {
        return 'quote';
    }
}

