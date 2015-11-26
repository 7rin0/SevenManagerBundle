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

        // "Globalize" this
        $smEventListener =
            function (FormEvent $event, $isParent) use ($formMapper) {

                $isParent = $this->getParentFieldDescription() === null;

                // Get form
                $formData = $event->getForm();
                $classImplements = class_implements($this->getClass()); // To be use to check blockInterface, or not

                // Verify if is a Block or a Parent Document
                if (!$isParent) {
                    // Load groups and tabs
                    $formTabs = $this->getFormTabs();
                    if (!empty($formTabs['default']['groups'])) {
                        // Find tabs and groups
                        $hasPublishable = array_search('form.group_publish_workflow', $formTabs['default']['groups']);
                        $hasLocale      = array_search('form.group_general', $formTabs['default']['groups']);

                        // TODO: Create handler remove by form tab or form field all components !!! DRY
                        if (true) {
                            if ($hasPublishable !== false) {
                                $formGroup = $this->getFormGroups();
                                $formTabs  = $this->getFormTabs();
                                unset($formGroup['form.group_publish_workflow']);
                                unset($formTabs['default']['groups'][$hasPublishable]);
                                $this->setFormGroups($formGroup);
                                $this->setFormTabs($formTabs);
                            }

                            if ($hasLocale !== false) {
                                $formGroup = $this->getFormGroups();
                                $formTabs  = $this->getFormTabs();
                                unset($formGroup['form.group_general']);
                                unset($formTabs['default']['groups'][$hasLocale]);
                                $this->setFormGroups($formGroup);
                                $this->setFormTabs($formTabs);
                            }

                            // Remove locale only if this admin is child
                            if ($formData->has('locale')) {
                                $formData->remove('locale');
                                $formMapper->remove('locale');
                            }

                            // Remove undesired fields
                            if ($formData->has('publish_start_date')) {
                                $formData
                                    ->remove('publish_start_date')
                                    ->remove('publish_end_date')
                                    ->remove('publishable');

                                $formMapper
                                    ->remove('publish_start_date')
                                    ->remove('publish_end_date')
                                    ->remove('publishable');
                            }

                            // If used as child remove locale, locale is set by default
                            // no need extra field in this case
                        }
                    } else {
                        // At the end of the future handler remove empty groups to avoid empty tabs
                        // Using get array_values and verify each group
                        $formTabs = $this->getFormTabs();
                        if (empty($formTabs['default']['groups'])) {
                            unset($formTabs['default']);
                            $this->setFormTabs($formTabs);
                        }
                    }

                }
            };

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
                $smEventListener
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
