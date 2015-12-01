<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Admin\Pages;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use SevenManagerBundle\Document\Pages\Homepage;
use SevenManagerBundle\Admin\Traits\DefaultAdmin;

/**
 * Class HomepageAdmin
 *
 * @package SevenManagerBundle\Admin\Pages
 */
class HomepageAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/homepage';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $this->getFormFields($formMapper);

        $formMapper
            ->tab('Content')
                ->with('Content', array(
                    'class'       => 'col-md-8',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Text fields',
                ))
                    ->add('title', 'text')
                    ->add('subtitle', 'text', array('required' => false))
                    ->add('content', 'ckeditor', $this->getCkeditorOptions())
                ->end()
                ->with('Image', array(
                    'class'       => 'col-md-4',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Media fields',
                ))
                    ->add(
                        'child',
                        'sonata_type_admin',
                        array(
                            'label'       => 'Image One',
                            'required'     => false,
                            'by_reference' => true,
                            'btn_catalogue' => false,
                        ),
                        array(
                            'edit'       => 'inline',
                            'inline'     => 'table',
                            'multiple'   => false,
                            'sortable'   => 'position',
                            'admin_code' => 'seven_manager.admin.blocks.slideone',
                        )
                    )
                ->end()
            ->end()
            ->tab('Labels')
                ->with('Optional', array())
                 ->add('label', 'text', array('required' => false))
                 ->add('labelTwo', 'text', array('required' => false))
                 ->add('labelThree', 'text', array('required' => false))
                ->end()
            ->end()
            ->tab('Slideshow')

                ->with('Slideshow')
                    ->add(
                        'choice',
                        'choice_field_mask',
                        array(
                            'label' => 'Add or select a slideshow',
                            'choices' => array(
                                'choiceOne' => 'Select a slideshow',
                                'choiceTwo' => 'Create a slideshow',
                            ),
                            'map' => array(
                                'choiceOne' => array(
                                    'mapSlideshow',
                                ),
                                'choiceTwo' => array(
                                    'childrenMany',
                                ),
                            ),
                            'required' => true
                        )
                    )
                    ->add(
                        'childrenMany',
                        'sonata_type_collection',
                        array(
                            'label' => 'Create Slideshow',
                            'by_reference' => false,
                        ),
                        array(
                            'edit'       => 'inline',
                            'inline'     => 'table',
                            'sortable'   => 'position',
                            'admin_code' => 'seven_manager.admin.blocks.slideone',
                        )
                    )
                    ->add(
                        'mapSlideshow',
                        'sonata_type_model',
                        array(
                            'label' => 'Use/Create a slideshow',
                            'model_manager' => $this->modelManager,
                            'required' => false,
                            'multiple' => false,
                        )
                    )

                ->end()
            ->end();
    }

    /**
     * @param mixed $object
     * Add Title Label to breadcrumb
     *
     * @return mixed|string
     */
    public function toString($object)
    {
        return $object instanceof Homepage && $object->getTitle() ?
            $object->getTitle() : $this->trans('link_add', array(), 'SonataAdminBundle');
    }
}
