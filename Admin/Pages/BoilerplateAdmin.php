<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Admin\Pages;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use SevenManagerBundle\Document\Pages\Boilerplate;
use SevenManagerBundle\Admin\Traits\DefaultAdmin;

/**
 * Class BoilerplateAdmin
 * @package SevenManagerBundle\Admin\Pages
 */
class BoilerplateAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/boilerplate';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $this->getFormFields($formMapper);

        $formMapper
            ->tab('Content')
                ->with('Content', array(
                    'class'       => 'col-md-6',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Required Content',
                ))
                ->end()
                ->with('Optional', array(
                    'class'       => 'col-md-6',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Optional Content',
                ))
                ->add(
                    'image',
                    'cmf_media_image',
                    array('required' => false)
                )
                ->end()
            ->end()
            ->tab('Principal labels')
                ->with('Optional', array())
                 ->add('label', 'text', array('required' => false))
                 ->add('labelTwo', 'text', array('required' => false))
                 ->add('labelThree', 'text', array('required' => false))
                ->end()
            ->end()
            ->tab('Datepicker')
                ->with('Datepicker')
                    ->add('publicationDateStart', 'sonata_type_datetime_picker', array(
                        'dp_side_by_side'       => true,
                        'dp_use_current'        => false,
                        'dp_use_seconds'        => false,
                        'required' => false
                    ))
                    ->add('publicationDateEnd', 'sonata_type_date_picker', array(
                        'dp_use_current'        => false,
                        'datepicker_use_button' => false,
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab('Range, Color and Seven Type')
                ->with('Seven')
                    ->add('range', 'seven_manager_seven_type', array('required' => false))
                ->end()
                ->with('Color')
                    ->add('color', 'sonata_type_color_selector', array('required' => false))
                ->end()
                ->with('Immutable array')
                    ->add('immutable', 'sonata_type_immutable_array', array(
                        'keys' => array(
                            array('ttl', 'text', array('required' => false)),
                            array('redirect', 'url', array('required' => true)),
                        ),
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab('Body')
                ->with('Body')
                    ->add('content', 'ckeditor', $this->getCkeditorOptions())
                    ->add('richText1', 'sonata_formatter_type', array(
                        'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                        'format_field'   => 'contentFormatter',
                        'source_field'   => 'rawContent',
                        'source_field_options' => array(
                            'attr' => array('class' => 'span10', 'rows' => 20)
                        ),
                        'listener'       => true,
                        'target_field'   => 'richText1',
                        'required' => false
                    ))
                ->end()
            ->end()
            ->tab('Child')
                ->with('Child')
                    ->add(
                        'child',
                        'sonata_type_admin',
                        array(
                            'required'     => false,
                            'by_reference' => true,
                            'btn_catalogue' => true,
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
            ->tab('Many Children')
                ->with('Many Children')
                    ->add(
                        'childrenMany',
                        'sonata_type_collection',
                        array(
                            'label'       => 'Children',
                            'by_reference' => false,
                        ),
                        array(
                            'edit'       => 'inline',
                            'inline'     => 'table',
                            'admin_code' => 'seven_manager.admin.blocks.slideone',
                        )
                    )
                ->end()
            ->end()
            ->tab('Slideshow')
                ->with('Slideshow')
                    ->add(
                        'mapSlideshow',
                        'sonata_type_model',
                        array(
                            'label' => 'Use/Create a slideshow',
                            'required' => false,
                        )
                    )
                ->end()
            ->end()
            ->tab('References')
                ->with('Reference Type')
                    ->add('choice', 'choice_field_mask', array(
                        'choices' => array(
                            'choiceOne' => 'choiceOne',
                            'choiceTwo' => 'choiceTwo',
                        ),
                        'map' => array(
                            'choiceOne' => array(
                                'mapNode',
                                'mapPage',
                                'mapPost',
                                'mapArticle',
                                'mapGallery',
                                'mapForm',
                            ),
                            'choiceTwo' => array(
                                'mapSimple',
                                'mapMany'
                            ),
                        ),
                        'required' => true
                    ))
                ->end()
                ->with('Reference content', array(
                    'class'       => 'col-md-12',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Relate an existing content',
                ))
                    ->add(
                        'mapNode',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Node',
                            'required' => false,
                            'multiple' => false,
                            'by_reference' => false
                        ),
                        array(
                            'sortable' => true
                        )
                    )
                    ->add(
                        'mapPage',
                        'sonata_type_collection',
                        array(
                            'label' => 'Related Page',
                            'required' => false,
                            'by_reference' => false,
                            'type_options' => array('delete' => true),
                        ),
                        array(
                            'edit' => 'inline',
                            'inline' => 'table'
                        )
                    )
                    ->add(
                        'mapPost',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Post',
                            'model_manager' => $this->modelManager,
                            'required' => false,
                            'multiple' => true,
                            'expanded' => false,
                        ),
                        array(
                            'edit' => 'inline',
                            'inline' => 'table'
                        )
                    )
                    ->add(
                        'mapArticle',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Article',
                            'required' => false,
                            'multiple' => false
                        )
                    )
                    ->add(
                        'mapGallery',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Gallery',
                            'required' => false,
                            'multiple' => false
                        )
                    )
                    ->add(
                        'mapForm',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Form',
                            'required' => false,
                            'multiple' => false
                        )
                    )
                    ->add(
                        'mapSimple',
                        'sonata_type_model_autocomplete',
                        array(
                            'property' => 'title',
                            'model_manager' => $this->modelManager,
                            'required' => false,
                        )
                    )
                    ->add(
                        'mapMany',
                        'sonata_type_model_autocomplete',
                        array(
                            'property' => 'title',
                            'model_manager' => $this->modelManager,
                            'required' => false,
                            'multiple' => true,
                        )
                    )
                ->end()
            ->end()
            ->tab('Blocks')
                ->with('Relate Blocks', array(
                    'class'       => 'col-md-12',
                    'box_class'   => 'box box-solid box-danger',
                    'description' => 'Relate an existing content',
                ))
                    ->add(
                        'mapContainer',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Container Block',
                            'required' => false
                        )
                    )
                    ->add(
                        'mapReference',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Reference Block',
                            'required' => false
                        )
                    )
                    ->add(
                        'mapAction',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Action Block',
                            'required' => false
                        )
                    )
                    ->add(
                        'mapSlideshow',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Slideshow Block',
                            'required' => false
                        )
                    )
                    ->add(
                        'mapImage',
                        'sonata_type_model',
                        array(
                            'label' => 'Related Image Block',
                            'required' => false
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
        return $object instanceof Boilerplate && $object->getTitle() ?
            $object->getTitle() : $this->trans('link_add', array(), 'SonataAdminBundle');
    }
}
