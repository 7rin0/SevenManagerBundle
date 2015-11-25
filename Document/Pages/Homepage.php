<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Pages;

use SevenManagerBundle\Document\Classes\StructurePages;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\ReferenceMany;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Homepage extends StructurePages
{
    use ReferenceMany;
}
