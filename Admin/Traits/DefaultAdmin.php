<?php
/**
 * User: lseverino
 * Date: 21/10/15
 * Time: 15:40
 */

namespace SevenManagerBundle\Admin\Traits;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class DefaultAdmin
 *
 * @package SevenManagerBundle\Admin\Traits
 */
trait DefaultAdmin
{

    public function supportsPreviewMode()
    {
        parent::supportsPreviewMode();
        return $this->supportsPreviewMode = true;
    }

    /**
     * @param ShowMapper $showMapper
     */
    public function configureShowFields(ShowMapper $showMapper)
    {
        parent::configureShowFields($showMapper);
        $showMapper
            ->add('id')
            ->add('title')
            ->add('name')
            ->add('subtitle')
            ->add('content')
            ->add('True or False', 'boolean');

    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);
        $listMapper
            ->addIdentifier('title', 'text')
            ->addIdentifier('name', 'text')
            ->addIdentifier('id', 'text')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show'   => array(),
                    'edit'   => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);
        $datagridMapper
            ->add('title', 'doctrine_phpcr_string')
            ->add('subtitle', 'doctrine_phpcr_string')
            ->add('content', 'doctrine_phpcr_string')
            ->add('name', 'doctrine_phpcr_nodename');
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate($children)
    {
        foreach ($children->getChildren() as $child) {
            if (!$this->modelManager->getNormalizedIdentifier($child)) {

                $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';
                $child->setName($this->generateName($fatherPrefix));
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
        return $this;
    }

    /**
     * @param $document
     * @return $this
     */
    public function prePersist($document)
    {

        // Verify if parent exists and attribute document to
        // if not create a new one using this parent
        if (!empty($this->parentPath)) {
            $parent = $this->getModelManager()->find(null, $this->parentPath);

            // If Parent is null create one
            if(!$parent && !empty($this->parentPath)) {

                global $kernel;
                $dm = $kernel->getContainer()->get('seven_manager.parent_manager');
                $dm->createRecursivePaths($this->parentPath);

            }

            // Find Parent
            $parent = $this->getModelManager()->find(null, $this->parentPath);
            $document->setParentDocument($parent);

            // Set Father
            if(method_exists($document, 'getChildren')) {

                // Assign new names to children
                foreach ($document->getChildren() as $child) {
                    if (!$this->modelManager->getNormalizedIdentifier($child)) {
                        $fatherPrefix = !empty($this->classnameLabel) ? strtolower($this->classnameLabel) : 'undefined_father';
                        $child->setName($this->generateName($fatherPrefix));
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
        return $this;
    }

    /**
     * @param $document
     *
     * @return $this
     */
    public function preRemove($document)
    {
        return $this;
    }

    /**
     * @param $document
     *
     * @return $this
     */
    public function postRemove($document)
    {
        return $this;
    }

    /**
     * @param $fatherPrefix
     *
     * @return string
     */
    private function generateName($fatherPrefix)
    {
        return $fatherPrefix . '_child_' . time();
    }

    /**
     * @return array
     */
    public function getExportFormats()
    {
        return array(/**'json', 'xml', 'csv', 'xls'**/);
    }
}
