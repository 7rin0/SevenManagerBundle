<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 22/10/15
 * Time: 11:11
 */

namespace SevenManagerBundle\Manager;

use Doctrine\ODM\PHPCR\DocumentManager;

/**
 * Class StationManager
 * @package SevenManagerBundle\Manager
 */
class StationManager extends DocumentManager
{
    protected $documentManager;

    public function __construct()
    {
        global $kernel;
        $this->documentManager = $kernel->getContainer()->get( 'doctrine_phpcr' )->getManager();
    }

    /**
     * @param array $options
     *
     * @return mixed
     */
    public function getOneDocumentBy(array $options)
    {

        // Default options
        $options['dump']     = empty($options['dump']) ? false : $options['dump'];
        $options['property'] = empty($options['property']) ? 'name' : $options['property'];

        // Get Document Repository
        $getRepository = $this->documentManager->getRepository('SevenManagerBundle:' . $options['document']);

        // Example array('id' => '/seven-manager/homepage/index')
        $getDocument = $getRepository->findOneBy(array($options['property'] => $options['value']));

        // Dump if true
        if ($options['dump'] === true) {
            dump($getDocument);
        }

        return $getDocument;
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

    /**
     * @return mixed
     */
    public function getHomepage()
    {
        return $this->getOneDocumentBy(
            array(
                'document' => 'Pages\Homepage',
                'property' => 'name',
                'value'    => 'homepage',
                'dump'     => false,
            )
        );
    }

    /**
     * @param $homepage
     *
     * @return array
     */
    public function getSlideshowByEntity($homepage)
    {

        // If Homepage is defined
        if ($homepage) {

            // Selected slideshow
            $slideshowName = $homepage->getMapSlideshow();

            // If Slideshow is selected
            if ($slideshowName) {

                // Get Slideshow
                $slideshow = $this->getOneDocumentBy(
                    array(
                        'document' => 'Containers\\' . $this->getClassName($slideshowName),
                        'property' => 'name',
                        'value'    => $slideshowName->getName(),
                        'dump'     => false,
                    )
                );

                // Get Slideshow Images
                $children = $this->documentManager->getChildren($slideshow);

                // Dev Slideshow
                foreach ($children as $imageBlock) {

                    // Get Slideshow
                    $slideTypeOne = $this->getOneDocumentBy(
                        array(
                            'document' => 'Blocks\\' . $this->getClassName($imageBlock),
                            'property' => 'name',
                            'value'    => $imageBlock->getName(),
                            'dump'     => true,
                        )
                    );

                }
                return $children;
            }
        }
        return array();
    }
}
