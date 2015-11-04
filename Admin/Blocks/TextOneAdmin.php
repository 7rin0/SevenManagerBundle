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
    use DefaultAdmin {
        configureFormFields as traitFormFields;
    }

    protected $parentPath = '/seven-manager/text';

    /**s
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $this->traitFormFields($formMapper);

        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->add(
                        'targetContent',
                        'doctrine_phpcr_odm_tree',
                        array(
                            'root_node' => $this->getRootPath(),
                            'choice_list' => array(),
                            'select_root_node' => true,
                            'required' => false
                        )
                    )
                    ->remove('resume')
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
        return $object instanceof TextOne && $object->getLabel()
            ? $object->getLabel()
            : parent::toString($object);
    }
}