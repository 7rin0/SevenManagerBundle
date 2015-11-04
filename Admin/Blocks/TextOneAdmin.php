<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Blocks\TextOne;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class TextOneAdmin
 *
 * @package SevenManagerBundle\Admin\Blocks
 */
class TextOneAdmin extends Admin
{
    use DefaultAdmin;
    protected $parentPath = '/seven-manager/text';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        if ($parentAdmin = null === $this->getParentFieldDescription()) {
            $formMapper
                ->tab('Configuration')
                    ->with('Image Restructure')
                        ->add(
                            'parentDocument',
                            'doctrine_phpcr_odm_tree',
                            array('root_node' => $this->getRootPath(), 'choice_list' => array(), 'select_root_node' => true)
                        )
                        ->add('name', 'text')
                    ->end()
                ->end();
        } else {
            $parentAdmin = $this->getClassName($this->getParentFieldDescription()->getAdmin());
        }

        $formMapper
                ->tab('Content')
                    ->with('Content')
                        ->add('title', 'text', array('required' => false))
                        ->add('subtitle', 'text', array('required' => false))
                        ->add(
                            'parentDocument',
                            'doctrine_phpcr_odm_tree',
                            array('root_node' => $this->getRootPath(), 'choice_list' => array(), 'select_root_node' => true)
                        )
                        ->add(
                            'targetContent',
                            'doctrine_phpcr_odm_tree',
                            array('root_node' => $this->getRootPath(), 'choice_list' => array(), 'select_root_node' => true, 'required' => false))
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
        return $object instanceof TextOne && $object->getLabel()
            ? $object->getLabel()
            : parent::toString($object);
    }
}
