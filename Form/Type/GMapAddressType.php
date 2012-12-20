<?php

/*
 * This file is part of the ASBO package.
 *
 * (c) De Ron Malian <deronmalian@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asbo\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\Options;

/**
 * A GMap address type.
 *
 * @author De Ron Malian <deronmalian@gmail.com>
 */
class GMapAddressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $show = 'hidden';

        if (true === $options['show_all']) {
            $show = null;
        }

        $builder->add('address', null, array('required' => true))
                ->add('locality', $show, array('required' => false, 'disabled' => true))
                ->add('country', $show, array('required' => false, 'disabled' => true))
                ->add('lat', $show, array('required' => false, 'disabled' => true))
                ->add('lng', $show, array('required' => false, 'disabled' => true));
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['show_all'] = $options['show_all'];
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'virtual'   => true,
                'show_all'  => false
            )
        );

        $resolver->setAllowedValues(
            array(
                'virtual'  => array(true),
                'show_all' => array(true, false)
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'gmap_address';
    }
}
