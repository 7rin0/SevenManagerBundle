<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 03/11/15
 * Time: 23:20
 */

namespace SevenManagerBundle\DataFixtures\PHPCR;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;
use SevenManagerBundle\Document\Blocks\ImageOne;
use SevenManagerBundle\Document\Containers\Slideshow;
use SevenManagerBundle\Document\Pages\Homepage as HomepageDocument;

/**
 * Class Homepage
 *
 * @package SevenManagerBundle\DataFixtures\PHPCR
 */
class Homepage extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @param ObjectManager $objectManager
     */
    public function load(ObjectManager $objectManager)
    {
        if (!$objectManager instanceof DocumentManager) {
            $class = get_class($objectManager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }

        // Child Document - create a new Page object
        $slideshow = $this->createSlideshow($objectManager);
        $homepage = $this->createHomepage($objectManager);

        // Reference One: Slideshow with Homepage
        $homepage->setMapSlideshow($slideshow);

        // Flush Interface
        $objectManager->flush();
    }

    /**
     * @param DocumentManager $documentManager
     *
     * @return HomepageDocument
     */
    protected function createHomepage(DocumentManager $documentManager)
    {
        $parentPath = $documentManager->find(null, '/seven-manager/homepage');
        $homepage = new HomepageDocument();
        $homepage->setTitle('Seven Manager Project');
        $homepage->setName('homepage');
        $homepage->setContent('Powered by Symfony CMF');
        $homepage->setParentDocument($parentPath);
        $documentManager->persist($homepage);

        return $homepage;
    }

    /**
     * @param DocumentManager $documentManager
     *
     * @return Slideshow
     */
    protected function createSlideshow(DocumentManager $documentManager)
    {
        // Create Image Document and load image
        $publicResources = dirname(__FILE__) . '/../../Resources/public';
        $parentPath = $documentManager->find(null, '/seven-manager/slideshow');

        $slideshow = new Slideshow();
        $slideshow->setName('SlideshowOne');
        $slideshow->setTitle('First Slideshow loaded by fixture');
        $slideshow->setParentDocument($parentPath);

        // Create Image Document and load image
        for ($a = 1; $a <= 3; $a++) {
            $image = new ImageOne();
            $upload = new UploadedFile($publicResources . '/img/slides/'. $a .'.jpg', $a . '.jpg');
            $image->setName('Image'. $a);
            $image->setTitle('Image '. $a .' loaded by fixture');
            $image->setSubtitle('Image ' . $a);
            $image->setParentDocument($parentPath);
            $image->setImage($upload);
            $slideshow->addChildren($image);
        }

        // Persist and flush
        $documentManager->persist($slideshow);

        return $slideshow;
    }
}
