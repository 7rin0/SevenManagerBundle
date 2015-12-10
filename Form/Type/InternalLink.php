<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 11/11/15
 * Time: 02:39
 */

namespace SevenManagerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\TranslatorInterface;

class InternalLink extends AbstractType
{
    protected $translator;

    /**
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $this->configureOptions($resolver);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'doctrine_phpcr_odm_tree',
                array(
                    'root_node' => '/seven-manager',
                    'select_root_node' => false
                )
            )
        );
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'doctrine_phpcr_odm_tree';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sm_internal_link';
    }
}
