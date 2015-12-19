<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Blocks\TitleText;

/**
 * Class TitleTextAdmin
 *
 * @package SevenManagerBundle\Admin\Blocks
 */
class TitleTextAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/title-text';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Add fields from trait
        $this->getFormFields($formMapper);

        // Set custom to this admin
        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->remove('resume')
                    ->remove('subtitle')
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
        return $object instanceof TitleText && $object->getLabel() ?
            $object->getLabel() : parent::toString($object);
    }
}
