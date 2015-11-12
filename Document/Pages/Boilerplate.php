<?php
/**
 * User: lseverino
 * Date: 13/10/15
 * Time: 07:42
 */

namespace SevenManagerBundle\Document\Pages;

use SevenManagerBundle\Document\Classes\StructurePages;
use SevenManagerBundle\Document\Traits\CustomChildren;
use SevenManagerBundle\Document\Traits\CustomModels;
use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(versionable="full", referenceable=true, translator="attribute")
 */
class Boilerplate extends StructurePages
{
    use CustomModels;
    use CustomChildren {
        CustomChildren::__construct as private __childrenConstruct;
    }

    public function __construct()
    {
        $this->__childrenConstruct();
    }

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
}
