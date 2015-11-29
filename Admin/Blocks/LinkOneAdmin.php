<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Blocks\LinkOne;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class LinkOneAdmin
 * @package SevenManagerBundle\Admin\Blocks
 */
class LinkOneAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as traitFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/links';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Add fields from trait
        $this->traitFormFields($formMapper);

        // Set custom to this admin
        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->add('label', 'text', array('required' => false))
                ->end()
            ->end();
    }

    /**
     * @param mixed $object
     *
     * @return mixed|string
     */
    public function toString($object)
    {
        return $object instanceof LinkOne && $object->getLabel() ?
            $object->getLabel() : parent::toString($object);
    }
}
