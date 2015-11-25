<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Menu;

use SevenManagerBundle\Document\Classes\StructureMenu;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\Children;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Menu extends StructureMenu
{
    use Children;
}
