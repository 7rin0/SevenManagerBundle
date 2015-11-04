<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Blocks\ImageOne;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class ImageOneAdmin
 * @package SevenManagerBundle\Admin\Blocks
 */
class ImageOneAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as traitFormFields;
    }

    protected $parentPath = '/seven-manager/images';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $this->traitFormFields($formMapper);

        if ($parentAdmin = $this->getParentFieldDescription() != null) {
            $parentAdmin = $this->getClassName($this->getParentFieldDescription()->getAdmin());
        }

        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->add('label', 'text', array('required' => false))
                    ->add('image', 'cmf_media_image', array('required' => false))
                    ->remove('resume')
                    ->remove('body')
                ->end()
            ->end();

        if ($parentAdmin === 'HomepageAdmin') {
            $formMapper
                ->remove('subtitle')
                ->remove('label');
        }

    }

    /**
     * @param mixed $object
     *
     * @return mixed|string
     */
    public function toString($object)
    {
        return $object instanceof ImageOne && $object->getLabel()
            ? $object->getLabel()
            : parent::toString($object);
    }
}
