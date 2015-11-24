<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Menu;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;
use SevenManagerBundle\Document\Classes\StructureMenu;
use SevenManagerBundle\Document\Traits\CustomChildren;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Menu extends StructureMenu
{
    use CustomChildren;
}
