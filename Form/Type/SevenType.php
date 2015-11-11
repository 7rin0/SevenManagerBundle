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

class SevenType extends AbstractType
{
    const TYPE_IS_EQUAL = 1;
    const TYPE_IS_NOT_EQUAL = 2;

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
        $resolver->setDefaults(array(
            'choices' => array(
                self::TYPE_IS_EQUAL     => $this->translator->trans('seven_manager.form.type.seven.equal', array(), 'messages'),
                self::TYPE_IS_NOT_EQUAL     => $this->translator->trans('seven_manager.form.type.seven.notequal', array(), 'messages'),
            ),
        ));
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'choice';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'seven_manager_seven_type';
    }
}
