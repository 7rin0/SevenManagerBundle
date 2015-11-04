<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 03/11/15
 * Time: 23:20
 */

namespace SevenManagerBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\PHPCR\DocumentManager;
use SevenManagerBundle\Document\Pages\Homepage;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadHomepage extends ContainerAware implements FixtureInterface, OrderedFixtureInterface
{
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
        $parentPath = $objectManager->find(null, '/seven-manager/homepage');

        // Child Document - create a new Page object
        $homepage = new Homepage();
        $homepage->setName('homepage'); // the name of the node
        $homepage->setTitle('Main page');
        $homepage->setContent('Edit me with Create JS or using Admin');

        // Atach document to parent
        $homepage->setParentDocument($parentPath);

        // Persist and flush
        $objectManager->persist($homepage);
        $objectManager->flush();

        //$this->createPage($manager, $root, 'about', 'About us', 'Some information about us', 'The about us page with some content');

    }

    /**
     * @param DocumentManager $documentManager
     * @param                 $parent
     * @param                 $name
     * @param                 $title
     * @param                 $content
     *
     * @return Homepage
     */
    protected function createHomepage(DocumentManager $documentManager, $parent, $name, $title, $content)
    {
        $homepage = new Homepage();
        $homepage->setPosition($parent, $name);
        $homepage->setTitle($title);
        $homepage->setContent($content);

        $documentManager->persist($homepage);

        return $homepage;
    }
}
