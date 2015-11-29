<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Collections;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Collections\ImageLink;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class ImageLinkAdmin
 *
 * @package SevenManagerBundle\Admin\Collections
 */
class ImageLinkAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $findParent = '/seven-manager/images-link';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Add fields from trait
        $this->getFormFields($formMapper);

        $formMapper
            ->tab('Image + Target')
                ->with(
                    'Select',
                    array(
                        'collapsed' => true,
                        'class'       => 'col-md-12',
                        'box_class'   => 'box box-solid box-danger',
                        'description' => 'Magazine',
                    )
                )
                    ->add(
                        'image',
                        'cmf_media_image',
                        array(
                            'label' => 'Image',
                            'required' => false
                        )
                    )
                    ->add('choice', 'choice_field_mask', array(
                            'choices' => array(
                                'external' => 'External',
                                'internal' => 'Internal'
                            ),
                            'map' => array(
                                'external' => array(
                                    'link',
                                ),
                                'internal' => array(
                                    'internalLink',
                                ),
                            ),
                            'required' => true
                        ))
                    ->end()
                    ->add(
                        'internalLink',
                        'doctrine_phpcr_odm_tree',
                        array(
                            'root_node' => '/seven-manager',
                            'choice_list' => array(),
                            'select_root_node' => false
                        )
                    )
                    ->add(
                        'link',
                        'text',
                        array(
                            'label' => 'External Link'
                        )
                    )
                    ->add(
                        'choice',
                        'choice',
                        array(
                            'expanded' => true,
                            'choices' => array(
                                'self' => 'Self',
                                'blank' => 'Blank',
                            )
                        )
                    )
                ->end()
            ->end();
    }

    /**
     * @param mixed $object
     * @return mixed|string
     */
    public function toString($object)
    {
        return $object instanceof ImageLink && $object->getLabel() ?
            $object->getLabel() : parent::toString($object);
    }
}
