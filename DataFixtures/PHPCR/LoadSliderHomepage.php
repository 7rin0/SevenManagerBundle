<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 03/11/15
 * Time: 23:20
 */

namespace SevenManagerBundle\DataFixtures\PHPCR;

use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;
use SevenManagerBundle\Document\Containers\Slideshow;

/**
 * Class LoadSliderSlideshow
 *
 * @package SevenManagerBundle\DataFixtures\PHPCR
 */
class LoadSliderSlideshow extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $objectManager)
    {
        if (!$objectManager instanceof DocumentManager) {
            $class = get_class($objectManager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }

        // Parent Document
        $parentPath = $objectManager->find(null, '/seven-manager/slideshow');

        // Child Document - create a new Page object
        $slideshow = new Slideshow();
        $slideshow->setName('slideshow'); // the name of the node
        $slideshow->setTitle('Main page');
        $slideshow->setContent('Edit me with Create JS or using Admin');

        // Atach document to parent
        $slideshow->setParentDocument($parentPath);

        // Persist and flush
        $objectManager->persist($slideshow);
        $objectManager->flush();
    }

    /**
     * @param DocumentManager $documentManager
     * @param                 $parent
     * @param                 $name
     * @param                 $title
     * @param                 $content
     *
     * @return Slideshow
     */
    protected function createSlideshow(DocumentManager $documentManager, $parent, $name, $title, $content)
    {
        $slideshow = new Slideshow();
        $slideshow->setTitle($title);
        $slideshow->setContent($content);

        $documentManager->persist($slideshow);

        return $slideshow;
    }
}
