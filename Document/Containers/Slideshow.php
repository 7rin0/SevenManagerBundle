<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 12:02
 */

namespace SevenManagerBundle\Document\Containers;

use SevenManagerBundle\Document\Classes\StructureParent;
use SevenManagerBundle\Document\Traits\CustomChildren;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Slideshow
 * @PHPCR\Document(referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Containers
 */
class Slideshow extends StructureParent
{
    use CustomChildren;
}
