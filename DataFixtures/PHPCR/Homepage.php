<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 03/11/15
 * Time: 23:20
 */

namespace SevenManagerBundle\DataFixtures\PHPCR;

use SevenManagerBundle\Document\Collections\FontTitleDescTarget;
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

        // Atach services to Services Bar @Homepage
        $fontAwesomeList = array('fa-automobile', 'fa-commenting', 'fa-child');
        for ($a = 1; $a <= 3; $a++) {
            $service = new FontTitleDescTarget();
            $service->setName('Service'. $a);
            $service->setTitle('Service '. $a .' loaded by fixture');
            $service->setLabel($fontAwesomeList[$a-1]);
            $service->setSubtitle('Subtitle of Service ' . $a);
            $service->setResume('Resume of Service ' . $a);
            $service->setParentDocument($homepage);
            $homepage->addChildrenManyTwo($service);
        }

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
        $homepage->setName('homepage');
        $homepage->setTitle('Seven Manager Project');
        $homepage->setSubtitle('So many examples of How to create a simple documents with Sonata');
        $homepage->setContent('Powered by Symfony CMF');
        $homepage->setLabel('Section One');
        $homepage->setLabelTwo('Section Two');
        $homepage->setLabelThree('Section Three');
        $homepage->setBody('This field used Ckeditor as main editor and frontjs to dynamic edition on the fly');
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
            $image->setSubtitle('Subtitle of Image ' . $a);
            $image->setParentDocument($parentPath);
            $image->setImage($upload);
            $slideshow->addChildren($image);
        }

        // Persist and flush
        $documentManager->persist($slideshow);

        return $slideshow;
    }
}
