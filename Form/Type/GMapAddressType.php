<?php
namespace Asbo\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormViewInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

/**
 * GMapAddressType
 *
 * @author Sullivan SENECHAL
 */
class GMapAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $show = 'hidden';
        if(true === $options['show_all']) $show = null;

        $builder
                ->add('address', null, array(
                    'required'      => true
                ))
                ->add('locality', $show, array(
                    'required'      => false,
                    'disabled'       => true
                ))
                ->add('country', $show, array(
                    'required'      => false,
                    'disabled'       => true
                ))
                ->add('lat', $show, array(
                    'required'      => false,
                    'disabled'       => true
                ))
                ->add('lng', $show, array(
                    'required'      => false,
                    'disabled'       => true
                ))
        ;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['show_all'] = $options['show_all'];
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'virtual'   => true,
            'show_all'  => false
        );
    }

    public function getName()
    {
        return 'gmap_address';
    }
}