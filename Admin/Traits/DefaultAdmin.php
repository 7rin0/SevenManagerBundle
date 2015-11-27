<?php
/**
 * User: lseverino
 * Date: 21/10/15
 * Time: 15:40
 */

namespace SevenManagerBundle\Admin\Traits;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DefaultAdmin
 *
 * @package SevenManagerBundle\Admin\Traits
 */
trait DefaultAdmin
{
    use CkeditorOptions;

    // TODO: Receive this data by parameters
    protected $documentRootPath = '/';
    protected $routesRootPath = '/';

    /**
     * @param $documentRootPath
     *
     * @return $this
     */
    public function setDocumentRootPath($documentRootPath)
    {
        $this->documentRootPath = $documentRootPath;
        return $this;
    }

    /**
     * @param $routesRootPath
     *
     * @return $this
     */
    public function setRoutesRootPath($routesRootPath)
    {
        $this->routesRootPath = $routesRootPath;
        return $this;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => true,
        ));
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
    }

    /**
     * @return bool
     */
    public function supportsPreviewMode()
    {
        return $this->supportsPreviewMode = true;
    }

    /**
     * @param ShowMapper $showMapper
     */
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('name')
            ->add('subtitle')
            ->add('content')
            ->add('parentDocument')
            ->add('isPublishable', 'boolean', array('label' => 'Published'));

    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text')
            ->add(
                'parentDocument.parentDocument',
                null,
                array(
                    'label' => 'Parent',
                    'sortable' => false,
                )
            )
            ->add('name', 'text', array(
                'header_style' => 'width: 10%; text-align: center',
                'header_class' => 'center',
                'row_align' => 'center'
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show'   => array(),
                    'edit'   => array(),
                    'delete' => array(),
                )
            ))
            ->add('isPublishable', 'boolean', array('label' => 'Published'));
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', 'doctrine_phpcr_string')
            ->add('subtitle', 'doctrine_phpcr_string')
            ->add('content', 'doctrine_phpcr_string')
            ->add('name', 'doctrine_phpcr_nodename');
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        // Verify if document is not child
        $isParent = $this->getParentFieldDescription() === null;
        $hasRouteChild = method_exists($this->getClass(), 'getRouteChild');
        $adminClassname = $this->getClassName();
        $notMenuAdmin = $adminClassname != 'MenuAdmin';

        if ($isParent && $hasRouteChild && $notMenuAdmin) {
            $formMapper
                ->tab('Configuration')
                    ->with(
                        'Add to Menu',
                        array(
                            'collapsed' => true,
                            'class'       => 'col-md-4',
                            'box_class'   => 'box box-solid box-danger',
                            'description' => 'Add to Menu',
                        )
                    )
                    // Add fields
                    ->end()
                    ->with(
                        'Document Father',
                        array(
                            'collapsed' => true,
                            'class'       => 'col-md-4',
                            'box_class'   => 'box box-solid box-danger',
                            'description' => 'Parent/Name',
                        )
                    )
                        ->add(
                            'parentDocument',
                            'doctrine_phpcr_odm_tree',
                            array(
                                'root_node' => $this->documentRootPath,
                                'choice_list' => array(),
                                'select_root_node' => true,
                                'required' => false
                            )
                        )
                        ->add('name', 'text', array('required' => false))
                    ->end()
                    ->with(
                        'Route Father',
                        array(
                            'collapsed' => true,
                            'class'       => 'col-md-4',
                            'box_class'   => 'box box-solid box-danger',
                            'description' => 'Route/URL',
                        )
                    )
                    ->add(
                        'routeChild',
                        'doctrine_phpcr_odm_tree',
                        array(
                            'root_node' => $this->routesRootPath,
                            'choice_list' => array(),
                            'select_root_node' => true,
                            'label'  => 'Select Route',
                            'required' => false,
                        )
                    )
                    ->end()
                ->end();
        } elseif ($isParent && $notMenuAdmin) {
            $formMapper
                ->tab('Configuration')
                    ->with(
                        'Document Father',
                        array(
                            'collapsed' => true,
                            'class'       => 'col-md-4',
                            'box_class'   => 'box box-solid box-danger',
                            'description' => 'Parent/Name',
                        )
                    )
                        ->add(
                            'parentDocument',
                            'doctrine_phpcr_odm_tree',
                            array(
                                'root_node' => $this->documentRootPath,
                                'choice_list' => array(),
                                'select_root_node' => true,
                                'required' => false
                            )
                        )
                        ->add('name', 'text', array('required' => false))
                    ->end()
                ->end();
        }

        // Configuration, Content and Helpers properties
        $formMapper
            ->tab('Content')
                ->with('Content')
                    ->add('title', 'text', array('required' => true))
                    ->add('subtitle', 'text', array('required' => false))
                    ->add('resume', 'text', array('required' => false))
                    ->add('body', 'ckeditor', $this->getCkeditorOptions())
                ->end()
            ->end()
            ->setHelps(array(
                'title'    => 'seven_manager.admin.fields.title.helper',
                'subtitle' => 'seven_manager.admin.fields.subtitle.helper',
                'name'     => 'seven_manager.admin.fields.name.helper',
                'content'  => 'seven_manager.admin.fields.content.helper',
            ));

        // "Globalize" this
        $smEventListener =
            function (FormEvent $event) use ($formMapper) {

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

        // Add event listener
        $formMapper
            ->getFormBuilder()
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                $smEventListener
            );
    }

    /**
     * @param $document
     */
    public function preUpdate($document)
    {
        // Set route
        if (method_exists($document, 'getRouteChild')) {
            $routeChildId = $document->getRouteChild()->getId();

            // Set prefix Name
            $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';

            // If routeChild empty or not valid skip validation
            if ($routeChildId === $this->routesRootPath || empty($routeChildId)) {
                $document->setRouteChild(null);
            }
        }

        // Prepare Children
        if (method_exists($document, 'getChildren')) {
            foreach ($document->getChildren() as $child) {
                if (!$this->modelManager->getNormalizedIdentifier($child)) {
                    if (!$child->getName()) {
                        $child->setName($this->generateName($fatherPrefix));
                    }
                }
            }
        }

        if (method_exists($document, 'getChildrenMany')) {
            // Assign new names to children
            foreach ($document->getChildrenMany($document) as $child) {
                if (!$this->modelManager->getNormalizedIdentifier($child)) {
                    if (!$child->getName()) {
                        $child->setName($this->generateName($fatherPrefix));
                    }
                    if (!$child->getParentDocument()) {
                        $child->setParentDocument($document);
                    }
                }
            }
        }
    }

    /**
     * @param $document
     *
     * @return $this
     */
    public function postUpdate($document)
    {
        return $document;
    }

    /**
     * @param $document
     * @return $this
     */
    public function prePersist($document)
    {
        // Set prefix Name
        $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';

        // Default Parent path/tree
        $parentPath = method_exists($document->getParentDocument(), 'getId') ?
            $document->getParentDocument()->getId() : $this->baseRoutePattern;
        $parentPath = empty($parentPath) || $parentPath == '/' ? $this->baseRoutePattern : $parentPath;

        //  Create document Name if not defined
        if (!$document->getName()) {
            $document->setName($this->generateName($fatherPrefix, '_father_'));
        }

        // Vars
        if (method_exists($document, 'getRouteChild')) {
            $routeChildId = $document->getRouteChild()->getId();

            // If routeChild empty or not valid skip validation
            if ($routeChildId === $this->routesRootPath || empty($routeChildId)) {
                $document->setRouteChild(null);
            }
        }

        // Find parent and create new one if null
        if (!empty($parentPath)) {
            // If Parent is null create one
            if (!$this->modelManager->find(null, $parentPath)) {
                global $kernel;
                $dm = $kernel->getContainer()->get('seven_manager.parent_manager');
                $dm->createRecursivePaths($parentPath);
            }

            // Find parentPath and set parentDocument Parent
            $parent = $this->modelManager->find(null, $parentPath);
            $document->setParentDocument($parent);

            // Set Father
            if (method_exists($document, 'getChildren')) {
                // Assign new names to children
                foreach ($document->getChildren() as $child) {
                    if (!$this->modelManager->getNormalizedIdentifier($child)) {
                        if (!$child->getName()) {
                            $child->setName($this->generateName($fatherPrefix));
                        }
                    }
                }
            }

            if (method_exists($document, 'getChildrenMany')) {
                // Assign new names to children
                foreach ($document->getChildrenMany($document) as $child) {
                    if (!$this->modelManager->getNormalizedIdentifier($child)) {
                        if (!$child->getName()) {
                            $child->setName($this->generateName($fatherPrefix));
                        }
                        if (!$child->getParentDocument()) {
                            $child->setParentDocument($document);
                        }
                    }
                }
            }
        }

        return $this;
    }

    /**
     * @param $document
     *
     * @return $this
     */
    public function postPersist($document)
    {
        return $document;
    }

    /**
     * @param $document
     *
     * @return $this
     */
    public function preRemove($document)
    {
        return $document;
    }

    /**
     * @param $document
     *
     * @return $this
     */
    public function postRemove($document)
    {
        return $document;
    }

    /**
     * @param        $fatherPrefix
     * @param string $context
     *
     * @return string
     */
    private function generateName($fatherPrefix, $context = '_child_')
    {
        return $fatherPrefix . $context . uniqid();
    }

    /**
     * {@inheritdoc}
     */
    public function getExportFormats()
    {
        return array(
            'json', 'xml', 'csv', 'xls',
        );
    }

    /**
     * @return array
     */
    public function getExportFields()
    {
        return $this->modelManager->getExportFields($this->getClass());
    }

    /**
     * {@inheritdoc}
     */
    public function getDataSourceIterator()
    {
        $datagrid = $this->getDatagrid();
        $datagrid->buildPager();

        return $this->modelManager->getDataSourceIterator($datagrid, $this->getExportFields());
    }

    /**
     * @param $class
     *
     * @return array
     */
    public function getClassName($class = null)
    {
        $class = !$class ? $this : $class;
        $className = explode('\\', get_class($class));

        return end($className);
    }

    /**
     * @param $document
     *
     * @return array
     */
    public function getDocumentChildren($document)
    {
        if (method_exists($document, 'getChildren')) {
            return $document->getChildren();
        } elseif (method_exists($document, 'getChildrenMany')) {
            return $document->getChildrenMany();
        }

        return array();
    }
}
