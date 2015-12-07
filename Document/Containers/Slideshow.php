<?php
/**
 * User: lseverino
 * Date: 20/10/15
 * Time: 12:02
 */

namespace SevenManagerBundle\Document\Containers;

use Doctrine\Common\Collections\ArrayCollection;
use SevenManagerBundle\Document\Classes\StructureParent;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\Children;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * Class Slideshow
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 *
 * @package SevenManagerBundle\Document\Containers
 */
class Slideshow extends StructureParent
{
    use Children {
        __construct as __constructChildren;
    }

    /**
     * @PHPCR\ReferenceMany(targetDocument="SevenManagerBundle\Document\Blocks\ImageOne", strategy="hard", cascade={"persist"})
     */
    protected $childrenMany;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__constructChildren();
        $this->childrenMany = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'seven_manager.admin.containers.slideshow';
    }
}
