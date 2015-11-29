<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Admin\Menu;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Menu\Menu;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class MenuAdmin
 *
 * @package SevenManagerBundle\Admin\Pages
 */
class MenuAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as getFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/menu';
    protected $isPublishable = false;

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $this->getFormFields($formMapper);
    }

    /**
     * @param mixed $object
     * Add Title Label to breadcrumb
     *
     * @return mixed|string
     */
    public function toString($object)
    {
        return $object instanceof Menu && $object->getTitle() ?
            $object->getTitle() : $this->trans('link_add', array(), 'SonataAdminBundle');
    }
}
