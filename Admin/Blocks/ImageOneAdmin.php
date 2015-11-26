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
        $this->traitFormFields($formMapper);

        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->add('label', 'text', array('required' => false))
                    ->add('image', 'cmf_media_image', array('required' => false))
                    ->remove('resume')
                    ->remove('body')
                ->end()
            ->end();

        // Add event listener
        $formMapper
            ->getFormBuilder()
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                function (FormEvent $event) use ($formMapper) {

                    // Get form
                    $form = $event->getForm();
                    $classImplements = class_implements($this->getClass());

                    // Unset groups and forms
                    $formGroup = $this->getFormGroups();
                    $formTabs = $this->getFormTabs();

                    // Verify if is a Block or a Parent Document
                    if ($classImplements['Sonata\BlockBundle\Model\BlockInterface']) {
                        $hasPublishable = array_search('form.group_publish_workflow', $formTabs['default']['groups']);

                        // TODO: Create handler remove by form tab or form field all components
                        if ($hasPublishable !== false) {
                            unset($formGroup['form.group_publish_workflow']);
                            unset($formTabs['default']['groups'][$hasPublishable]);
                            $this->setFormGroups($formGroup);
                            $this->setFormTabs($formTabs);
                        }

                        // Remove undesired fields
                        if ($form->has('publish_start_date')) {
                            $form
                                ->remove('publish_start_date')
                                ->remove('publish_end_date')
                                ->remove('publishable');

                            $formMapper
                                ->remove('publish_start_date')
                                ->remove('publish_end_date')
                                ->remove('publishable');
                        }
                    }
                }
            );

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
