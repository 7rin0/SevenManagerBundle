<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use SevenManagerBundle\Admin\Traits\DefaultMenuAdmin;
use SevenManagerBundle\Document\Blocks\LinkOne;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class LinkOneAdmin
 * @package SevenManagerBundle\Admin\Blocks
 */
class LinkOneAdmin extends Admin
{
    use DefaultMenuAdmin {
        configureFormFields as traitFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/links';
    protected $isPublishable = false;
    protected $publishable = false;

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
                    ->remove('children')
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
        return $object instanceof LinkOne && $object->getLabel()
            ? $object->getLabel()
            : parent::toString($object);
    }
}
