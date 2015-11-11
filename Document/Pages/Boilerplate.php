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
 * @PHPCR\Document(referenceable=true, translator="attribute")
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

    protected $publicationDateStart;
    protected $publicationDateEnd;
    protected $range;

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param mixed $range
     */
    public function setRange($range)
    {
        $this->range = $range;
    }

    /**
     * @return mixed
     */
    public function getPublicationDateEnd()
    {
        return $this->publicationDateEnd;
    }

    /**
     * @param mixed $publicationDateEnd
     */
    public function setPublicationDateEnd($publicationDateEnd)
    {
        $this->publicationDateEnd = $publicationDateEnd;
    }

    /**
     * @return mixed
     */
    public function getPublicationDateStart()
    {
        return $this->publicationDateStart;
    }

    /**
     * @param mixed $publicationDateStart
     */
    public function setPublicationDateStart($publicationDateStart)
    {
        $this->publicationDateStart = $publicationDateStart;
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
