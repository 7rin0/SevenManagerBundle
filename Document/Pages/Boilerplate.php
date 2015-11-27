<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Pages;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\PHPCR\ChildrenCollection;
use SevenManagerBundle\Document\Classes\StructurePages;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\Children;
use SevenManagerBundle\Document\Traits\Fields\PHPCR\ReferenceMany;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Boilerplate extends StructurePages
{
    use ReferenceMany;
    use Children {
        __construct as __constructChildren;
    }

    /**
     * @PHPCR\ReferenceMany(targetDocument="SevenManagerBundle\Document\Blocks\ImageOne", strategy="hard", cascade={"persist"})
     *
     * @var ArrayCollection|ChildrenCollection
     */
    protected $childrenMany;

    /**
     * @PHPCR\ReferenceMany(targetDocument="Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\SimpleBlock", strategy="hard")
     */
    protected $mapMany;

    /**
     * @PHPCR\Date(nullable=true)
     */
    protected $publicationDateStart;

    /**
     * @PHPCR\Date(nullable=true)
     */
    protected $publicationDateEnd;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $range;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $color;

    /**
     * @PHPCR\String(nullable=true)
     */
    protected $immutable = array(
        'ttl'       => 1,
        'redirect'  => ''
    );

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__constructChildren();
        $this->childrenMany = new ArrayCollection();
    }

    /**
     * @return array
     */
    public function getImmutable()
    {
        return $this->immutable;
    }

    /**
     * @param $immutable
     *
     * @return $this
     */
    public function setImmutable($immutable)
    {
        $this->immutable = $immutable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param $range
     *
     * @return $this
     */
    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublicationDateEnd()
    {
        return $this->publicationDateEnd;
    }

    /**
     * @param $publicationDateEnd
     *
     * @return $this
     */
    public function setPublicationDateEnd($publicationDateEnd)
    {
        $this->publicationDateEnd = $publicationDateEnd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublicationDateStart()
    {
        return $this->publicationDateStart;
    }

    /**
     * @param $publicationDateStart
     *
     * @return $this
     */
    public function setPublicationDateStart($publicationDateStart)
    {
        $this->publicationDateStart = $publicationDateStart;
        return $this;
    }

    /**
     * @PHPCR\Child(cascade="persist")
     */
    protected $blockChild;

    /**
     * @return mixed
     */
    public function getBlockChild()
    {
        return $this->blockChild;
    }

    /**
     * @param $blockChild
     * @return $this
     */
    public function setBlockChild($blockChild)
    {
        $this->blockChild = $blockChild;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMapMany()
    {
        return $this->mapMany;
    }

    /**
     * @param $mapMany
     *
     * @return $this
     */
    public function setMapMany($mapMany)
    {
        $this->mapMany = $mapMany;
        return $this;
    }
}
