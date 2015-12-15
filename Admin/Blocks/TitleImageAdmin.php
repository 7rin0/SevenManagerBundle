<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Blocks\TitleImage;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class TitleImageAdmin
 * @package SevenManagerBundle\Admin\Blocks
 */
class TitleImageAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/images';

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
                    ->add('image', 'cmf_media_image', array('required' => false))
                    ->remove('resume')
                    ->remove('subtitle')
                    ->remove('body')
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
        return $object instanceof TitleImage && $object->getLabel() ?
            $object->getLabel() : parent::toString($object);
    }
}
