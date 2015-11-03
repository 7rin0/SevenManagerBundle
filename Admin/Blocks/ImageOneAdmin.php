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
use Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * Class ImageOneAdmin
 * @package SevenManagerBundle\Admin\Blocks
 */
class ImageOneAdmin extends Admin
{
    use DefaultAdmin;

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
        $listMapper
            ->addIdentifier('id', 'text')
            ->add('name', 'text');
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        if (null === $this->getParentFieldDescription()) {
            $formMapper
                ->tab('Image route')
                ->with('Image Restructure')
                ->add(
                    'parentDocument',
                    'doctrine_phpcr_odm_tree',
                    array('root_node' => $this->getRootPath(), 'choice_list' => array(), 'select_root_node' => true)
                )
                ->add('name', 'text')
                ->end()
                ->end();
        }

        $formMapper
            ->tab('Image content')
            ->with('Image Restructure')
            ->add('title', 'text', array('required' => false))
            ->add('subtitle', 'text', array('required' => false))
            ->add('label', 'text', array('required' => false))
            ->add('image', 'cmf_media_image', array('required' => false))
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
        return $object instanceof ImageOne && $object->getLabel()
            ? $object->getLabel()
            : parent::toString($object);
    }
}
