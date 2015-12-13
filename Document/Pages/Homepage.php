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
     * @PHPCR\ReferenceMany(targetDocument="SevenManagerBundle\Document\Collections\FontTitleDescTarget", strategy="hard", cascade={"persist"})
     */
    protected $childrenManyTwo;


    /**
     * @PHPCR\ReferenceMany(targetDocument="SevenManagerBundle\Document\Collections\TitleSubDescImageTarget", strategy="hard", cascade={"persist"})
     */
    protected $childrenManyThree;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__constructChildren();
        $this->childrenMany = new ArrayCollection();
        $this->childrenManyTwo = new ArrayCollection();
        $this->childrenManyThree = new ArrayCollection();
    }
}
