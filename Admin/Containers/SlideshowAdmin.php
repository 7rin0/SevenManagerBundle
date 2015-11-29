<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 10:31
 */

namespace SevenManagerBundle\Admin\Containers;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Containers\Slideshow;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class SlideshowAdmin
 *
 * @package SevenManagerBundle\Admin\Containers
 */
class SlideshowAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/slideshow';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Get base of shared FormMapper Interface
        $this->getFormFields($formMapper);

        // Add custom to FormMapper Interface
        $formMapper
            ->tab('Images')
                ->with('Images')
                    ->add(
                        'children',
                        'sonata_type_collection',
                        array(),
                        array(
                            'edit' => 'inline',
                            'inline' => 'table',
                            'admin_code' => 'seven_manager.admin.blocks.slideone',
                            'sortable'  => 'position',
                        )
                    )
                ->end()
            ->end();
    }

    /**
     * @param mixed $object
     *
     * @return string
     */
    public function toString($object)
    {
        return $object instanceof Slideshow && $object->getTitle() ?
            $object->getTitle() : $this->trans('link_add', array(), 'SonataAdminBundle');
    }
}
