<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 03/11/15
 * Time: 23:20
 */

namespace SevenManagerBundle\DataFixtures\PHPCR;

use SevenManagerBundle\Document\Blocks\ImageOne;
use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;
use SevenManagerBundle\Document\Containers\Slideshow;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class LoadSliderHomepage
 *
 * @package SevenManagerBundle\DataFixtures\PHPCR
 */
class LoadSliderHomepage extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
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
        global $kernel;
        $docRoot = $kernel->getRootDir();
        $publicResources = dirname(__FILE__) . '/../../Resources/public';

        if (!$objectManager instanceof DocumentManager) {
            $class = get_class($objectManager);
            throw new \RuntimeException("Fixture requires a PHPCR ODM DocumentManager instance, instance of '$class' given.");
        }
        // Parent Document
        $parentPath = $objectManager->find(null, '/seven-manager/slideshow');

        // Create Image Document and load image
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
        $documentManager->flush();

        return $slideshow;
    }
}
