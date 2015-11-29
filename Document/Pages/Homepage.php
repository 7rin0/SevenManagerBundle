<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Pages;

use Doctrine\Common\Collections\ArrayCollection;
use SevenManagerBundle\Document\Classes\StructurePages;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\Children;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\ReferenceMany;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Homepage extends StructurePages
{
    use ReferenceMany;
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
}
