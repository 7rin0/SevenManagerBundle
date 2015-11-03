<?php
/**
 * Created by PhpStorm.
 * User: lseverino
 * Date: 02/11/15
 * Time: 09:11
 */

namespace SevenManagerBundle\Manager;

use Doctrine\ODM\PHPCR\DocumentManager;
use PHPCR\Util\NodeHelper;

/**
 * Class ParentManager
 * @package SevenManagerBundle\Manager
 */
class ParentManager extends DocumentManager
{
    protected $documentManager;

    public function __construct()
    {
        global $kernel;
        $this->documentManager = $kernel->getContainer()->get('doctrine_phpcr')->getManager();
    }

    /**
     * @param $path
     */
    public function createRecursivePaths($path)
    {
        NodeHelper::createPath($this->documentManager->getPhpcrSession(), $path);
    }
}
