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
    protected $routesRootPath = '/cms/routes';

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
            ->add('isPublishable', 'boolean', array('label' => 'Published'));

    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text')
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

        if ($isParent && $hasRouteChild) {
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
                            'required' => false
                        )
                    )
                    ->end()
                ->end();
        } else {
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
    }

    /**
     * @param $document
     */
    public function preUpdate($document)
    {
        // Vars
        if (method_exists($document, 'getRouteChild')) {
            $routeChildId = $document->getRouteChild()->getId();

            // Set prefix Name
            $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';

            // If routeChild empty or not valid skip validation
            if ($routeChildId === $this->routesRootPath || empty($routeChildId)) {
                $document->setRouteChild(null);
            }
        }

        // Set Child Names/Parents
        if (method_exists($document, 'getChildren')) {
            foreach ($document->getChildren() as $child) {
                if (!$this->modelManager->getNormalizedIdentifier($child)) {
                    if (!$child->getName()) {
                        $child->setName($this->generateName($fatherPrefix));
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
        // Vars
        if (method_exists($document, 'getRouteChild')) {
            $routeChildId = $document->getRouteChild()->getId();

            // Set prefix Name
            $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';

            // If routeChild empty or not valid skip validation
            if ($routeChildId === $this->routesRootPath || empty($routeChildId)) {
                $document->setRouteChild(null);
            }
        }

        //  Create Parent Name if not defined
        if (!$document->getName()) {
            $document->setName($this->generateName($fatherPrefix, '_father_'));
        }

        // Verify if parent exists and attribute document to
        // if not create a new one using this parent
        if (!empty($this->baseRoutePattern)) {
            $parent = $this->modelManager->find(null, $this->baseRoutePattern);

            // If Parent is null create one
            if (!$parent && !empty($this->baseRoutePattern)) {
                global $kernel;
                $dm = $kernel->getContainer()->get('seven_manager.parent_manager');
                $dm->createRecursivePaths($this->baseRoutePattern);
            }

            // Find Parent
            $parent = $this->modelManager->find(null, $this->parentPath);
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
    public function getClassName($class)
    {
        $className = explode('\\', get_class($class));

        return end($className);
    }
}
