<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 14:31
 */

namespace SevenManagerBundle\Admin\Blocks;

use SevenManagerBundle\Admin\Traits\DefaultAdmin;
use SevenManagerBundle\Document\Blocks\ImageOne;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

/**
 * Class ImageOneAdmin
 * @package SevenManagerBundle\Admin\Blocks
 */
class ImageOneAdmin extends Admin
{
    use DefaultAdmin {
        configureFormFields as traitFormFields;
    }

    protected $baseRoutePattern = '/seven-manager/images';

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Add fields from trait
        $this->traitFormFields($formMapper);

        dump($this->getClass());

        // Set custom to this admin
        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->add('label', 'text', array('required' => false))
                    ->add('image', 'cmf_media_image', array('required' => false))
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
        $thisDocument = $this->getClass();
        return $object instanceof ImageOne && $object->getLabel() ?
            $object->getLabel() : parent::toString($object);
    }
}
