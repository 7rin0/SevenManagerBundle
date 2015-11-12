<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Pages;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Classes\StructurePages;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Article extends StructurePages
{
}
